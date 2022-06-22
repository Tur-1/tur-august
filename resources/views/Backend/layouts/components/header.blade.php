<header class="main-header navbar">
    <div class="col-search">
        <form class="searchform">

            <datalist id="search_terms">
                <option value="Products">
                <option value="New orders">
                <option value="Apple iphone">
                <option value="Ahmed Hassan">
            </datalist>
        </form>
    </div>
    <div class="col-nav">
        <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"> <i
                class="material-icons md-apps"></i> </button>
        <ul class="nav">

            <li class="nav-item">
                <a class="nav-link btn-icon dropdown-toggle float-end  " id="reviews-btn">
                    <i class="material-icons md-notifications animation-shake"></i>
                    <span class="badge rounded-pill">5</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn-icon darkmode" href="#" id="dark-mode-toggle"> <i
                        class="material-icons md-nights_stay"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="requestfullscreen nav-link btn-icon"><i class="material-icons md-cast"></i></a>
            </li>

            <li class="dropdown nav-item">
                <a class="dropdown-toggle" data-bs-toggle="dropdown" id="dropdownAccount" aria-expanded="false">

                    <img class="img-sm rounded-circle" src="{{ auth()->user()->avatar_url }}" alt="User">

                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"><i class="material-icons md-perm_identity  "></i>Profile
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                        <i class="material-icons md-exit_to_app"></i>Logout</a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</header>
