<template>
    <footer id="mobile-footer" class="footer fixed-bottom">
        <ul class="footer-items">
            <li class="footer-item">
                <Link
                    :href="route('homePage')"
                    :class="{
                        'active-footer-item': route().current('homePage'),
                    }"
                >
                    <i
                        class="bi bi-house-door-fill"
                        :class="
                            route().current('homePage')
                                ? 'bi bi-house-door-fill'
                                : 'bi bi-house-door'
                        "
                    ></i>
                    <span class="">Home</span>
                </Link>
            </li>
            <li class="footer-item">
                <Link
                    :href="route('shop.shopPage')"
                    :class="{
                        'active-footer-item': route().current('shop.*'),
                    }"
                >
                    <i
                        :class="
                            route().current('shop.*')
                                ? 'bi bi-grid-fill'
                                : 'bi bi-grid'
                        "
                    >
                    </i>
                    <span>Categories</span>
                </Link>
            </li>

            <li class="footer-item">
                <Link
                    :href="route('shoppingCartPage')"
                    :class="{
                        'active-footer-item':
                            route().current('shoppingCartPage'),
                    }"
                >
                    <i
                        :class="
                            route().current('shoppingCartPage')
                                ? 'bi bi-bag-fill'
                                : 'bi bi-bag'
                        "
                    >
                    </i>
                    <span>Cart</span>
                </Link>
                <span class="badge-footer cart">{{
                    $page.props.cartCounter
                }}</span>
            </li>
            <li class="footer-item">
                <Link
                    :href="route('wishlistPage')"
                    :class="{
                        'active-footer-item': route().current('wishlistPage'),
                    }"
                >
                    <i
                        :class="
                            route().current('wishlistPage')
                                ? 'bi bi-heart-fill'
                                : 'bi bi-heart'
                        "
                    >
                    </i>
                    <span>Wishlist</span>
                </Link>
            </li>
            <li class="footer-item">
                <Link
                    :href="route('myAccountPage')"
                    :class="{
                        'active-footer-item': route().current('myAccountPage'),
                    }"
                >
                    <i class="bi bi-person-circle"></i>
                    <span>My Account</span>
                </Link>
            </li>
        </ul>
    </footer>
</template>
<script setup>
// const openCategoriesPageOffcanvas = () => {
//     if (!route().current("shopPage")) {
//         if (!$("#categories-page-offcanvas").hasClass("show")) {
//             document.getElementById("categories-icon").className =
//                 "bi bi-grid-fill";
//             document.getElementById("categories-button").className =
//                 "active-footer-item";
//         } else {
//             document.getElementById("categories-icon").className = "bi bi-grid";
//             document.getElementById("categories-button").className = "";
//         }
//     }
//     $("#categories-page-offcanvas").offcanvas("toggle");
// };
</script>
