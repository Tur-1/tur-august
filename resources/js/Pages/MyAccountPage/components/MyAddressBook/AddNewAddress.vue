<template>
    <div class="row mb-3">
        <div class="col-md-4">
            <div class="card border-0 mt-4 shadow-sm">
                <a
                    role="button"
                    class="card-body text-dark"
                    @click="$emit('openMyAddressBookModal')"
                >
                    <i class="fa-solid fa-circle-plus fa-lg me-2"></i>
                    <span class="text-bold"> new address</span>
                </a>
            </div>
        </div>
    </div>
</template>

<script setup>
defineEmits(["openMyAddressBookModal"]);
</script>
