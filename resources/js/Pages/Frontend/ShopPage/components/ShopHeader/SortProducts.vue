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
                   {{ currentSortName }}
                    <i class="bi bi-chevron-down"></i>
                </span>
            </div>
        </div>

        <ul class="sort-by-dropdown">
            <li  v-for="(sort, index) in sortProducts" :key="index">
                  <Link :href="sort.url" :class="sort.active ?'active': '' "  >
                    <i :class="sort.icon"></i>
                    {{ sort.name }}
                </Link>
            </li>
          
        </ul>
    </div>
</template>
<script setup>
import { ref } from 'vue';

const props = defineProps({
    sortProducts: Object,

});
let currentSortName = ref('');


props.sortProducts.forEach(sort =>
{
    sort.active ? currentSortName = sort.name : '';
});
const showSortDropdown = () =>
{
    $(".sort-by-dropdown").slideToggle();
}

</script>
 
