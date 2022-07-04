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
                class="text-primary bg-transparent me-2"
                type="submit"
                :disabled="!couponForm.code"
            >
                {{ coupon ? "remove" : "Apply" }}
            </button>
        </form>
        <div class="pb-1 ps-2">
            <InputErrorMsg :error="couponForm.errors.code" />
            <InputSuccessMsg :message="coupon ? coupon.successMsg : ''" />
        </div>
    </div>
</template>
<script setup>
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import InputErrorMsg from "@/components/InputErrorMsg.vue";
import InputSuccessMsg from "@/components/InputSuccessMsg.vue";
import { computed, ref } from "vue";

let { props: $props } = usePage();

let coupon = ref(computed(() => $props.value.cartDetails.coupon));

let couponForm = useForm({
    code: coupon.value ? coupon.value.code : "",
});

const applyCoupon = () => {
    couponForm.post(route("applyCoupon"));
    if (coupon.value) {
        couponForm.code = "";
    }
};
</script>
