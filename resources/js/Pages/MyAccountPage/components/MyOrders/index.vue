<template>
    <div class="row d-flex justify-content-center">
        <Link
            v-for="(order, index) in $page.props.orders"
            class="col-md-4 col-12 mb-2 pb-1 mt-2 bg-transparent"
            :href="route('orderPage', { orderId: order.id })"
            :id="'order-' + order.id"
        >
            <div class="card shadow-sm p-2">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="text-dark">order no #{{ order.id }}</h5>
                    <span class="text-dark">order details</span>
                </div>
            </div>
            <div
                class="rounded text-center pt-2 pe-3 ps-3 d-flex justify-content-between bg-light text-primary"
            >
                <!-- <p>February 18 ,2022</p> -->
                <p>{{ order.created_at }}</p>
                <p>{{ order.total }} SAR</p>
            </div>
        </Link>
    </div>
</template>
