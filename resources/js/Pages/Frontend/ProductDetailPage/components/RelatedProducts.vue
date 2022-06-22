<template>
    <section class="horizontal-section">
        <h6 class="section-title"><span>Related</span> Products</h6>
        <div class="section-container">
            <div id="slick-products" class="pb-5">
                <ProductCard
                    :products="$page.props.relatedProducts"
                    customClass="."
                />
            </div>
        </div>
    </section>
</template>
<script setup>
import ProductCard from "@/components/ProductCard.vue";
import { onMounted } from "vue";

onMounted(() => {
    $("#slick-products").slick({
        infinite: true,
        speed: 500,
        centerMode: false,
        centerPadding: "40px",
        slidesToShow: 6,
        autoplay: true,
        slidesToScroll: 2,
        arrows: false,
        swipeToSlide: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: false,
                    centerPadding: "40px",
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerPadding: "40px",
                    centerMode: false,
                    slidesToShow: 2,
                },
            },
        ],
    });
});
</script>
