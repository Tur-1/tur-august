<template>
    <TransitionGroup name="fade" mode="out-in">
        <div
            :class="customClass ?? 'col-xl-3 col-lg-4 col-md-4 col-6 mb-4'"
            class="product-item"
            v-for="(product, index) in products"
            :key="index"
        >
            <div class="card product-card">
                <Link :href="product.product_link">
                    <img
                        loading="lazy"
                        :src="product.main_image_url"
                        class="card-img-top"
                        alt="..."
                    />
                </Link>

                <button
                    tabindex="-1"
                    class="wishlist-btn text-center"
                    @click="addToWishlist(product.id)"
                    :disabled="form.processing"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="wishlist-icon"
                        :class="{ 'in-wishlist': product.inWishlist }"
                        width="22"
                        height="22"
                        viewBox="0 0 24 24"
                    >
                        <path
                            d="M12 21.35l-1.45-1.32c-5.15-4.67-8.55-7.75-8.55-11.53 0-3.08 2.42-5.5 5.5-5.5 1.74 0 3.41.81 4.5 2.09 1.09-1.28 2.76-2.09 4.5-2.09 3.08 0 5.5 2.42 5.5 5.5 0 3.78-3.4 6.86-8.55 11.54l-1.45 1.31z"
                        ></path>
                    </svg>
                </button>
                <Link :href="product.product_link">
                    <div class="card-body product-content-card-body">
                        <span class="product-title">
                            <a href="/" class="text-wrap text-dark">
                                {{ product.brand_name }}
                            </a>
                        </span>

                        <span class="product-description">
                            {{ product.name }}
                        </span>

                        <div class="product-price">
                            <span> {{ product.price }} </span>
                            <span
                                class="discounted-product-price"
                                v-if="product.in_stock"
                            >
                                {{ product.discounted_price }}
                            </span>
                            <span
                                class="product-out-of-stock"
                                v-if="!product.in_stock"
                            >
                                out of stock
                            </span>
                        </div>
                    </div>
                </Link>
                <span
                    class="discount-amount-badge"
                    v-if="product.discounted_price != 0"
                >
                    {{ product.discount_amount }}
                </span>
            </div>
        </div>
    </TransitionGroup>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    customClass: String,
    products: Object,
});
let form = useForm({
    product_id: "",
});

const addToWishlist = (product_id) => {
    form.product_id = product_id;
    form.post(route("addToWishlist"));
};
</script>
<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
