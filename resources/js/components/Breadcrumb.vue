<template lang="">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="breadcrumb text-wrap">
                    <div class="breadcrumb-item">
                        <a href="http://august.com"> Home</a>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <span class="current-breadcrumb-item"> {{ pageTitle }}</span>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
defineProps({
    pageTitle: String
})
</script>

 
