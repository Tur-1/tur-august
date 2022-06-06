<template>
    <Transition name="slide-fade">
        <div v-if="message && showAlertMessage" id="toast-alert" class="toast align-items-center show"
            :class="$page.props.backgroundFlashMessage" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ $page.props.flashMessage }}
                </div>

            </div>
        </div>

    </Transition>
</template>
<script setup>
import { onMounted, ref, } from 'vue';
const props = defineProps({
    message: String,
})
let showAlertMessage = ref(false);

onMounted(() =>
{
    showAlertMessage.value = true;

    setTimeout(() =>
    {
        showAlertMessage.value = false;
    }, 4000);
})



</script>
<style>
.slide-fade-enter-active {
    transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
    transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateX(20px);
    opacity: 0;
}
</style>