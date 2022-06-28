<script setup>
import { onMounted, ref } from "vue";
import BaseFormModal from "@/components/BaseFormModal.vue";
import { useForm } from "@inertiajs/inertia-vue3";
const props = defineProps({
    products: Array,
});

let outOfStockForm = useForm();

let outOfStockProducts = ref(
    props.products.filter((product) => product.in_stock == false)
);
// methods
onMounted(() => {
    if (outOfStockProducts.value.length > 0) {
        openCartProductsModal();
    }
});
const openCartProductsModal = () => {
    $("#cart-products-modal").modal("show");
};
const saveOutOfstockProductsForLater = () => {
    outOfStockForm.post(route("saveOutOfStockforLater"));
    closeCartProductsModal();
};
const closeCartProductsModal = () => {
    $("#cart-products-modal").modal("hide");
};
</script>
<template>
    <!-- Modal -->
    <BaseFormModal
        id="cart-products-modal"
        title="these products are out of stock"
        submitButtonTitle="save for later"
        @cancelRequest="closeCartProductsModal"
        @formSubmited="saveOutOfstockProductsForLater"
        :formProcessing="outOfStockForm.processing"
    >
        <div
            class="shopping-cart-product"
            v-for="(product, index) in outOfStockProducts"
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
                </div>

                <div class="shopping-cart-product-price--actions">
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
                </div>
            </div>
        </div>
    </BaseFormModal>
</template>
