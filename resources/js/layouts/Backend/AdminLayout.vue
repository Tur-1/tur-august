<template>

    <AdminSidebar />
    <main class="main-wrap">
        <AdminHeader />
        <section class="content-main">

            <slot />

        </section>

    </main>
</template>

<script setup>
import AdminHeader from '@/layouts/Backend/components/AdminHeader.vue';
import AdminSidebar from '@/layouts/Backend/components/AdminSidebar.vue';

</script>