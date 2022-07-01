<template>
    <header class="desktop-navbar">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <h3 class="navbar-brand">August</h3>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div
                    class="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <Link
                                :class="
                                    route().current('homePage') ? 'active' : ''
                                "
                                href="/"
                            >
                                Home
                            </Link>
                        </li>
                        <li
                            class="nav-item"
                            v-for="(section, index) in $page.props.sections"
                            :key="index"
                        >
                            <Link
                                :href="section.link"
                                :class="{
                                    active:
                                        section.active_section_slug ==
                                        section.slug,
                                }"
                            >
                                {{ section.name }}
                            </Link>
                        </li>
                    </ul>

                    <div class="nav-icons-container">
                        <Link
                            :href="route('myAccountPage')"
                            preserve-state
                            class="nav-icons"
                        >
                            <img
                                class="svgInject"
                                alt="Evara"
                                src="/assets/icons/account.svg"
                            />
                        </Link>
                        <Link
                            class="nav-icons"
                            :href="route('wishlistPage')"
                            preserve-state
                        >
                            <img
                                class="svgInject"
                                alt="Evara"
                                src="/assets/icons/icon-heart.svg"
                            />
                        </Link>
                        <Link
                            :href="route('shoppingCartPage')"
                            preserve-state
                            class="nav-icons"
                        >
                            <img
                                alt="Evara"
                                src="/assets/icons/icon-cart.svg"
                            />
                            <span class="badge badge-circle">
                                {{ $page.props.cartCounter }}
                            </span>
                        </Link>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>
