import { ref } from "vue";

export const SelectedSize = ref({
    size_id: 0,
    getSizeId(value)
    {
        this.size_id = value;
    }
});
