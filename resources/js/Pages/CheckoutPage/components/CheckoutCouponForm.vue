<template>
    <div class="card border-0 mt-3 mb-3">
        <form @submit.prevent="applyCoupon" class="checkout_coupon_form">
            <input
                type="text"
                placeholder="Enter Coupon Code..."
                v-model="couponForm.code"
                class="form-control form-control-sm border-0 shadow-none"
            />

            <button
                class="text-primary bg-transparent ms-2"
                type="submit"
                :disabled="!couponForm.code"
            >
                {{ cartTotalWithCoupon.data ? "remove" : "Apply" }}
            </button>
        </form>
        <div class="pb-1 ps-2">
            <InputErrorMsg :error="couponForm.errors.code" />
            <InputSuccessMsg
                v-if="cartTotalWithCoupon.data"
                :message="cartTotalWithCoupon.data.coupon.successMsg"
            />
        </div>
    </div>
</template>
<script setup>
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import InputErrorMsg from "@/components/InputErrorMsg.vue";
import InputSuccessMsg from "@/components/InputSuccessMsg.vue";
import { computed, ref } from "vue";

let { props: $props } = usePage();

let cartTotalWithCoupon = ref({
    data: computed(() => $props.value.cartTotalWithCoupon),
});

let couponForm = useForm({
    code: cartTotalWithCoupon.value.data
        ? cartTotalWithCoupon.value.data.coupon.code
        : "",
});

const applyCoupon = () => {
    couponForm.post(route("applyCoupon"));
    if (cartTotalWithCoupon.value.data) {
        couponForm.code = "";
    }
};
</script>
