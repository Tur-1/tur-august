<template>
    <div class="card border-0 mt-4">
        <span class="p-2 text-uppercase"> 4 items</span>
        <div class="p-2 border-top">
            <div class="card-body border-bottom mb-2">
                <div class="row">
                    <div
                        class="col-lg-2 col-xl-2 col-md-2 col-sm-3 col-3"
                        v-for="(product, index) in products"
                    >
                        <a
                            href="http://august.com/product-detail/jin-cole"
                            class="w-100"
                        >
                            <img
                                class="w-100"
                                :src="product.main_image_url"
                                alt="product-thumbnail"
                            />
                        </a>
                    </div>
                    <div
                        class="col-md-10 col-lg-9 col-xl-10 col-sm-9 col-9 mt-1"
                    >
                        <div class="row">
                            <h6>
                                <a>
                                    {{ product.name }}
                                </a>
                            </h6>
                        </div>

                        <!-- <div class="row">
                            <div class="row mt-2 mb-2">
                                <span class="text-muted text-uppercase">
                                    {{ product.pivot.quantity }}: 1</span
                                >
                            </div>

                            <div class="d-flex justify-content-between">
                                <span class="text-muted text-uppercase"
                                    >Size: {{ product.pivot.size_id }}</span
                                >
                                <p class="mb-0">
                                    <span>
                                        <strong id="summary">
                                            {{ product.pivot.total_price }}
                                            SAR
                                        </strong>
                                    </span>
                                </p>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
defineProps(["products"]);
</script>
