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
        speed: 900,
        centerMode: false,
        centerPadding: "40px",
        slidesToShow: 6.5,
        autoplay: true,
        slidesToScroll: 2,
        arrows: false,
        swipeToSlide: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    infinite: true,
                    centerMode: false,
                    slidesToShow: 2.5,
                },
            },
        ],
    });
});
</script>
