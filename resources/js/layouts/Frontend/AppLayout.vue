<template>

    <Head>
        <title>August - {{ title }}</title>
    </Head>
    <main :style="backgroundColor">
        <LayoutNavbar />

        <slot />

        <LayoutFooter />
    </main>
</template>

<script setup>
import LayoutNavbar from "./components/LayoutNavbar";
import LayoutFooter from "./components/LayoutFooter";

defineProps({
    backgroundColor: String,
    title: String,
})
</script>
