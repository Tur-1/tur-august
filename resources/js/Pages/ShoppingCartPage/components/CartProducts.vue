<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

const props = defineProps({
    products: Array,
});

let products = ref(props.products);

let productForm = useForm();
const increment = (product) => {
    if (product.quantity !== product.stock_size) {
        productForm.post(
            route("increaseProductQuantity", { cartItemId: product.cart_id })
        );
    }
};
const decrement = (product) => {
    if (product.quantity !== 1) {
        productForm.post(
            route("decreaseProductQuantity", { cartItemId: product.cart_id })
        );
    }
};

const removeCartItem = (cart_id, index) => {
    productForm.delete(route("removeCartItem", { cartItemId: cart_id }), {
        onBefore: () =>
            confirm("Are you sure you want to delete this product?"),
    });
    products.value.splice(index, 1);
};

const saveForLater = (productId, index) => {
    productForm.post(route("saveProductforLater", { productId: productId }));
    products.value.splice(index, 1);
};
</script>

<template>
    <TransitionGroup name="list" tag="div" class="col-lg-7 mb-4 mt-2">
        <div
            class="shopping-cart-product"
            v-for="(product, index) in products"
            :key="product.cart_id"
        >
            <a class="shopping-cart-product-img me-2">
                <img :src="product.main_image_url" class="img-fluid" />
            </a>
            <div class="shopping-cart-product-detail">
                <div class="shopping-cart-product-info justify-content-between">
                    <div class="d-flex flex-column justify-content-between">
                        <span class="shopping-cart-product-brand">
                            {{ product.brand_name }}
                        </span>
                        <span class="shopping-cart-product-description">
                            {{ product.name }}
                        </span>
                        <span class="shopping-cart-product-size">
                            size: {{ product.size }}
                        </span>
                    </div>

                    <div class="shopping-cart-product-quantity">
                        <button
                            @click="decrement(product)"
                            :disabled="
                                product.quantity == 1 || productForm.processing
                            "
                            class="quantity-btn rounded-start"
                            type="button"
                            id="button-addon1"
                        >
                            <i class="fa-solid fa-minus"></i>
                        </button>
                        <small class="quantity">{{ product.quantity }}</small>
                        <button
                            @click="increment(product)"
                            :disabled="
                                product.quantity == product.stock_size ||
                                productForm.processing
                            "
                            class="quantity-btn rounded-end"
                            type="button"
                            id="button-addon1"
                        >
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>

                <div class="shopping-cart-product-price--actions">
                    <a
                        class="shopping-cart-product-actions remove-action"
                        @click="removeCartItem(product.cart_id, index)"
                    >
                        <i class="fas fa-close"></i>
                    </a>
                    <div class="shopping-cart-product-price">
                        <span
                            class="product-out-of-stock"
                            v-if="!product.in_stock"
                        >
                            out of stock
                        </span>
                        <strong
                            class="cart-discounted-product-price"
                            v-if="product.in_stock"
                        >
                            {{ product.discounted_price }}
                        </strong>

                        <strong class="text-primary">
                            {{ product.price }}
                        </strong>
                    </div>

                    <a
                        class="shopping-cart-product-actions save-action"
                        @click="saveForLater(product.product_id, index)"
                    >
                        <i class="far fa-heart mr-1"></i>
                        Save for Later
                    </a>
                </div>
            </div>
        </div>
    </TransitionGroup>
</template>
<style>
.list-enter-active,
.list-leave-active {
    transition: all 0.5s ease;
}
.list-enter-from,
.list-leave-to {
    opacity: 0;
    transform: translateX(30px);
}
</style>
