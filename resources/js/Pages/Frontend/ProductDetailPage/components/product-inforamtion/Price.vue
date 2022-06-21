<template lang="">
    <div class="product-price-wrap mt-3">
        <div class="product-detail-price">
            <div class="product-current-price W-50">
                <span> {{ $page.props.productDetail.price }} </span>
                <span class="discount-amount-badge"
                    v-if="$page.props.productDetail.discounted_price != 0">
                    {{ $page.props.productDetail.discount_amount }}
                </span>
            </div>

            <span
                class="discounted-product-price"
                v-if="$page.props.productDetail.in_stock"
            >
                {{ $page.props.productDetail.discounted_price }}
            </span>
            <span
                class="product-out-of-stock"
                v-if="!$page.props.productDetail.in_stock"
            >
                out of stock
            </span>
        </div>
    </div>
</template>
