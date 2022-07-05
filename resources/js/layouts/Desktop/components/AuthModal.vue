<template>
    <BaseModal id="auth-modal">
        <Auth />
    </BaseModal>
</template>
<script setup>
import BaseModal from "@/components/Base/BaseModal.vue";

import Auth from "@/Pages/Auth/Auth.vue";
import { watch, onMounted } from "vue";
const props = defineProps({
    requireAuth: Object,
});

onMounted(() => {
    if (props.requireAuth.status == false) {
        closeAuthModal();
    }
});

watch(
    () => props.requireAuth,
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
