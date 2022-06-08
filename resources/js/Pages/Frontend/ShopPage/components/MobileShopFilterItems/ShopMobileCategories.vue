

<template>
    <div class="filter-item-wrap">
        <div class="filter-item">
            <button class="filter-item-name" type="button" id="filter-item-brands-btn" @click="openCategoriesOffcanvas">
                <strong>Categories</strong>
                <i class="bi bi-chevron-right fa-lg"></i>
            </button>

            <div class="filtered-items">
                <div class="filtered-items-card">
                    <span class="me-1">women </span>
                    <i class="bi bi-chevron-right me-1 fa-sm"></i>
                    <span>clothing</span>
                    <button class=""><i class="fas fa-close ms-1"></i></button>
                </div>
            </div>
        </div>

        <div class="offcanvas offcanvas-end filter-item-offcanvas" id="filter-item-offcanvas-categories"
            aria-labelledby="staticBackdropLabel">
            <div class="offcanvas-header border-bottom">
                <button type="button" class="bg-transparent border-0" data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="bi bi-chevron-left fa-lg"></i>
                </button>
                <span class="offcanvas-title">Categories</span>

            </div>
            <div class="offcanvas-body filter-item-offcanvas-body">

            </div>
        </div>

    </div>

</template>
<script setup>

const openCategoriesOffcanvas = () =>
{
    $("#filter-item-offcanvas-categories").offcanvas('show');
}


</script>