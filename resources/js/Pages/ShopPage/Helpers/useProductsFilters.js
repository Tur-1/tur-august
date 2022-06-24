import { Inertia } from "@inertiajs/inertia";

import { ref } from "vue";

export default function useProductsFilters(queryString)
{
    let filters = ref({
        brand: queryString.brand ?? [],
        color: queryString.color ?? [],
        sizeOptions: queryString.sizeOptions ?? []
    });

    const getFilteredProducts = (link) =>
    {
        Inertia.get(link, {
            brand: filters.value.brand,
            color: filters.value.color,
            sort: filters.value.sort,
            sizeOptions: filters.value.sizeOptions
        }, {
            preserveState: true,
            replace: true
        });
    };

    const removeFilteredValue = (link, queryString, value) =>
    {
        queryString.splice(queryString.indexOf(value), 1);
        getFilteredProducts(link);
    }

    const clearProductsFilters = (link) =>
    {
        filters.value.brand = [];
        filters.value.color = [];
        filters.value.sizeOptions = [];
        getFilteredProducts(link);
    }
    return { filters, clearProductsFilters, getFilteredProducts, removeFilteredValue }
}



