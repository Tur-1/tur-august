<template>
    <div class="row mb-3 d-flex justify-content-center">
        <div class="border-top border-bottom mt-4 p-2 text-center">
            <a role="button" @click="$emit('openMyAddressBookModal')">
                <span class="text-bold"> new address</span>
            </a>
        </div>
    </div>
</template>

<script setup>
defineEmits(["openMyAddressBookModal"]);
</script>
