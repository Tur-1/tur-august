import { Inertia } from "@inertiajs/inertia";

const GetFilters = (checked, link) =>
{
    Inertia.get(link, {
        brand: checked.brand,
        color: checked.color,
        sort: checked.sort,
        sizeOptions: checked.sizeOptions
    }, {
        preserveState: true,
        replace: true
    });
};

export default GetFilters;