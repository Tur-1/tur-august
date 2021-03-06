<?php

namespace App\Modules\Frontend\ShoppingCart\Services;

use Illuminate\Support\Facades\Session;
use App\Modules\Frontend\ShoppingCart\Http\Resources\ShoppingCartProductsResource;


class ShoppingCartPageService
{
    private $cart;
    private $cartSubTotal;
    private $shipmentFees;


    public function getUserShoppingCart()
    {

        $this->cart = collect(ShoppingCartProductsResource::collection(auth()->user()->shoppingCartProducts));
        return $this->cart;
    }
    public function getShoppingCartDetails()
    {

        $cartDetails = [
            'shipmentFees' =>  $this->getShipmentFees(),
            'cartSubTotal' => $this->getCartSubTotal(),
            'cartTotal' =>    $this->getCartTotal(),
            'coupon' => null
        ];

        Session::put('cartDetails', $cartDetails);

        $cartWithCoupon = Session::get('cartDetailsWithCoupon');

        if (!is_null($cartWithCoupon) && $cartWithCoupon['cartSubTotal'] == $cartDetails['cartSubTotal']) {
            $cartDetails = $cartWithCoupon;
        }
        return $cartDetails;
    }
    public function getOutOfStockProducts()
    {

        $products = $this->cart->filter(fn ($product) => $product['in_stock'] == false);
        return $products;
    }
    public function getShipmentFees()
    {
        $this->shipmentFees =  $this->cart->where('shipping_cost', '!=', 0)->sum('shipping_cost');
        $shipmentFees =  $this->shipmentFees . ' SAR';
        if ($this->shipmentFees == 0) {
            $shipmentFees =  'Free';
        }

        return  $shipmentFees;
    }

    public function getCartSubTotal()
    {
        $this->cartSubTotal = $this->cart->sum('total_price');

        return floatval($this->cartSubTotal);
    }
    public function getCartTotal()
    {

        $cartTotal =  $this->cartSubTotal + $this->shipmentFees;

        $cartTotal =  $this->getCartTotalWithVat($cartTotal);


        return number_format($cartTotal, 2, '.', '');
    }
    public function attachProductToShoppingCart($request = null)
    {
        if (is_null($request)) {
            $request = Session::get('productDetail');
            Session::remove('productDetail');
        }


        if (!auth()->user()->shoppingCartHas($request['product_id'], $request['size_id'])) {

            auth()->user()->shoppingCart()->attach($request['product_id'], ['size_id' => $request['size_id'], 'quantity' => 1]);
        }
    }
    private function getCartTotalWithVat($cartTotal)
    {
        $vat = 15;

        $cartTotalIncludingVat = $cartTotal + ($cartTotal * $vat / 100);

        return $cartTotalIncludingVat;
    }
    public function deleteUserCartProducts()
    {
        return auth()->user()->shoppingCart()->detach();
    }
}