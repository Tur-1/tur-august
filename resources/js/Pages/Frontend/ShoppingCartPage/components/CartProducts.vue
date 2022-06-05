
<template>
    <div class="col-lg-7 mb-2">
        <div class="mb-3">

            <div v-for="(cartItem, index) in $page.props.shoppingCartItems" :key="index" class="shopping-cart-product">
                <a class="shopping-cart-product-img me-2">
                    <img src="{{ cartItem.main_image }}" class="img-fluid" />
                </a>
                <div class="shopping-cart-product-detail">
                    <div class="shopping-cart-product-info">
                        <span class="shopping-cart-product-brand"> {{ cartItem.brand_name }} </span>
                        <span class="shopping-cart-product-description"> {{ cartItem.name }} </span>
                        <span class="shopping-cart-product-size"> size: {{ cartItem.pivot.size_name }} </span>

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
                            <!-- <strong class="cart-discounted-product-price"> {{ cartItem.price }} SAR </strong> -->

                            <strong class="text-primary"> {{ cartItem.price }} SAR </strong>
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