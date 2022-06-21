<template>
    <form @submit.prevent="$emit('updateAccountInfo')">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Name *</label>
            <input v-model="accountInfoForm.name" class="form-control form-control-sm"
                :class="{ 'is-invalid': accountInfoForm.errors.name }" type="text">

            <InputErrorMsg :error="accountInfoForm.errors.name" />
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email *</label>
            <input v-model="accountInfoForm.email" type="email" class="form-control form-control-sm"
                :class="{ 'is-invalid': accountInfoForm.errors.email }" id="exampleInputEmail1">


            <InputErrorMsg :error="accountInfoForm.errors.email" />
        </div>
        <div class="mb-3">
            <label for="Gender" class="form-label">Gender *</label>
            <select class="form-select form-select-sm" :class="{ 'is-invalid': accountInfoForm.errors.gender }"
                v-model="accountInfoForm.gender">
                <option v-for="(gender, index) in $page.props.genders " :key="index" :value="gender">
                    {{ gender }}
                </option>
            </select>
            <InputErrorMsg :error="accountInfoForm.errors.gender" />
        </div>


        <div class="text-end">
            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" :disabled="accountInfoForm.processing">
                update
                <div class="spinner-border spinner-border-sm" role="status" v-if="accountInfoForm.processing">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>
        </div>
    </form>

</template>

<script setup>
import InputErrorMsg from '@/shared/InputErrorMsg.vue';
const props = defineProps({
    accountInfoForm: Object,
})

defineEmits(['updateAccountInfo']);


</script>
