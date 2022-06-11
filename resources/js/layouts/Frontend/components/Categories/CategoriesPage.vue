<template>
    <div
        class="offcanvas offcanvas-bottom"
        tabindex="-1"
        id="categories-page-offcanvas"
        aria-labelledby="staticBackdropLabel"
    >
        <CategoriesTabsHeader />
        <CategoriesTabsContent />
    </div>
</template>
<script setup>
import CategoriesTabsHeader from "@/layouts/Frontend/components/Categories/components/CategoriesTabsHeader.vue";
import CategoriesTabsContent from "@/layouts/Frontend/components/Categories/components/CategoriesTabsContent.vue";
</script>
