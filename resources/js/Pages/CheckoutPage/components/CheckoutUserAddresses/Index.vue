<template>
    <CheckoutAddressesList
        @openMyAddressBookModal="openMyAddressBookModal"
        @destroyUserAddress="destroyUserAddress"
        :checkoutForm="checkoutForm"
    />

    <CheckoutAddNewAddress
        @openMyAddressBookModal="openMyAddressBookModal(null)"
    />
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
import CheckoutAddressesList from "@/Pages/CheckoutPage/components/CheckoutUserAddresses/CheckoutAddressesList.vue";
import CheckoutAddNewAddress from "@/Pages/CheckoutPage/components/CheckoutUserAddresses/CheckoutAddNewAddress.vue";

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
