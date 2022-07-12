<template>
    <BaseBottomOffcanvas id="auth-offcanvas">
        <template #offcanvas-header>
            <button
                type="button"
                class="border-0 bg-transparent"
                data-bs-dismiss="offcanvas"
                aria-label="Close"
            >
                <i class="bi bi-chevron-down"></i>
            </button>
            <div class="text-center">
                <h5>AUGUST</h5>
            </div>
            <div></div>
        </template>

        <template #offcanvas-body>
            <Auth />
        </template>
    </BaseBottomOffcanvas>
</template>
<script setup>
import BaseBottomOffcanvas from "@/components/Base/BaseBottomOffcanvas.vue";
import Auth from "@/Pages/Auth/Auth.vue";
import { usePage } from "@inertiajs/inertia-vue3";
import { watch, onMounted, ref, computed } from "vue";

let requireAuth = ref(computed(() => usePage().props.value.requireAuth));

onMounted(() => {
    if (requireAuth.value.status == false) {
        closeAuthOffcanvas();
    }

    if (requireAuth.value.status == true) {
        openAuthOffcanvas();
    }
});

watch(
    () => requireAuth.value,
    (value) => {
        if (value.status == true || usePage().props.value.errors !== null) {
            openAuthOffcanvas();
        }
    },
    { deep: true }
);
const openAuthOffcanvas = () => {
    $("#auth-offcanvas").offcanvas("show");
};
const closeAuthOffcanvas = () => {
    $("#auth-offcanvas").offcanvas("hide");
};
</script>
