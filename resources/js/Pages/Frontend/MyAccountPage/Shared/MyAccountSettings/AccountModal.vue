<template>
    <div
        class="modal fade"
        :id="modalId"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body position-relative">
                    <button
                        type="button"
                        class="btn-close close-modal-btn"
                        @click="$emit('cancelRequest')"
                        aria-label="Close"
                    ></button>
                    <h6
                        class="modal-title mb-2 text-uppercase"
                        id="staticBackdropLabel"
                    >
                        {{ modalTitle }}
                    </h6>
                    <slot />
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
defineProps(["modalId", "modalTitle", "hideModal", "cancelRequest"]);
</script>
