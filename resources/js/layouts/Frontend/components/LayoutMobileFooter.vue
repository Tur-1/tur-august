<template>
    <footer id="mobile-footer" class="footer fixed-bottom">
        <ul class="footer-items">
            <li class="footer-item">
                <Link :href="route('homePage')" class="active-footer-item">
                <i class="bi bi-house-door-fill "></i>
                <span class="">Home</span>
                </Link>
            </li>

            <CategoriesPage :sections="$page.props.sections" />
            <li class="footer-item">
                <Link :href="route('shoppingCartPage')">
                <i class="bi bi-bag"> </i>
                <span class="">Cart</span>
                </Link>
                <span class="badge-footer cart">1</span>
            </li>
            <li class="footer-item">
                <Link :href="route('wishlistPage')">
                <i class="bi bi-heart">

                </i>
                <span>Wishlist</span>
                </Link>
                <span class="badge-footer wishlist">0</span>
            </li>
            <li class="footer-item">
                <Link :href="route('myAccountPage')">
                <i class="bi bi-person-circle"></i>
                <span>My Account</span>
                </Link>
            </li>
        </ul>

    </footer>



</template>
<script setup>
import CategoriesPage from "../Categories/CategoriesPage.vue";

</script>