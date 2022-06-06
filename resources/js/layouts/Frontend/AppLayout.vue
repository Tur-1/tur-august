<template>



    <Head>
        <title>August - {{ title }}</title>
    </Head>
    <Transition name="fade" mode="out-in">
        <main v-if="contentTrigger" :style="backgroundColor">
            <LayoutNavbar />

            <slot />

            <LayoutFooter />

        </main>
    </Transition>
</template>

<script setup>
import LayoutNavbar from "./components/LayoutNavbar";
import LayoutFooter from "./components/LayoutFooter";
import AlertMessage from "@/components/AlertMessage.vue";
import { onMounted, ref } from "vue";

const props = defineProps({
    backgroundColor: String,
    title: String,

})
let contentTrigger = ref(false);
onMounted(() =>
{
    contentTrigger.value = true;
})
</script>

 
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
 