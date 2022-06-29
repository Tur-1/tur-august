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
import BaseBottomOffcanvas from "@/components/BaseBottomOffcanvas.vue";
import Auth from "@/Pages/Auth/Auth.vue";
import { onMounted, watch } from "vue";
const props = defineProps({
    requireAuth: Object,
});

onMounted(() => {
    if (props.requireAuth.status == false) {
        closeAuthOffcanvas();
    }
});

watch(
    () => props.requireAuth,
    (value) => {
        if (value.status == true) {
            openAuthOffcanvas();
        }
        if (value.status == false) {
            closeAuthOffcanvas();
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
