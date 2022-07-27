<template>
    <div
        class="modal fade base-modal"
        :id="id"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        :aria-labelledby="'static-' + id"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body position-relative">
                    <button
                        type="button"
                        data-bs-dismiss="modal"
                        class="close-modal-btn text-white"
                        @click="$emit('closeModal')"
                    >
                        <i class="bi bi-x-lg"></i>
                    </button>
                    <h6
                        v-show="title"
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
</template>
<script setup>
const porps = defineProps(["id", "title"]);
const emit = defineEmits(["closeModal"]);
</script>
