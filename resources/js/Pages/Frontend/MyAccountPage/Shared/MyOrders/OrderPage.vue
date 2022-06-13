
<template>
    <div class="offcanvas offcanvas-end" :id="orderId" aria-labelledby="staticBackdropLabel">
        <div class="offcanvas-header ">
            <button type="button" class="close-offcanvas-btn" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="bi bi-chevron-left "></i>
            </button>

            <h5 class="offcanvas-title" id="staticBackdropLabel">order #1</h5>
            <div></div>
        </div>
        <div class="offcanvas-body bg-light">

        </div>
    </div>
</template>
<script setup>
defineProps(['orderId']);
</script>