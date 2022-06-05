<template lang="">
    <div class="col-lg-5 col-md-6">
        <div class="row">
            <div class="product-detail-info">
                <Brand />
                <Title />
                <Price />
                <QualityInfo />
            </div>
 
                <SizeOptions @sizeSelected="getSizeSelected" />
                <div class="add-product-warp">
                     <AddToCartButton :size_id="size_id" :product_id="$page.props.productDetail.id"/>
                    <AddToWshlistButton />
                </div>
             
        </div>
    </div>
</template>
<script setup>
import AddToCartButton from "./AddToCartButton";
import AddToWshlistButton from "./AddToWshlistButton";
import Brand from "./Brand";
import Title from "./Title";
import Price from "./Price";
import QualityInfo from "./QualityInfo";
import SizeOptions from "./SizeOptions";

import { ref, watch } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

let size_id = ref(0);

const getSizeSelected = (sizeSelected) =>
{
    size_id.value = sizeSelected;
}

</script>
