<aside class="navbar-aside layout-sidebar" id="offcanvas_aside">
    <div class="aside-top">
        <a class="brand-wrap  text-decoration-none" href="/">
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
                <a class="menu-link" href="{{ route('admin.dashboardPage') }}"> <i
                        class="icon material-icons md-home"></i>

                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="menu-item has-submenu ">
                <a class="menu-link" href="#"> <i class="icon material-icons md-people"></i>
                    <span class="text"> Users </span>
                </a>
                <div class="submenu ">

                    @can('viewAny', App\Models\user\User::class)
                        <a href="{{ route('admin.users.index') }}">
                            <p>users</p>
                        </a>
                    @endcan
                    @can('viewAny', App\Models\user\Role::class)
                        <a href="{{ route('admin.roles.index') }}">
                            <p>Roles</p>
                        </a>
                    @endcan
                </div>
            </li>
            @can('access-customers', App\Models\user\User::class)
                <li class="menu-item ">
                    <a class="menu-link" href="{{ route('admin.customers') }}">
                        <i class="icon material-icons md-groups"></i>
                        <span class="text">Customers</span>
                    </a>
                </li>
            @endcan
            @can('viewAny', App\Models\order\Order::class)
                <li class="menu-item ">
                    <a class="menu-link" href="{{ route('admin.orders.index') }}"> <i
                            class="icon material-icons md-all_inbox"></i>
                        <span class="text">Orders</span> </a>
                </li>
            @endcan


            @can('viewAny', App\Models\order\OrderStatus::class)
                <li class="menu-item">
                    <a class="menu-link" href="{{ route('admin.status.index') }}">
                        <i class="icon material-icons md-list_alt"></i>
                        <span class="text">Orders Status</span>
                    </a>
                </li>
            @endcan


            @can('viewAny', App\Models\product\Product::class)
                <li class="menu-item has-submenu ">

                    <a class="menu-link"href="#">
                        <i class="icon material-icons md-shopping_bag"></i>
                        <span class="text">Products</span>
                    </a>
                    <div class="submenu">

                        <a href="{{ route('admin.products.create') }}">new product </a>

                        <a href="{{ route('admin.products.index') }}">products</a>

                    </div>
                </li>
            @endcan
            @can('viewAny', App\Models\product\Category::class)
                <li class="menu-item ">
                    <a class="menu-link" href="{{ route('admin.categories.index') }}">
                        <i class="icon material-icons md-list_alt"></i>
                        <span class="text">Categories</span>
                    </a>
                </li>
            @endcan

            @can('viewAny', App\Models\Banner\Banner::class)
                <li class="menu-item ">
                    <a class="menu-link" href="{{ route('admin.banners.index') }}"> <i
                            class="icon material-icons md-crop_original"></i>
                        <span class="text">Banners</span>
                    </a>
                </li>
            @endcan
            @can('viewAny', App\Models\product\ProductReview::class)
                <li class="menu-item">
                    <a class="menu-link" href="{{ route('admin.reviews.index') }}">
                        <i class="icon material-icons md-comment"></i>
                        <span class="text">Reviews</span>
                    </a>
                </li>
            @endcan
            @can('viewAny', App\Models\Coupon\Coupon::class)
                <li class="menu-item ">
                    <a class="menu-link" href="{{ route('admin.coupons.index') }}">
                        <i class="icon material-icons md-local_offer"></i>
                        <span class="text">Coupons</span>
                    </a>
                </li>
            @endcan
            @can('viewAny', App\Models\product\Brand::class)
                <li class="menu-item ">
                    <a class="menu-link" href="{{ route('admin.brands.index') }}"> <i
                            class=" icon material-icons md-stars"></i>
                        <span class="text">Brands</span> </a>
                </li>
            @endcan
            @can('viewAny', App\Models\product\Color::class)
                <li class="menu-item">
                    <a class="menu-link" href="{{ route('admin.colors.index') }}"> <i
                            class="icon material-icons md-palette"></i>
                        <span class="text">Colors</span>
                    </a>
                </li>
            @endcan
            @can('viewAny', App\Models\product\SizeOption::class)
                <li class="menu-item ">
                    <a class="menu-link" href="{{ route('admin.sizeOptions.index') }}"> <i
                            class="    icon material-icons md-straighten"></i>
                        <span class="text">Size Options</span>
                    </a>
                </li>
            @endcan


        </ul>

        <br>
        <br>
    </nav>
</aside>
