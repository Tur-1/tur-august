<template>
    <div class="col-xl-10 col-lg-10 col-md-9 col-sm-12 col-12">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-4 col-6 mb-4 product-item"
                v-for="(product, index) in $page.props.products.data" :key="index">
                <div class="card product-card">
                    <Link :href="route('productDetailPage', { product_slug: product.slug })">
                    <img loading="lazy" :src="product.main_image" class="card-img-top" alt="..." />
                    </Link>

                    <button tabindex="-1" class="wishlist-btn text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="wishlist-icon in-wishlist" width="22" height="22"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 21.35l-1.45-1.32c-5.15-4.67-8.55-7.75-8.55-11.53 0-3.08 2.42-5.5 5.5-5.5 1.74 0 3.41.81 4.5 2.09 1.09-1.28 2.76-2.09 4.5-2.09 3.08 0 5.5 2.42 5.5 5.5 0 3.78-3.4 6.86-8.55 11.54l-1.45 1.31z">
                            </path>
                        </svg>
                    </button>

                    <div class="card-body product-content-card-body">
                        <span class="product-title">
                            <a href="/" class="text-wrap text-dark">
                                {{ product.brand_name }}
                            </a>
                        </span>

                        <span class="product-description">
                            {{ product.name }}
                        </span>

                        <div class="product-price">
                            <span> {{ product.price }} SAR</span>
                            <span class="discounted-product-price">{{ product.price }} SAR</span>
                            <!-- <span class="product-out-of-stock">
                            out of stock
                        </span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--pagination-->

        <Pagination :links="$page.props.products.links" />
    </div>
</template>
<script setup>
import Pagination from "@/components/Pagination";
</script>
