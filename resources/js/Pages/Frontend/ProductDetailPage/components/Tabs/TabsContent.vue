<template >
    <div class="tab-content shop_info_tab entry-main-content">
        <div class="tab-pane fade show active" id="Description">

            <div v-html="$page.props.productDetail.details">

            </div>
        </div>
        <div class="tab-pane fade" id="Additional-info">
            <div v-html="$page.props.productDetail.information">

            </div>
        </div>

        <!--Reviews-->
        <div class="tab-pane fade" id="Reviews">
            <Reviews />
        </div>
    </div>
</template>
<script setup>
import Reviews from '@/Pages/Frontend/ProductDetailPage/components/Reviews/Reviews.vue';

</script>
 
