<template>
    <div
        class="card border-0 mb-1 d-flex justify-content-between align-items-center flex-row"
        v-for="(address, index) in $page.props.userAddresses"
        :key="address.address_id"
    >
        <label
            class="user-address d-flex align-items-center flex-row m-0 p-0"
            style="width: 80%"
            :for="'address_id-' + address.address_id"
        >
            <input
                class="form-check-input ms-3"
                type="radio"
                :id="'address_id-' + address.address_id"
                :value="address.address_id"
                v-model="checkoutForm.address_id"
            />
            <div class="checkout_address_card_body">
                <div class="d-flex flex-column">
                    <span class="card-title">{{ address.full_name }}</span>

                    <small class="text-secondary" style="font-size: 12px">
                        {{ address.phone_number }}
                    </small>
                    <div class="row">
                        <span>
                            {{ address.city }} , {{ address.street }} ,
                            {{ address.address }}
                        </span>
                    </div>
                </div>
            </div>
        </label>
        <div class="address_actions d-flex">
            <button
                type="button"
                class="border-0 bg-transparent btn-sm"
                @click="$emit('openMyAddressBookModal', address)"
            >
                <i class="bi bi-pencil-square"></i>
            </button>
            <span class="border-start ms-2 me-2"></span>
            <button
                @click="$emit('destroyUserAddress', address.address_id)"
                type="button"
                class="border-0 bg-transparent btn-sm"
            >
                <i class="bi bi-trash3"></i>
            </button>
        </div>
    </div>
</template>
<script setup>
defineEmits(["openMyAddressBookModal", "destroyUserAddress"]);

defineProps(["checkoutForm"]);
</script>
