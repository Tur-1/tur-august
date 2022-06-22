<template lang="">
    <div class="reviews-list">
        <div class="review-item" v-for="(review, index) in $page.props.reviews" :key="review.id">
            <Review :review="review"/>
            <ReviewReply v-if="review.reply.length > 0" :reviewReply="review.reply"/>
        </div>
    </div>
</template>
<script setup>
import Review from "./Review";
import ReviewReply from "./ReviewReply";

</script>
