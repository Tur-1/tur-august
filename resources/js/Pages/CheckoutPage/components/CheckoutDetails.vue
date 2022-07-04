<template>
    <div class="mb-4">
        <div class="card border-0 p-0">
            <div class="card-body">
                <ul class="list-group list-group-flush checkout-deatils">
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0"
                    >
                        cart subtotal
                        <span
                            >{{
                                $page.props.cartDetails.cartSubTotal
                            }}
                            SAR</span
                        >
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center px-0"
                    >
                        shipment fees
                        <span>
                            {{ $page.props.cartDetails.shipmentFees }}
                        </span>
                    </li>

                    <Transition name="fade" mode="out-in">
                        <li
                            v-show="coupon"
                            style="display: flex"
                            class="list-group-item justify-content-between align-items-center px-0"
                        >
                            Discount: ({{ coupon ? coupon.code : "" }})
                            <span>
                                {{ coupon ? coupon.discounted_value : "" }}
                                SAR
                            </span>
                        </li>
                    </Transition>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0"
                    >
                        <div>
                            <strong>The total amount </strong>
                            <strong>
                                <p class="mb-0">(including VAT)</p>
                            </strong>
                        </div>
                        <span>
                            <strong>
                                {{ $page.props.cartDetails.cartTotal }} SAR
                            </strong>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script setup>
import { usePage } from "@inertiajs/inertia-vue3";
import { computed, ref } from "vue";
let { props: $props } = usePage();

let coupon = ref(computed(() => $props.value.cartDetails.coupon));
</script>
