<template>
    <div class="shop-search-bar">
        <i class="bi bi-search"></i>
        <input
            type="text"
            placeholder="search"
            @keyup.enter="$emit('getSearchResults')"
            @click="$emit('openSearchModal')"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
        />
        <i class="bi bi-x-lg" @click="$emit('clearSearchResults')"></i>
    </div>
</template>
<script setup>
defineProps(["modelValue"]);
defineEmits([
    "getSearchResults",
    "update:modelValue",
    "openSearchModal",
    "clearSearchResults",
]);
</script>
