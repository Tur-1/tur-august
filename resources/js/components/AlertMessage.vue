<template>
    <div v-if="isShown" id="toast-alert" class="toast align-items-center show"
        :class="$page.props.backgroundFlashMessage" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{ $page.props.flashMessage }}
            </div>

        </div>
    </div>
</template>
<script setup>
import { ref } from 'vue';

const props = defineProps({
    flashMessage: String,
});

let isShown = ref(false);
if (props.flashMessage)
{
    isShown.value = true;
    setTimeout(() =>
    {
        isShown.value = false;
    }, 2000);
}


</script>