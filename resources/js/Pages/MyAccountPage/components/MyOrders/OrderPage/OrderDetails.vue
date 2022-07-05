<template>
    <div class="card border-0 bg-white">
        <div class="border-bottom text-center">
            <h5 class="mb-0 p-3">Order #{{ $page.props.order.id }}</h5>
        </div>

        <div class="card-body">
            <ul class="list-group ist-group-flush">
                <li
                    class="list-group-item d-flex justify-content-between border-0"
                >
                    <span class="text-center">SubTotal</span>
                    <span class="product-subtotal" colspan="2">
                        {{ $page.props.order.subtotal }} SAR
                    </span>
                </li>

                <li
                    class="list-group-item d-flex justify-content-between border-0"
                >
                    <span class="text-center">Shipping</span>
                    <span class="product-subtotal" colspan="2">
                        {{
                            $page.props.order.shipping_fees == 0
                                ? "Free"
                                : $page.props.order.shipping_fees
                        }}
                    </span>
                </li>

                <li
                    class="list-group-item d-flex justify-content-between border-0"
                >
                    <span class="text-center">Total</span>
                    <span class="product-subtotal" colspan="2">
                        {{ $page.props.order.total }} SAR
                    </span>
                </li>
                <li
                    class="list-group-item d-flex justify-content-between border-0"
                >
                    <span class="text-center">Status</span>
                    <span class="badge rounded-pill bg-primary">Completed</span>
                </li>
            </ul>
        </div>
    </div>
</template>
