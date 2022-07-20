<template>
    <Transition name="pop" appear>
        <div class="modal base-modal" :id="id" tabindex="-1" v-if="isOpen">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body position-relative">
                        <button
                            type="button"
                            data-bs-dismiss="modal"
                            class="btn-close close-modal-btn"
                            @click="$emit('closeModal')"
                        ></button>
                        <h6
                            class="modal-title mb-2 text-uppercase"
                            :id="'title-' + id"
                        >
                            {{ title }}
                        </h6>

                        <slot />
                    </div>
                </div>
            </div>
        </div>
    </Transition>
</template>
<script setup>
const porps = defineProps(["id", "title", "isOpen"]);
const emit = defineEmits(["closeModal"]);
</script>
