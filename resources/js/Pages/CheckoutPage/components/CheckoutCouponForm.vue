<template>
    <div class="card border-0 mt-3 mb-3">
        <div class="p-2">
            <form
                @submit.prevent="applyCoupon"
                class="d-flex align-items-center"
            >
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
                    Apply
                </button>
            </form>
            <div class="mt-1">
                <InputErrorMsg :error="couponForm.errors.code" />
                <InputSuccessMsg :message="successMsg" />
            </div>
        </div>
    </div>
</template>
<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import InputErrorMsg from "@/components/InputErrorMsg.vue";
import InputSuccessMsg from "@/components/InputSuccessMsg.vue";

let couponForm = useForm({
    code: "",
});

let successMsg = ref("");

const applyCoupon = () => {
    couponForm.post(route("applyCoupon"), {
        onSuccess: (page) => {
            successMsg.value = "coupon applied";
        },
        onError: (page) => {
            successMsg.value = "";
        },
    });
};
</script>
