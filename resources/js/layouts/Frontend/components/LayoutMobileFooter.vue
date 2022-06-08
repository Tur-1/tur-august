<template>
    <footer id="mobile-footer" class="footer fixed-bottom">
        <ul class="footer-items">
            <li class="footer-item">
                <a class="active-footer-item">
                    <i class="bi bi-house-door-fill "></i>
                    <span class="">Home</span>
                </a>
            </li>
            <li class="footer-item">
                <a data-bs-toggle="offcanvas" data-bs-target="#categories-page-offcanvas" role="button"
                    id="categories-icon">
                    <i class="bi bi-grid"></i>
                    <span>Categories</span>
                </a>
            </li>
            <li class="footer-item">
                <a>
                    <i class="bi bi-bag">

                    </i>
                    <span class="">Cart</span>
                </a>
                <span class="badge-footer cart">1</span>
            </li>
            <li class="footer-item">
                <a>
                    <i class="bi bi-heart">

                    </i>
                    <span>Wishlist</span>
                </a>
                <span class="badge-footer wishlist">0</span>
            </li>
            <li class="footer-item">
                <a>
                    <i class="bi bi-person-circle"></i>
                    <span>My Account</span>
                </a>
            </li>
        </ul>

    </footer>
</template>
