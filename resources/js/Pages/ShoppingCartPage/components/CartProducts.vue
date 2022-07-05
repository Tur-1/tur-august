<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import CartItem from "@/Pages/ShoppingCartPage/components/CartItem.vue";
import ProductsNoLongerInStock from "@/Pages/ShoppingCartPage/components/ProductsNoLongerInStock.vue";

let productForm = useForm();

// methods

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

const removeCartItem = (cart_id) => {
    productForm.delete(route("removeCartItem", { cartItemId: cart_id }), {
        onBefore: () =>
            confirm("Are you sure you want to delete this product?"),
    });
};

const saveForLater = (productId, cartId) => {
    productForm.post(
        route("saveProductforLater", {
            productId: productId,
            cartItemId: cartId,
        })
    );
};
</script>

<template>
    <CartItem
        :products="$page.props.products"
        :productForm="productForm"
        @removeCartItem="removeCartItem"
        @increment="increment"
        @decrement="decrement"
        @saveForLater="saveForLater"
    />

    <!-- Modal -->
    <ProductsNoLongerInStock />
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
