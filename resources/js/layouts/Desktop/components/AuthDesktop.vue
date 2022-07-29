<template>
    <BaseModal
        id="auth-modal"
        :isModalOpen="isModalOpen"
        @closeModal="closeAuthModal"
    >
        <Auth />
    </BaseModal>
</template>
<script setup>
import BaseModal from "@/components/Base/BaseModal.vue";

import Auth from "@/Pages/Auth/Auth.vue";
import { usePage } from "@inertiajs/inertia-vue3";
import { onMounted, ref, computed, watch } from "vue";
let isModalOpen = ref(false);
let requireAuth = ref(computed(() => usePage().props.value.requireAuth));
let isUserAuthenticated = ref(
    computed(() => usePage().props.value.user.authenticated)
);

onMounted(() => {
    if (requireAuth.value.status == true) {
        openAuthModal();
    }
    if (requireAuth.value.status == false) {
        closeAuthModal();
    }
    if (isUserAuthenticated.value) {
        removeAuthModal();
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
    isModalOpen.value = true;
};
const closeAuthModal = () => {
    isModalOpen.value = false;
};

const removeAuthModal = () => {
    $("#auth-modal").remove();
};
</script>
