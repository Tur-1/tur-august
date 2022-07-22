<?php

namespace App\Modules\Frontend\Checkout\Services;

use App\Models\order\Order;
use App\Models\product\Product;
use App\Models\order\OrderAddress;
use App\Models\order\OrderCoupon;
use App\Models\order\OrderProduct;
use Illuminate\Support\Facades\Session;
use App\Models\product\ProductSizeOption;
use App\Modules\Frontend\Checkout\Http\Resources\CheckoutProductsResource;
use App\Modules\Frontend\Checkout\Exceptions\ProductNoLongerInStockException;


class CheckoutPageService
{
    private $cartProducts;
    private $orderDetails;
    private $shippingAddress;
    private $coupon;

    public function __construct($cartDetails, $userAddress, $coupon = null)
    {
        $this->cartProducts = collect(CheckoutProductsResource::collection(auth()->user()->shoppingCartProducts));

        $this->coupon = $coupon;
        $this->orderDetails = $cartDetails;

        $this->shippingAddress = $userAddress;
    }

    public function createNewOrder()
    {

        $this->order = Order::create([
            'user_id' => auth()->id(),
            'order_status_id' => 1,
            'shipping_fees' => intval($this->orderDetails['shipmentFees']),
            'subtotal' => $this->orderDetails['cartSubTotal'],
            'total' => $this->orderDetails['cartTotal'],
        ]);


        return $this->order;
    }

    public function createOrderAddress($order_id)
    {

        OrderAddress::create([
            'order_id' => $order_id,
            'full_name' => $this->shippingAddress['full_name'],
            'city' => $this->shippingAddress['city'],
            'street' => $this->shippingAddress['street'],
            'phone_number' => $this->shippingAddress['phone_number'],
            'address' => $this->shippingAddress['address']
        ]);
    }
    public function storeOrderCoupon($order_id)
    {
        if (!is_null($this->coupon)) {


            OrderCoupon::create([
                'order_id' => $order_id,
                'code' => $this->coupon->code,
                'type' => $this->coupon->type,
                'amount' => $this->coupon->amount,
                'discounted_amount' => $this->orderDetails['coupon']['discounted_value'],
            ]);
        }
    }
    public function storeOrderProducts()
    {
        OrderProduct::insert($this->getOrderProducts());
    }
    public function checkProductsStock()
    {

        foreach ($this->cartProducts as $product) {

            if ($this->isNotInStock($product)) {
                $message = $product['name'] . ' is out of Stock';
                throw new ProductNoLongerInStockException($message);
            }

            if ($this->isStockSizeLessThanQty($product)) {
                $message = 'Only ' . '  ' . $product['stock_size'] . ' Left in Stock ';
                throw new ProductNoLongerInStockException($message);
            }
        }
    }


    public function updateProductStock()
    {
        $product_ids = [];

        foreach ($this->cartProducts as $product) {
            $product_ids[$product['product_id']] = $product['product_id'];
        }

        foreach (Product::whereIn('id', $product_ids)->with('sizeOptions')->get() as $product) {
            $product_stock[] = [
                'id' => strval($product['id']),
                'stock' => intval($product->sizeOptions->pluck('pivot.stock')->sum())
            ];
        }


        $product = new Product();
        batch()->update($product, $product_stock, 'id');
    }

    public function notifyUserOfOrderAcceptance()
    {
    }
    public function decreaseStockSize()
    {
        $stockSize = [];

        foreach ($this->cartProducts as $product) {

            $stockSize[] = [
                'id' => strval($product['size']['pivot']['id']),
                'stock' => ['-', strval($product['quantity'])]
            ];
        }

        $productSizeOption = new ProductSizeOption();
        batch()->update($productSizeOption, $stockSize, 'id');
    }

    private function getOrderProducts()
    {
        $orderProducts = [];
        foreach ($this->cartProducts as $product) {

            $orderProducts[] = [
                'order_id' =>  $this->order->id,
                'product_id' => $product['product_id'],
                'size_id' => $product['size']['id'],
                'quantity'  => $product['quantity'],
                'total_price' => $product['total_price']
            ];
        }
        return $orderProducts;
    }

    private function isNotInStock($product)
    {
        return $product['in_stock'] == false;
    }
    private function isStockSizeLessThanQty($product)
    {
        return $product['stock_size'] < $product['quantity'];
    }
}