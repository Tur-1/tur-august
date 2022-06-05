<template>

    <Head>
        <title>August - {{ title }}</title>
    </Head>
    <main :style="backgroundColor">
        <LayoutNavbar />

        <slot />

        <LayoutFooter />
        <AlertMessage :flashMessage="$page.props.flashMessage" />
    </main>
</template>

<script setup>
import LayoutNavbar from "./components/LayoutNavbar";
import LayoutFooter from "./components/LayoutFooter";
import AlertMessage from "@/components/AlertMessage.vue";

defineProps({
    backgroundColor: String,
    title: String,
})
</script>
