<template>
    <footer id="mobile-footer" class="footer fixed-bottom">
        <ul class="footer-items">
            <li class="footer-item">
                <Link :href="route('homePage')" :class="{ 'active-footer-item': route().current('homePage') }">
                <i class="bi bi-house-door-fill"
                    :class="route().current('homePage') ? 'bi bi-house-door-fill' : 'bi bi-house-door'"></i>
                <span class="">Home</span>
                </Link>
            </li>
            <li class="footer-item">
                <a @click="openCategoriesPageOffcanvas" role="button">
                    <i class="bi bi-grid" id="categories-icon"></i>
                    <span>Categories</span>
                </a>
            </li>

            <li class="footer-item">
                <Link :href="route('shoppingCartPage')"
                    :class="{ 'active-footer-item': route().current('shoppingCartPage') }">
                <i :class="route().current('shoppingCartPage') ? 'bi bi-bag-fill' : 'bi bi-bag'">
                </i>
                <span>Cart</span>
                </Link>
                <span class="badge-footer cart">1</span>
            </li>
            <li class="footer-item">
                <Link :href="route('wishlistPage')" :class="{ 'active-footer-item': route().current('wishlistPage') }">
                <i :class="route().current('wishlistPage') ? 'bi bi-heart-fill' : 'bi bi-heart'">
                </i>
                <span>Wishlist</span>
                </Link>
                <span class="badge-footer wishlist">0</span>
            </li>
            <li class="footer-item">
                <Link :href="route('myAccountPage')"
                    :class="{ 'active-footer-item': route().current('myAccountPage') }">
                <i class="bi bi-person-circle"></i>
                <span>My Account</span>
                </Link>
            </li>
        </ul>
    </footer>
</template>
<script setup>

const openCategoriesPageOffcanvas = () =>
{


    $("#categories-page-offcanvas").offcanvas("toggle");

};
</script>
