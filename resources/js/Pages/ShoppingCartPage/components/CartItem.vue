<template>
    <TransitionGroup name="list" tag="div" class="col-lg-7 mb-4 mt-2">
        <div
            class="shopping-cart-product"
            v-for="(product, index) in products"
            :key="product.cart_id"
        >
            <Link class="shopping-cart-product-img me-2" :href="product.link">
                <img :src="product.main_image_url" class="img-fluid" />
            </Link>
            <div class="shopping-cart-product-detail">
                <div class="shopping-cart-product-info justify-content-between">
                    <div class="d-flex flex-column justify-content-between">
                        <Link
                            class="shopping-cart-product-brand"
                            :href="product.link"
                        >
                            {{ product.brand_name }}
                        </Link>
                        <Link
                            class="shopping-cart-product-description"
                            :href="product.link"
                        >
                            {{ product.name }}
                        </Link>
                        <span class="shopping-cart-product-size">
                            size: {{ product.size }}
                        </span>
                    </div>

                    <div class="shopping-cart-product-quantity">
                        <button
                            @click="$emit('decrement', product)"
                            :disabled="
                                product.quantity == 1 || productForm.processing
                            "
                            class="quantity-btn rounded-start"
                            type="button"
                            id="button-addon1"
                        >
                            <i class="bi bi-dash"></i>
                        </button>
                        <small class="quantity">{{ product.quantity }}</small>
                        <button
                            @click="$emit('increment', product)"
                            :disabled="
                                product.quantity == product.stock_size ||
                                productForm.processing
                            "
                            class="quantity-btn rounded-end"
                            type="button"
                            id="button-addon1"
                        >
                            <i class="bi bi-plus"></i>
                        </button>
                    </div>
                </div>

                <div class="shopping-cart-product-price--actions">
                    <a
                        class="shopping-cart-product-actions remove-action"
                        @click="$emit('removeCartItem', product.cart_id)"
                    >
                        <i class="bi bi-x"></i>
                    </a>
                    <div class="shopping-cart-product-price">
                        <span
                            class="product-out-of-stock"
                            v-if="!product.in_stock"
                        >
                            out of stock
                        </span>
                        <span
                            class="cart-discounted-product-price"
                            v-if="product.in_stock"
                        >
                            {{ product.discounted_price }}
                        </span>

                        <span class="text-primary">
                            {{ product.price }}
                        </span>
                    </div>

                    <a
                        class="shopping-cart-product-actions save-action"
                        @click="
                            $emit(
                                'saveForLater',
                                product.product_id,
                                product.cart_id
                            )
                        "
                    >
                        save for later
                    </a>
                </div>
            </div>
        </div>
    </TransitionGroup>
</template>
<script setup>
defineProps({
    products: Array,
    productForm: Object,
});
defineEmits(["saveForLater", "removeCartItem", "decrement", "increment"]);
</script>
