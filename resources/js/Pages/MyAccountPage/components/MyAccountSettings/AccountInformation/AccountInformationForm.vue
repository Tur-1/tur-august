<template>
    <BaseInput
        label="Name *"
        v-model="accountInfoForm.name"
        type="text"
        id="accountName"
        :customClass="{ 'is-invalid': accountInfoForm.errors.name }"
        :errorMsg="accountInfoForm.errors.name"
    />

    <BaseInput
        label="Email *"
        v-model="accountInfoForm.email"
        type="email"
        id="accountEmail"
        :customClass="{ 'is-invalid': accountInfoForm.errors.email }"
        :errorMsg="accountInfoForm.errors.email"
    />

    <BaseSelect
        label="Gender *"
        id="accountGender"
        v-model="accountInfoForm.gender"
        :customClass="{ 'is-invalid': accountInfoForm.errors.gender }"
        :errorMsg="accountInfoForm.errors.gender"
        :options="$page.props.genders"
    />
</template>

<script setup>
import BaseInput from "@/components/Base/BaseInput.vue";
import BaseSelect from "@/components/Base/BaseSelect.vue";

const props = defineProps({
    accountInfoForm: Object,
});
</script>
