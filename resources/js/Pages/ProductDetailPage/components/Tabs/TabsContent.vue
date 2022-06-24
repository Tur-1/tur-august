<template>
    <div class="tab-content shop_info_tab entry-main-content">
        <div class="tab-pane fade show active" id="Description">
            <div v-html="$page.props.productDetail.details"></div>
        </div>
        <div class="tab-pane fade" id="Additional-info">
            <div v-html="$page.props.productDetail.information"></div>
        </div>

        <!--Reviews-->
        <div class="tab-pane fade" id="Reviews">
            <div class="tab-pane fade active show" id="Reviews">
                <div class="reviews-area">
                    <ReviewForm :productSlug="$page.props.productDetail.slug" />

                    <ReviewsList />
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import ReviewsList from "@/Pages/ProductDetailPage/components/Reviews/ReviewsList.vue";
import ReviewForm from "@/Pages/ProductDetailPage/components/Reviews/ReviewForm.vue";
</script>
