<template>
    <div class="filter-item-wrap">
        <div class="filter-item">
            <button
                class="filter-item-name"
                type="button"
                id="filter-item-colors-btn"
                @click="openColorsOffcanvas"
            >
                <strong>Colors</strong>
                <i class="bi bi-chevron-right fa-lg"></i>
            </button>

            <div class="filtered-items" v-show="filters.color.length > 0">
                <div
                    class="filtered-items-card"
                    v-for="(colorItem, index) in filters.color"
                    :key="index"
                >
                    <span class="me-2">{{ colorItem }}</span>
                    <button
                        type="button"
                        @click="
                            removeFilteredValue(
                                $page.props.category.slug,
                                filters.color,
                                colorItem
                            )
                        "
                    >
                        <i class="bi bi-x"></i>
                    </button>
                </div>
            </div>
        </div>

        <div
            class="offcanvas offcanvas-end filter-item-offcanvas"
            id="filter-item-offcanvas-colors"
            aria-labelledby="staticBackdropLabel"
        >
            <div class="offcanvas-header border-bottom">
                <button
                    type="button"
                    class="bg-transparent border-0"
                    @click="closeColorsOffcanvas"
                    aria-label="Close"
                >
                    <i class="bi bi-chevron-left fa-lg"></i>
                </button>
                <span class="offcanvas-title">Colors</span>
            </div>
            <div class="offcanvas-body filter-item-offcanvas-body">
                <div class="list-group">
                    <label
                        v-for="(color, index) in $page.props.colors"
                        :key="index"
                    >
                        <div class="d-flex flex-row">
                            <img
                                :src="color.image_url"
                                width="20"
                                alt="Black"
                            />
                            <span class="ms-2"
                                >{{ color.name }} ({{
                                    color.products_count
                                }})</span
                            >
                        </div>

                        <div class="form-check-input-warp">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="color[]"
                                :id="'color-' + color.id"
                                :value="color.slug"
                                v-model="filters.color"
                            />
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
    removeFilteredValue: Function,
});
const openColorsOffcanvas = () => {
    $("#filter-item-offcanvas-colors").offcanvas("show");
};

const closeColorsOffcanvas = () => {
    props.showFilteredProducts();
    $("#filter-item-offcanvas-colors").offcanvas("hide");
};
</script>
