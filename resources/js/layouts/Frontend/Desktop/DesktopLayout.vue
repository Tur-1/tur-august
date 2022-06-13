<script setup>
import LayoutNavbar from "./components/LayoutNavbar";
import LayoutFooter from "./components/LayoutFooter";
import { onMounted, ref } from "vue";


defineProps({
    backgroundColor: String,
    title: String
});

let contentTrigger = ref(false);
onMounted(() =>
{
    contentTrigger.value = true;
});
</script>


<template>

    <Transition name="fade" mode="out-in">
        <main v-if="contentTrigger" :style="backgroundColor">
            <LayoutNavbar />

            <slot />

            <LayoutFooter />
        </main>
    </Transition>

</template>


<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
