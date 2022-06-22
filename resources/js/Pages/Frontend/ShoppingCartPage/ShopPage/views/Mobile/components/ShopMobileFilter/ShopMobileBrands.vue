<template>

    <div class="filter-item-wrap">
        <div class="filter-item">
            <button class="filter-item-name" type="button" id="filter-item-brands-btn" @click="openBrandsOffcanvas">
                <strong>Brands</strong>
                <i class="bi bi-chevron-right fa-lg"></i>
            </button>

            <div class="filtered-items" v-show="filters.brand.length > 0">
                <div v-for="(brand, index) in filters.brand" class="filtered-items-card">
                    <span class="me-2">{{ brand }}</span>
                    <button @click="removeFilteredValue($page.props.category.slug, filters.brand, brand)" type="button">
                        <i class="fas fa-close"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="offcanvas offcanvas-end filter-item-offcanvas" id="filter-item-offcanvas-brands"
            aria-labelledby="staticBackdropLabel">
            <div class="offcanvas-header border-bottom">
                <button type="button" class="bg-transparent border-0" @click="closeBrandsOffcanvas" aria-label="Close">
                    <i class="bi bi-chevron-left fa-lg"></i>
                </button>
                <span class="offcanvas-title">Brands</span>

            </div>
            <div class="offcanvas-body filter-item-offcanvas-body">
                <div class="list-group">
                    <label v-for="(brand, index) in $page.props.brands" :key="brand.id">
                        <span class="ms-2">{{ brand.name }} ({{ brand.products_count }})</span>
                        <div class="form-check-input-warp ">
                            <input class="form-check-input " type="checkbox" name="brand[]" :id="'brand-' + brand.id"
                                :value="brand.slug" v-model="filters.brand" />
                        </div>
                    </label>
                </div>
            </div>
        </div>

    </div>

</template>
<script setup>
const props = defineProps({
    filters: Object,
    showFilteredProducts: Function,
    removeFilteredValue: Function
});
const openBrandsOffcanvas = () =>
{
    $("#filter-item-offcanvas-brands").offcanvas('show');
}

const closeBrandsOffcanvas = () =>
{

    props.showFilteredProducts();

    $("#filter-item-offcanvas-brands").offcanvas('hide');
}
</script>