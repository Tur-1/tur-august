

import { ref } from "vue";

export const useCartTotal = ref({
    cartTotal: 0,
    setCartTotal(value)
    {
        this.size_id = value;
    }
});
