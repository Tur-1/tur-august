<template>
    <Teleport to="#base-modal-container">
        <Transition name="modal">
            <div :id="id" class="base-modal-bg" v-if="isModalOpen">
                <div class="base-modal">
                    <div class="base-modal-content">
                        <div class="base-modal-header">
                            <button
                                type="button"
                                @click="$emit('closeModal')"
                                class="base-modal-close-btn btn-close btn-close-white"
                            ></button>
                        </div>
                        <span class="base-modal-title" v-show="title">
                            {{ title }}
                        </span>
                        <slot />
                    </div>
                </div>
            </div>
        </Transition>
    </Teleport>
</template>
<script setup>
const porps = defineProps(["id", "title", "isModalOpen"]);
const emit = defineEmits(["closeModal"]);
</script>
<style>
.modal-enter-active,
.modal-leave-active {
    transition: all 0.25s ease;
}
.modal-enter-from,
.modal-leave-to {
    opacity: 0;
    transform: scale(1.1);
}
</style>
