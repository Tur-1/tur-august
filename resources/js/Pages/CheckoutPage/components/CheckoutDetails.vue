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
                    <li
                        v-if="$page.props.cartTotalWithCoupon"
                        class="list-group-item d-flex justify-content-between align-items-center px-0"
                    >
                        Discount: (
                        {{ $page.props.cartTotalWithCoupon.coupon.code }} )
                        <span>
                            {{
                                $page.props.cartTotalWithCoupon.coupon
                                    .discounted_value
                            }}
                            SAR
                        </span>
                    </li>
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
                                {{
                                    $page.props.cartTotalWithCoupon
                                        ? $page.props.cartTotalWithCoupon
                                              .cartTotal
                                        : $page.props.cartDetails.cartTotal
                                }}
                                SAR
                            </strong>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <button class="btn btn-primary p-2 mt-3 w-100" @click="buyNow">
            Buy Now
        </button>
    </div>
</template>
<script setup>
import { Inertia } from "@inertiajs/inertia";

const buyNow = () => {
    Inertia.post(route("buyNow"));
};
</script>
