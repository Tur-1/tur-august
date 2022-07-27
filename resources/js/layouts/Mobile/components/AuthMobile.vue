<script setup>
import { usePage } from "@inertiajs/inertia-vue3";
import { watch, onMounted, ref, computed } from "vue";
import BaseBottomOffcanvas from "@/components/Base/BaseBottomOffcanvas.vue";
import Auth from "@/Pages/Auth/Auth.vue";

let requireAuth = ref(computed(() => usePage().props.value.requireAuth));

let isUserAuthenticated = ref(
    computed(() => usePage().props.value.user.authenticated)
);

onMounted(() => {
    if (requireAuth.value.status == false) {
        closeAuthOffcanvas();
    }

    if (requireAuth.value.status == true) {
        openAuthOffcanvas();
    }

    if (isUserAuthenticated.value) {
        removeAuthOffcanvas();
    }
});
watch(
    () => requireAuth.value,
    (value) => {
        if (value.status == false) {
            closeAuthOffcanvas();
        }

        if (value.status == true) {
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
    $(".offcanvas-backdrop").remove();
};
const removeAuthOffcanvas = () => {
    $("#auth-offcanvas").remove();
};
</script>
<template>
    <BaseBottomOffcanvas id="auth-offcanvas" title="AUGUST">
        <Auth />
    </BaseBottomOffcanvas>
</template>
