<template>
    <BaseModal id="auth-modal" @closeModal="closeAuthModal">
        <Auth />
    </BaseModal>
</template>
<script setup>
import BaseModal from "@/components/Base/BaseModal.vue";

import Auth from "@/Pages/Auth/Auth.vue";
import { usePage } from "@inertiajs/inertia-vue3";
import { onMounted, ref, computed, watch } from "vue";

let requireAuth = ref(computed(() => usePage().props.value.requireAuth));

onMounted(() => {
    if (requireAuth.value.status == false) {
        closeAuthModal();
    }

    if (requireAuth.value.status == true) {
        openAuthModal();
    }
    if (
        requireAuth.value.status == true &&
        usePage().props.value.errors !== null
    ) {
        openAuthModal();
    }
});

watch(
    () => requireAuth.value,
    (value) => {
        if (value.status == false) {
            closeAuthModal();
        }

        if (value.status == true) {
            openAuthModal();
        }
    },
    { deep: true }
);
const openAuthModal = () => {
    $("#auth-modal").modal("show");
};
const closeAuthModal = () => {
    $("#auth-modal").modal("hide");
    $(".modal").remove();
    $(".modal-backdrop").remove();
};
</script>
