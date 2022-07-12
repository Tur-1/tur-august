<template>
    <BaseModal id="auth-modal">
        <Auth />
    </BaseModal>
</template>
<script setup>
import BaseModal from "@/components/Base/BaseModal.vue";

import Auth from "@/Pages/Auth/Auth.vue";
import { usePage } from "@inertiajs/inertia-vue3";
import { watch, onMounted, ref, computed } from "vue";

let requireAuth = ref(computed(() => usePage().props.value.requireAuth));

onMounted(() => {
    if (requireAuth.value.status == false) {
        closeAuthModal();
    }

    if (requireAuth.value.status == true) {
        openAuthModal();
    }
});

watch(
    () => requireAuth.value,
    (value) => {
        if (value.status == true) {
            openAuthModal();
        }

        if (value.status == false) {
            closeAuthModal();
        }
    },
    { deep: true }
);
const openAuthModal = () => {
    $("#auth-modal").modal("show");
};
const closeAuthModal = () => {
    $("#auth-modal").modal("hide");
    $(".modal-backdrop").remove();
    $("body").removeClass("modal-open");
};
</script>
