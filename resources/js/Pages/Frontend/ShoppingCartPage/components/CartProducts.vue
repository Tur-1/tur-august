
<template>
    <div class="col-lg-7 mb-2">
        <div class="mb-3">

            <div class="shopping-cart-product">
                <a class="shopping-cart-product-img me-2">
                    <img src="http://august.com/storage/images/products/product_5/22-02-22-13-13-24-1645535604-Screenshot-2021-07-23-132852.png"
                        class="img-fluid" />
                </a>
                <div class="shopping-cart-product-detail">
                    <div class="shopping-cart-product-info">
                        <span class="shopping-cart-product-brand"> Vans </span>
                        <span class="shopping-cart-product-description"> Cassandra Maldonado </span>
                        <span class="shopping-cart-product-size"> size: S </span>

                        <div class="input-group shopping-cart-product-quantity">
                            <button class="quantity-btn" type="button" id="button-addon1">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="number" class="" value="0" aria-describedby="button-addon1" />
                            <button class="quantity-btn" type="button" id="button-addon1">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="shopping-cart-product-price--actions">
                        <a wire:click.prevent="OpenDeleteProductModal(29)"
                            class="shopping-cart-product-actions remove-action">
                            <i class="fas fa-close"></i>
                        </a>
                        <div class="shopping-cart-product-price">
                            <strong class="cart-discounted-product-price"> 423.00 SAR </strong>

                            <strong class="text-primary">423.00 SAR </strong>
                        </div>

                        <a wire:click.prevent="moveToWishlist(5)" class="shopping-cart-product-actions save-action">
                            <i class="far fa-heart mr-1"></i>
                            Save for Later
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style>
</style>