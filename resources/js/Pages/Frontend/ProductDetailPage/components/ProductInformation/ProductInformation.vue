<template lang="">
    <div class="col-lg-5 col-md-6">
        <div class="row">
            <div class="product-detail-info">
                <Brand />
                <Title />
                <Price />
                <QualityInfo />
            </div>

            <div wire:id="lwMAxlhl170kDFBgmvXo">
                <div class="add-product-warp">
                    <AddToCartButton />
                    <AddToWshlistButton />
                </div>
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


</script>
