<template>
    <div class="review-reply">
        <div class="review-user-image me-3">
            <i class="fas fa-share fa-flip-vertical"></i>
            <img
                :src="reviewReply.user.avatar_url"
                width="40"
                class="rounded-circle"
            />
        </div>
        <div class="d-flex flex-column w-100">
            <div class="d-flex flex-row justify-content-between text-center">
                <span class="d-block font-weight-bold">
                    {{ reviewReply.user.name }}
                </span>
                <span class="date text-sm"> {{ reviewReply.date }} </span>
            </div>
            <div class="mt-2 text-wrap">
                <p class="comment-text text-break">{{ reviewReply.comment }}</p>
            </div>
        </div>
    </div>
</template>
<script setup>
const props = defineProps({
    reviewReply: Object,
});
</script>
