<template>
    <div class="filter-item-wrap">
        <div class="filter-item">
            <button
                class="filter-item-name"
                type="button"
                id="filter-item-brands-btn"
                @click="openCategoriesOffcanvas"
            >
                <strong>Categories</strong>
                <i class="bi bi-chevron-right fa-lg"></i>
            </button>
            <div class="filtered-items">
                <div class="filtered-items-card">
                    <Link
                        v-for="(breadcrumbItem, index) in $page.props
                            .breadcrumb"
                        :key="index"
                        :href="
                            route('shopPage', {
                                category_slug: breadcrumbItem.slug,
                            })
                        "
                    >
                        <span class="me-2">{{ breadcrumbItem.name }}</span>
                        <i class="bi bi-chevron-right me-1 fa-sm"></i>
                    </Link>
                    <span>{{ $page.props.category.name }}</span>
                    <button class=""><i class="bi bi-x"></i></button>
                </div>
            </div>
        </div>

        <div
            class="offcanvas offcanvas-end filter-item-offcanvas"
            id="filter-item-offcanvas-categories"
            aria-labelledby="staticBackdropLabel"
        >
            <div class="offcanvas-header border-bottom">
                <button
                    type="button"
                    class="bg-transparent border-0"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close"
                >
                    <i class="bi bi-chevron-left fa-lg"></i>
                </button>
                <span class="offcanvas-title">Categories</span>
            </div>
            <div class="offcanvas-body filter-item-offcanvas-body">
                <div class="list-group">
                    <label
                        v-for="(category, index) in $page.props.category
                            .children"
                        :key="category.id"
                    >
                        <Link
                            class="text-dark"
                            :href="
                                route('shopPage', {
                                    category_slug: category.slug,
                                })
                            "
                        >
                            {{ category.name }}
                        </Link>
                    </label>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
const props = defineProps({
    showFilteredProducts: Function,
});
const openCategoriesOffcanvas = () => {
    $("#filter-item-offcanvas-categories").offcanvas("show");
};
</script>
