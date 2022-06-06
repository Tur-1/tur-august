<template lang="">
    <div class="sort-by-area">
        <div @click="showSortDropdown" class="sort-by-wrap">
            <div class="sort-by">
                <span>
                    <i class="bi bi-funnel"></i>
                    Sort by:
                </span>
            </div>
            <div class="sort-by">
                <span >
                   {{ $page.props.sortProducts.filter(item => item.active)[0].name}}
                    <i class="bi bi-chevron-down"></i>
                </span>
            </div>
        </div>

        <ul class="sort-by-dropdown">
            <li  v-for="(sort, index) in $page.props.sortProducts" :key="index">
                  <Link :href="sort.url" :class="sort.active ?'active': '' "  >
                    <i :class="sort.icon"></i>
                    {{ sort.name }}
                </Link>
            </li>
          
        </ul>
    </div>
</template>
<script setup>

const showSortDropdown = () =>
{
    $(".sort-by-dropdown").slideToggle();
}

</script>
 
