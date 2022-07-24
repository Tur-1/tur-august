<template>
    <div
        class="modal fade base-modal"
        :id="id"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button
                    type="button"
                    class="btn-close close-modal-btn"
                    @click="$emit('cancelRequest')"
                ></button>
                <form @submit.prevent="$emit('formSubmited')">
                    <div class="modal-header" v-show="title">
                        <h6
                            class="modal-title text-uppercase"
                            id="staticBackdropLabel"
                        >
                            {{ title }}
                        </h6>
                    </div>
                    <div class="modal-body">
                        <slot />
                    </div>
                    <div class="modal-footer cancel-submit-btns">
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
