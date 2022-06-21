<template>
    <div class="product-detail-brand">
        <h4 class="title-detail">{{ $page.props.productDetail.brand_name }}</h4>
        <img :src="$page.props.productDetail.brand_image_url" :alt="$page.props.productDetail.brand_name" width="60" />
    </div>
</template>
