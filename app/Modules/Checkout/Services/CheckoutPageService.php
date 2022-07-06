<?php

namespace App\Modules\Checkout\Services;

use Mavinoo\Batch\Batch;
use App\Models\order\Order;
use App\Models\product\Product;
use App\Models\order\OrderAddress;
use App\Models\order\OrderProduct;
use Illuminate\Support\Facades\Session;
use App\Models\product\ProductSizeOption;
use App\Modules\Checkout\Http\Resources\CheckoutProductsResource;
use App\Modules\Checkout\Exceptions\ProductNoLongerInStockException;


class CheckoutPageService
{
    private $cartProducts;
    private $orderDetails;
    private $shippingAddress;

    public function __construct($cartDetails, $userAddress)
    {
        $this->cartProducts = collect(CheckoutProductsResource::collection(auth()->user()->shoppingCartProducts));

        $this->orderDetails = $cartDetails;
        $this->shippingAddress = $userAddress;
    }

    public function createNewOrder()
    {
        // 'order_status_id' => 1,
        $this->order = Order::create([
            'user_id' => auth()->id(),
            'coupon_id' => Session::get('coupon_id'),
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
                'id' => $product['id'],
                'stock' => $product->sizeOptions->pluck('pivot.stock')->sum()
            ];
        }


        $product = new Product();
        \Batch::update($product, $product_stock, 'id');
    }

    public function notifyUserOfOrderAcceptance()
    {
    }
    public function decreaseStockSize()
    {
        $stockSize = [];

        foreach ($this->cartProducts as $product) {

            $stockSize[] = [
                'id' => $product['size']['pivot']['id'],
                'stock' => ['-', $product['quantity']]
            ];
        }

        $productSizeOption = new ProductSizeOption();
        \Batch::update($productSizeOption, $stockSize, 'id');
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