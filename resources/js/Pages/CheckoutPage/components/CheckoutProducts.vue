<template>
    <div
        class="checkout-product"
        v-for="(product, index) in $page.props.products"
        :key="product.cart_id"
    >
        <a class="checkout-product-img me-2">
            <img :src="product.main_image_url" class="img-fluid" />
        </a>
        <div class="checkout-product-detail">
            <div class="checkout-product-info">
                <Link :href="product.link">
                    <span class="checkout-product-brand">
                        {{ product.brand_name }}
                    </span>
                </Link>

                <span class="checkout-product-description">
                    {{ product.name }}
                </span>
                <span class="checkout-product-size">
                    size: {{ product.size }}
                </span>
                <span class="checkout-product-qty">
                    Quantity: {{ product.quantity }}
                </span>
            </div>

            <div class="checkout-product-price">
                <div class="d-flex flex-column">
                    <span class="product-out-of-stock" v-if="!product.in_stock">
                        out of stock
                    </span>

                    <span
                        class="checkout-product-discounted-price"
                        v-if="product.in_stock"
                    >
                        {{ product.discounted_price }}
                    </span>
                    <span class="checkout-product-current-price text-primary">
                        {{ product.price }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>
