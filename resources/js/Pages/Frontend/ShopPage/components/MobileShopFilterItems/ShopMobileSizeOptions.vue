<template>

    <div class="filter-item-wrap">
        <div class="filter-item">
            <button class="filter-item-name" type="button" id="filter-item-size-btn" @click="openSizeOffcanvas">
                <strong>Size</strong>
                <i class="bi bi-chevron-right fa-lg"></i>
            </button>

            <div class="filtered-items" v-if="filters.sizeOptions[0]">
                <div class="filtered-items-card" v-for="(size, index) in filters.sizeOptions" :key="index">
                    <span class="me-2">{{ size }}</span>
                    <button class=""><i class="fas fa-close"></i></button>
                </div>
            </div>
        </div>

        <div class="offcanvas offcanvas-end filter-item-offcanvas" id="filter-item-offcanvas-size"
            aria-labelledby="staticBackdropLabel">
            <div class="offcanvas-header border-bottom">
                <button type="button" class="bg-transparent border-0" data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="bi bi-chevron-left fa-lg"></i>
                </button>
                <span class="offcanvas-title">Size</span>

            </div>
            <div class="offcanvas-body filter-item-offcanvas-body">
                <div class="list-group">
                    <label v-for="(size, index) in $page.props.sizeOptions" :key="size.id">
                        <span class="ms-2">{{ size.name }} ({{ size.products_count }})</span>
                        <div class="form-check-input-warp ">
                            <input class="form-check-input " type="checkbox" name="sizeOptions[]"
                                :id="'size-' + size.id" :value="size.slug" v-model="filters.sizeOptions" />
                        </div>
                    </label>
                </div>
            </div>
        </div>

    </div>

</template>
<script setup>
defineProps({
    filters: Object,
});
const openSizeOffcanvas = () =>
{
    $("#filter-item-offcanvas-size").offcanvas('show');
}


</script>