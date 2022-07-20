<template>
    <BaseModal id="auth-modal" :isOpen="isOpen" @closeModal="closeAuthModal">
        <Auth />
    </BaseModal>
</template>
<script setup>
import BaseModal from "@/components/Base/BaseModal.vue";

import Auth from "@/Pages/Auth/Auth.vue";
import { usePage } from "@inertiajs/inertia-vue3";
import { onMounted, ref, computed } from "vue";

let requireAuth = ref(computed(() => usePage().props.value.requireAuth));
let isOpen = ref(false);

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

const openAuthModal = () => {
    isOpen.value = true;
};
const closeAuthModal = () => {
    isOpen.value = false;
};
</script>
