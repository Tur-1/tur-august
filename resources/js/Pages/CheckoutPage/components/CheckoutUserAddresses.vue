<template>
    <div class="mb-3">
        <div
            class="card border-0 mb-1 d-flex justify-content-between align-items-center flex-row"
            v-for="(address, index) in $page.props.userAddresses"
            :key="address.address_id"
        >
            <label
                class="user-address d-flex align-items-center flex-row m-0 p-0"
                :for="'address_id-' + address.address_id"
            >
                <input
                    class="form-check-input ms-3"
                    type="radio"
                    :id="'address_id-' + address.address_id"
                    :value="address.address_id"
                    v-model="checkoutForm.address_id"
                />
                <div class="card-body">
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
            <div class="address_actions me-2">
                <button
                    type="button"
                    class="border-0 bg-transparent btn-sm"
                    @click="openMyAddressBookModal(address)"
                >
                    <i class="bi bi-pencil-square"></i>
                </button>
                <span class="border-start ms-2 me-2"></span>
                <button
                    @click="destroyUserAddress(address.address_id)"
                    type="button"
                    class="border-0 bg-transparent btn-sm"
                >
                    <i class="bi bi-trash3"></i>
                </button>
            </div>
        </div>

        <div class="mb-3 card mt-4 border-0">
            <div class="card-body">
                <a
                    @click="openMyAddressBookModal(null)"
                    role="button"
                    class="d-flex align-items-center text-secondary"
                >
                    <i class="bi bi-plus-circle me-2"></i>
                    <span class="text-bold"> new address</span>
                </a>
            </div>
        </div>
    </div>

    <BaseFormModal
        id="checkout-address-book-modal"
        title="new address"
        submitButtonTitle="save changes"
        cancelButtonTitle="cancel"
        @formSubmited="!editMode ? storeNewAddress() : updateUserAddress()"
        @cancelRequest="closeMyAddressBookModal"
        :formProcessing="myAddressForm.processing"
    >
        <MyAddressForm :myAddressForm="myAddressForm" />
    </BaseFormModal>
</template>
<script setup>
import { ref } from "vue";
import MyAddressForm from "@/Pages/MyAccountPage/components/MyAddressBook/MyAddressForm.vue";
import BaseFormModal from "@/components/Base/BaseFormModal.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

defineProps(["checkoutForm"]);

let editMode = ref(false);
let myAddressForm = useForm({
    address_id: "",
    full_name: "",
    address: "",
    city: "",
    phone_number: "",
    street: "",
});

const openMyAddressBookModal = (address) => {
    if (address != null) {
        myAddressForm.address_id = address.address_id;
        myAddressForm.full_name = address.full_name;
        myAddressForm.address = address.address;
        myAddressForm.city = address.city;
        myAddressForm.phone_number = address.phone_number;
        myAddressForm.street = address.street;
        editMode.value = true;
    }

    $("#checkout-address-book-modal").modal("show");
};

const closeMyAddressBookModal = () => {
    editMode.value = false;
    $("#checkout-address-book-modal").modal("hide");
};

const storeNewAddress = () => {
    editMode.value = false;
    myAddressForm.post(route("storeNewAddress"), {
        onSuccess: (page) => {
            closeMyAddressBookModal();
        },
    });
};
const updateUserAddress = () => {
    myAddressForm.post(route("updateUserAddress", myAddressForm.address_id), {
        onSuccess: (page) => {
            closeMyAddressBookModal();
        },
    });
};

const destroyUserAddress = (address_id) => {
    Inertia.delete(route("destroyUserAddress", { id: address_id }), {
        onBefore: () =>
            confirm("Are you sure you want to delete this address?"),
    });
};
</script>
