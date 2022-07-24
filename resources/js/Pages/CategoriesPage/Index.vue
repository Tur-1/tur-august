<template>
    <app-layout title="August">
        <section>
            <div class="categories-page-container">
                <CategoriesTabsHeader />
                <CategoriesTabsContent />
            </div>
        </section>
    </app-layout>
</template>

<script setup>
import AppLayout from "@/layouts/AppLayout";
import CategoriesTabsHeader from "@/Pages/CategoriesPage/components/CategoriesTabsHeader.vue";
import CategoriesTabsContent from "@/Pages/CategoriesPage/components/CategoriesTabsContent.vue";
import { onMounted } from "vue";

onMounted(() => {
    document.querySelector("body").style.backgroundColor = "#F9F9F9";
});
</script>
