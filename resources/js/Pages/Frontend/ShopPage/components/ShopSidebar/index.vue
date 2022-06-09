
<template>

    <div class="shop-sidebar col-lg-2 col-md-3">
        <Categories />
        <Brands :filters="filters" />
        <Colors :filters="filters" />
        <SizeOptions :filters="filters" />

    </div>
</template>

<script setup>
import Categories from "./Categories";
import Brands from "./Brands";
import Colors from "./Colors";
import SizeOptions from "./SizeOptions";
import { ref, watch } from "vue";
import GetFilters from "@/Pages/Frontend/ShopPage/Helpers/GetFilters";

const props = defineProps({
    categorySlug: String,
    queryString: Object,
});

let colorsValues = props.queryString.color ?? [props.queryString.color];
let brandsValues = props.queryString.brand ?? [props.queryString.brand];
let sizeValues = props.queryString.sizeOptions ?? [props.queryString.sizeOptions];


let filters = ref({ brand: brandsValues, color: colorsValues, sizeOptions: sizeValues });

watch(filters, (checked) => GetFilters(checked, props.categorySlug), {
    deep: true,
});
</script>