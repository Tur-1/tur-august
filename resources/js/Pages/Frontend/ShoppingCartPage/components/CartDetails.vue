
<template>
    <div class="col-lg-4 mb-5">
        <div class="card border-0 p-0">
            <div class="card-body ">
                <ul class=" list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                        Cart Subtotal
                        <span>423 SAR</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        Shipment Fees
                        <span> Free </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                        <div>
                            <strong>The total amount </strong>
                            <strong>
                                <p class="mb-0">(including VAT)</p>
                            </strong>
                        </div>
                        <span><strong>486.45 SAR</strong></span>
                    </li>
                </ul>

            </div>
        </div>
        <Link :href="route('checkoutPage')" class="btn btn-primary  w-100 p-2 mt-3">
        <i class="fas fa-credit-card me-2"></i>
        proceed to checkout
        </Link>
    </div>

</template>

<script>
export default {

}
</script>

<style>
</style>