<template>
    <BaseModal id="auth-modal" :isOpen="isOpen" @closeModal="closeAuthModal">
        <Auth />
    </BaseModal>
</template>
<script setup>
import BaseModal from "@/components/Base/BaseModal.vue";

import Auth from "@/Pages/Auth/Auth.vue";
import { usePage } from "@inertiajs/inertia-vue3";
import { onMounted, ref, computed, watch } from "vue";

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
    isOpen.value = true;
};
const closeAuthModal = () => {
    isOpen.value = false;
};
</script>
