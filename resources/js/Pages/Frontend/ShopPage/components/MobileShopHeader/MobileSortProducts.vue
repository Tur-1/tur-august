<template >
    <div class="col">
        <button class="sort-filter-btns" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#mobile-offcanvas-sort" aria-controls="offcanvasExample">
            <span>sort</span>
        </button>
    </div>

    <div class="offcanvas offcanvas-bottom" tabindex="-1" id="mobile-offcanvas-sort"
        aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header mobile-offcanvas-sort-header">
            <span class="offcanvas-title" id="offcanvasBottomLabel">Sort</span>
            <button type="button" class="btn-close " data-bs-dismiss="offcanvas" data-bs-target="#mobile-offcanvas-sort"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body  small mobile-offcanvas-sort-body">
            <div class="list-group">
                <div class="list-group-item">
                    <div>
                        <i class="bi bi-card-list me-2"></i>
                        Sugssted
                    </div>
                    <div class="circle-wrap ">
                        <span class="active-sort"></span>
                    </div>
                </div>
                <div class="list-group-item">
                    <div>
                        <i class="fas fa-fire me-2"></i>
                        New
                    </div>
                    <div class="circle-wrap ">
                        <span></span>
                    </div>
                </div>
                <div class="list-group-item">
                    <div>
                        <i class="fas fa-sort-amount-up me-2"></i>
                        Price: High to Low
                    </div>
                    <div class="circle-wrap ">
                        <span></span>
                    </div>
                </div>
                <div class="list-group-item">
                    <div>
                        <i class="fas fa-sort-amount-down-alt me-2"></i>
                        Price: Low to High
                    </div>
                    <div class="circle-wrap ">
                        <span></span>
                    </div>
                </div>

            </div>

        </div>
    </div>
</template>
 