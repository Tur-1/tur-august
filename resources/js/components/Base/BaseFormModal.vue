<template>
    <div
        class="modal fade"
        :id="id"
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
                    ></button>
                    <h6
                        class="modal-title mb-2 text-uppercase"
                        id="staticBackdropLabel"
                    >
                        {{ title }}
                    </h6>

                    <form @submit.prevent="$emit('formSubmited')">
                        <slot />
                        <div class="cancel-submit-btns mt-2">
                            <BaseCancelButton
                                v-if="cancelButtonTitle"
                                :title="cancelButtonTitle"
                                @cancelRequest="$emit('cancelRequest')"
                            />

                            <BaseSubmitButton
                                v-if="submitButtonTitle"
                                :title="submitButtonTitle"
                                :formProcessing="formProcessing"
                            />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import BaseSubmitButton from "@/components/Base/BaseSubmitButton.vue";
import BaseCancelButton from "@/components/Base/BaseCancelButton.vue";
const porps = defineProps([
    "id",
    "title",
    "submitButtonTitle",
    "cancelButtonTitle",
    "formProcessing",
]);
const emit = defineEmits(["formSubmited", "cancelRequest"]);
</script>
