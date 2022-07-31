<template>
    <div class="card border-0 mt-4 mb-5">
        <span class="p-2 text-uppercase">
            {{ $page.props.products.length }} items</span
        >
        <div class="border-top">
            <div
                class="checkout-product"
                v-for="(product, index) in $page.props.products"
                :key="product.id"
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
                            <span
                                class="checkout-product-current-price text-primary"
                            >
                                {{ product.total_price }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
