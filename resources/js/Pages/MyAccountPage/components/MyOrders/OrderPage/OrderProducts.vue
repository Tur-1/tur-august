<template>
    <div class="card border-0 mt-4">
        <span class="p-2 text-uppercase">
            {{ $page.props.products.length }} items</span
        >
        <div class="p-2 border-top">
            <div
                class="row mb-2"
                v-for="(product, index) in $page.props.products"
                :key="product.id"
            >
                <div class="col-lg-2 col-xl-2 col-md-2 col-sm-3 col-3">
                    <Link :href="product.link" class="w-100">
                        <img
                            class="w-100 h-100"
                            :src="product.main_image_url"
                            alt="product-thumbnail"
                        />
                    </Link>
                </div>
                <div class="col-md-10 col-lg-9 col-xl-10 col-sm-9 col-9 mt-1">
                    <div class="row">
                        <h6>
                            <Link :href="product.link">
                                {{ product.brand_name }}
                            </Link>
                        </h6>
                        <h6>
                            <Link :href="product.link">
                                {{ product.name }}
                            </Link>
                        </h6>
                    </div>

                    <div class="row">
                        <div class="row mt-2 mb-2">
                            <p class="mb-0">quantity: {{ product.quantity }}</p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <p class="mb-0">size: {{ product.size }}</p>
                            <p class="mb-0">
                                <strong id="summary">
                                    {{ product.total_price }}
                                    SAR
                                </strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
