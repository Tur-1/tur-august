<template>
    <div class="mb-3">
        <div class="card border-0">
            <label
                v-for="(address, index) in $page.props.userAddresses"
                :key="address.address_id"
                class="user-address d-flex align-items-center flex-row m-0 p-0"
                :for="'address_id-' + address.address_id"
            >
                <input
                    class="form-check-input ms-3"
                    type="radio"
                    :id="'address_id-' + address.address_id"
                    :value="address.address_id"
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

        <div class="row mb-3 d-flex justify-content-center">
            <div class="border-top border-bottom mt-4 p-2 text-center">
                <a role="button">
                    <span class="text-bold"> new address</span>
                </a>
            </div>
        </div>
    </div>
</template>
