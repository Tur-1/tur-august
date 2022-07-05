<template>
    <div class="mb-3">
        <div
            class="card border-0 mb-1"
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
                <div
                    class="d-flex justify-content-between align-items-center card-body"
                >
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
        </div>

        <div class="mb-3 card mt-4 border-0">
            <div class="card-body">
                <a
                    role="button"
                    class="d-flex align-items-center text-secondary"
                >
                    <i class="bi bi-plus-circle me-2"></i>
                    <span class="text-bold"> new address</span>
                </a>
            </div>
        </div>
    </div>
</template>
<script setup>
defineProps(["checkoutForm"]);
</script>
