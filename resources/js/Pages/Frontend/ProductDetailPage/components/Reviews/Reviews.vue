<template lang="">
    <div class="tab-pane fade active show" id="Reviews">
        <div class="reviews-area">
            <ReviewForm />

            <ReviewItem />
        </div>
    </div>
</template>
<script>
import ReviewForm from "./ReviewForm";
import ReviewItem from "./ReviewItem";
export default {
    components: {
        ReviewForm,
        ReviewItem,
    },
};
</script>
<style lang=""></style>
