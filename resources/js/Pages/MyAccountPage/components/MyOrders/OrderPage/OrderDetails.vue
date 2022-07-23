<template>
    <div class="card border-0 bg-white mb-3">
        <div class="card-body" style="font-size: 16px; font-weight: 600">
            <div class="d-flex justify-content-between mb-2">
                <div class="d-flex">
                    <i class="bi bi-box-seam me-3"></i>
                    <span class="text-uppercase">order no :</span>
                </div>
                <span>{{ $page.props.order.id }}</span>
            </div>
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    <i class="bi bi-calendar2-minus me-3"></i>
                    <span class="text-uppercase">order date :</span>
                </div>
                <span>{{ $page.props.order.created_at }}</span>
            </div>
        </div>
    </div>
    <div class="card border-0 bg-white">
        <div class="border-bottom text-start">
            <h6 class="p-3 mb-0">order detals</h6>
        </div>

        <div class="card-body p-0">
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
                    <span
                        class="badge rounded-pill bg-primary"
                        style="line-height: normal"
                        >{{ $page.props.order.status }}</span
                    >
                </li>
            </ul>
        </div>
    </div>
</template>
