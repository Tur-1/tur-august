<template>
    <div class="card card_checkout_coupon_form">
        <form
            @submit.prevent="applyCoupon"
            class="checkout_coupon_form"
            :class="{ 'is-invalid': ErrorMsg }"
        >
            <input
                type="text"
                placeholder="Enter Coupon Code..."
                v-model="code"
                class="form-control form-control-sm border-0 shadow-none bg-transparent"
            />

            <button
                class="text-primary bg-transparent me-2"
                type="submit"
                :disabled="!code"
            >
                {{ coupon ? "remove" : "Apply" }}
            </button>
        </form>
    </div>
    <div class="ms-2 me-2">
        <BaseInputErrorMsg :message="ErrorMsg" />
        <BaseInputSuccessMsg :message="coupon ? coupon.successMsg : ''" />
    </div>
</template>
<script setup>
import { usePage } from "@inertiajs/inertia-vue3";
import BaseInputErrorMsg from "@/components/Base/BaseInputErrorMsg.vue";
import BaseInputSuccessMsg from "@/components/Base/BaseInputSuccessMsg.vue";
import { computed, ref } from "vue";
import { Inertia } from "@inertiajs/inertia";

let coupon = ref(computed(() => usePage().props.value.cartDetails.coupon));
let ErrorMsg = ref(computed(() => usePage().props.value.errors.code));

let code = ref(coupon.value ? coupon.value.code : "");

const applyCoupon = () => {
    Inertia.post(route("applyCoupon"), { code: code.value });
    if (coupon.value) {
        code.value = "";
    }
};
</script>
