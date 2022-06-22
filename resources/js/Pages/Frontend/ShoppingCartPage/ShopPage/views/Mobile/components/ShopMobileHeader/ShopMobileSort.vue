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

                <Link v-for="(sort, index) in $page.props.sortProducts" :key="index" class="text-dark list-group-item"
                    :href="sort.url">
                <div>
                    <i :class="sort.icon"></i>
                    {{ sort.name }}
                </div>
                <div class="circle-wrap ">
                    <span :class="{ 'active-sort': sort.active }"></span>
                </div>
                </Link>

            </div>

        </div>
    </div>
</template>
 