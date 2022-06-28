<?php

namespace App\Services\Frontend\Pages;

use App\Http\Resources\ShoppingCart\ShoppingCartItemsResource;


class ShoppingCartPageService
{
    private $cart;
    private $cartSubTotal;
    private $shipmentFees;


    public function getUserShoppingCart()
    {

        $this->cart = collect(ShoppingCartItemsResource::collection(auth()->user()->shoppingCartProducts));
        return $this->cart;
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

    private function getCartTotalWithVat($cartTotal)
    {
        $vat = 15;

        $cartTotalIncludingVat = $cartTotal + ($cartTotal * $vat / 100);

        return $cartTotalIncludingVat;
    }
}