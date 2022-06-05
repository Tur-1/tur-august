 
<template>
    <div class="cart-btn-wrraper">
        <button class="btn btn-primary cart-btn" @click="addToShoppingCart" :disabled="form.processing">
            Add to cart
            <div class="spinner-border spinner-border-sm" role="status" v-if="form.processing">
                <span class="visually-hidden">Loading...</span>
            </div>
        </button>
    </div>
</template>

<script setup>
import { ref, watch } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    size_id: Number,
    product_id: Number,

})
let form = useForm({
    size_id: '',
    product_id: ''
});

const addToShoppingCart = () =>
{
    form.size_id = props.size_id;
    form.product_id = props.product_id;
    form.post("/add-to-cart", form);

};
</script>

 