<template >
    <AdminLayout>

        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Dashboard </h2>

            </div>
            <div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="card card-body mb-4">
                    <article class="icontext">
                        <span class="icon icon-sm rounded-circle bg-primary-light"><i
                                class="text-primary material-icons md-monetization_on"></i></span>
                        <div class="text">
                            <h6 class="mb-1 card-title">Revenue</h6>
                            <span>35353 SAR</span>

                        </div>
                    </article>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-body mb-4">
                    <article class="icontext">
                        <span class="icon icon-sm rounded-circle bg-success-light"><i
                                class="text-success material-icons md-local_shipping"></i></span>
                        <div class="text">
                            <h6 class="mb-1 card-title">Orders</h6> <span>23234</span>

                        </div>
                    </article>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-body mb-4">
                    <article class="icontext">
                        <span class="icon icon-sm rounded-circle bg-warning-light"><i
                                class="text-warning material-icons md-qr_code"></i></span>
                        <div class="text">
                            <h6 class="mb-0 card-title">
                                Products
                            </h6>
                            <small>775</small>
                            <span class="text-sm">
                                In 33 Categories
                            </span>
                        </div>
                    </article>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-body mb-4">
                    <article class="icontext">
                        <span class="icon icon-sm rounded-circle bg-info-light"><i
                                class="text-info material-icons md-shopping_basket"></i></span>
                        <div class="text">
                            <h6 class="mb-1 card-title">Monthly Earning</h6> <span>454 SAR</span>

                        </div>
                    </article>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <header class="card-header">
                <h4 class="card-title">Latest orders</h4>

            </header>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="align-middle" scope="col">Order ID</th>
                                    <th class="align-middle" scope="col">Billing Name</th>
                                    <th class="align-middle" scope="col">Order Date</th>
                                    <th class="align-middle" scope="col">coupon</th>

                                    <th class="align-middle" scope="col">Items</th>
                                    <th class="align-middle" scope="col">Total</th>
                                    <th class="align-middle" scope="col">Status </th>
                                    <th class="align-middle" scope="col">View Details</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>
                </div> <!-- table-responsive end// -->
            </div>
        </div>
    </AdminLayout>
</template>
<script setup>
import AdminLayout from "@/layouts/Backend/AdminLayout";


</script>
