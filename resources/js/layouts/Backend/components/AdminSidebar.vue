 
<template>
    <aside class="navbar-aside layout-sidebar" id="offcanvas_aside">
        <div class="aside-top">
            <a class="brand-wrap  text-decoration-none">
                <h4>AUGUST</h4>
            </a>
            <div>
                <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i>
                </button>
            </div>
        </div>
        <nav>
            <ul class="menu-aside">
                <li class="menu-item  ">
                    <Link class="menu-link">
                    <i class="icon material-icons md-home"></i>
                    <span class="text">Dashboard</span>
                    </Link>
                </li>
                <li class="menu-item has-submenu ">
                    <a class="menu-link" href="#"> <i class="icon material-icons md-people"></i>
                        <span class="text"> Users </span>
                    </a>
                    <div class="submenu ">
                        <a>
                            <p>users</p>
                        </a>
                        <a>
                            <p>Roles</p>
                        </a>
                    </div>
                </li>
                <li class="menu-item ">
                    <a class="menu-link"> <i class="icon material-icons md-groups"></i>
                        <span class="text">Customers</span> </a>
                </li>
                <li class="menu-item ">
                    <a class="menu-link"> <i class="icon material-icons md-all_inbox"></i>
                        <span class="text">Orders</span> </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link"> <i class="icon material-icons md-list_alt"></i>
                        <span class="text">Orders Status</span> </a>
                </li>
                <li class="menu-item has-submenu ">
                    <a class="menu-link" href="page-products-list.html"> <i
                            class="icon material-icons md-shopping_bag"></i>
                        <span class="text">Products</span>
                    </a>
                    <div class="submenu">

                        <a>Add product </a>
                        <a>Product List</a>
                    </div>
                </li>
                <li class="menu-item ">
                    <a class="menu-link"> <i class="icon material-icons md-list_alt"></i>
                        <span class="text">Categories</span> </a>
                </li>


                <li class="menu-item ">
                    <a class="menu-link"> <i class="icon material-icons md-crop_original"></i>
                        <span class="text">Banners</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link"> <i class="icon material-icons md-comment"></i>
                        <span class="text">Reviews</span>
                    </a>
                </li>
                <li class="menu-item ">
                    <a class="menu-link"> <i class=" icon material-icons md-local_offer"></i>
                        <span class="text">Coupons</span>
                    </a>
                </li>
                <li class="menu-item ">
                    <a class="menu-link"> <i class=" icon material-icons md-stars"></i>
                        <span class="text">Brands</span> </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link"> <i class="icon material-icons md-palette"></i>
                        <span class="text">Colors</span>
                    </a>
                </li>
                <li class="menu-item ">
                    <a class="menu-link"> <i class=" icon material-icons md-straighten"></i>
                        <span class="text">Size Options</span>
                    </a>
                </li>
                <li class="menu-item ">
                    <a class="menu-link"> <i class=" icon material-icons md-view_list"></i>
                        <span class="text">Price List</span>
                    </a>
                </li>
            </ul>

        </nav>
    </aside>
</template>