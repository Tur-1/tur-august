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
                <a class="menu-link"> <i class="icon material-icons md-home"></i>

                    <span class="text">Dashboard</span>
                </a>
            </li>

            {{-- users Management --}}
            {{-- @if (auth()->user()->can('viewAny', App\Models\users\User::class) ||
            auth()->user()->can('viewAny', App\Models\users\Role::class)) --}}
            <li class="menu-item has-submenu ">
                <a class="menu-link" href="#"> <i class="icon material-icons md-people"></i>
                    <span class="text"> Users </span>
                </a>
                <div class="submenu ">
                    {{-- @can('viewAny', App\Models\users\User::class) --}}
                    <a>
                        <p>users</p>
                    </a>
                    {{-- @endcan --}}
                    {{-- @can('viewAny', App\Models\users\Role::class) --}}
                    <a>
                        <p>Roles</p>
                    </a>
                    {{-- @endcan --}}
                </div>
            </li>
            {{-- customers --}}
            <li class="menu-item ">
                <a class="menu-link"> <i class="icon material-icons md-groups"></i>
                    <span class="text">Customers</span> </a>
            </li>
            {{-- @endif --}}

            {{-- Orders --}}
            {{-- @can('viewAny', App\Models\orders\Order::class) --}}
            <li class="menu-item ">
                <a class="menu-link"> <i class="icon material-icons md-all_inbox"></i>
                    <span class="text">Orders</span> </a>
            </li>
            {{-- @endcan --}}

            {{-- @can('viewAny', App\Models\orders\OrderStatus::class) --}}
            <li class="menu-item">
                <a class="menu-link"> <i class="icon material-icons md-list_alt"></i>
                    <span class="text">Orders Status</span> </a>
            </li>
            {{-- @endcan --}}
            {{-- Products --}}

            {{-- @if (auth()->user()->can('viewAny', App\Models\products\Product::class) ||
            auth()->user()->can('create', App\Models\products\Product::class)) --}}
            <li class="menu-item has-submenu ">
                <a class="menu-link" href="page-products-list.html"> <i class="icon material-icons md-shopping_bag"></i>
                    <span class="text">Products</span>
                </a>
                <div class="submenu">
                    {{-- @can('create', App\Models\products\Product::class) --}}
                    <a>Add product </a>
                    {{-- @endcan --}}
                    {{-- @can('viewAny', App\Models\products\Product::class) --}}
                    <a>Product List</a>
                    {{-- @endcan --}}
                </div>
            </li>
            {{-- @endif --}}

            {{-- Sections && Categories --}}
            {{-- @if (auth()->user()->can('viewAny', App\Models\sections\Category::class) ||
            auth()->user()->can('viewAny', App\Models\sections\Section::class)) --}}
            <li class="menu-item has-submenu ">
                <a class="menu-link" href="page-products-list.html"> <i class="icon material-icons md-list_alt"></i>
                    <span class="text">Sections</span>
                </a>
                <div class="submenu">
                    <a>Sections </a>
                    <a> Categories </a>
                </div>
            </li>
            {{-- @endif --}}

            {{-- Banners --}}
            {{-- @can('viewAny', App\Models\sections\Banner::class) --}}
            <li class="menu-item ">
                <a class="menu-link"> <i class="icon material-icons md-crop_original"></i>
                    <span class="text">Banners</span>
                </a>
            </li>
            {{-- @endcan --}}
            {{-- @can('viewAny', App\Models\products\ProductReview::class) --}}
            <li class="menu-item">
                <a class="menu-link"> <i class="icon material-icons md-comment"></i>
                    <span class="text">Reviews</span>
                </a>
            </li>
            {{-- @endcan --}}
            {{-- Coupons --}}
            {{-- @can('viewAny', App\Models\products\Coupon::class) --}}
            <li class="menu-item ">
                <a class="menu-link""> <i
                        class=" icon material-icons md-local_offer"></i>
                    <span class="text">Coupons</span>
                </a>
            </li>
            {{-- @endcan --}}

            {{-- Brands --}}
            {{-- @can('viewAny', App\Models\products\Brand::class) --}}
            <li class="menu-item ">
                <a class="menu-link" "> <i
                        class=" icon material-icons md-stars"></i>
                    <span class="text">Brands</span> </a>
            </li>
            {{-- @endcan --}}

            {{-- Colors --}}
            {{-- @can('viewAny', App\Models\products\Color::class) --}}
            <li class="menu-item">
                <a class="menu-link"> <i class="icon material-icons md-palette"></i>
                    <span class="text">Colors</span>
                </a>
            </li>
            {{-- @endcan --}}

            {{-- Size Options --}}
            {{-- @can('viewAny', App\Models\products\SizeOption::class) --}}
            <li class="menu-item ">
                <a class="menu-link" "> <i
                        class=" icon material-icons md-straighten"></i>
                    <span class="text">Size Options</span>
                </a>
            </li>
            {{-- @endcan --}}

            {{-- Price List --}}
            {{-- @can('viewAny', App\Models\products\PriceList::class) --}}
            <li class="menu-item ">
                <a class="menu-link" "> <i
                        class=" icon material-icons md-view_list"></i>
                    <span class="text">Price List</span>
                </a>
            </li>
            {{-- @endcan --}}
        </ul>

        <br>
        <br>
    </nav>
</aside>