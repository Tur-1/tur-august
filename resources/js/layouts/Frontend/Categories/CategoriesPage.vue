<template>
    <li class="footer-item">
        <a @click="openCategoriesPageOffcanvas" role="button" id="categories-icon">
            <i class="bi bi-grid"></i>
            <span>Categories</span>
        </a>
    </li>
    <div class="offcanvas offcanvas-bottom " tabindex="-1" id="categories-page-offcanvas"
        aria-labelledby="staticBackdropLabel">
        <div class="offcanvas-header">
            <button type="button" class="section-tab" v-for="(section, index) in sections" :key="section.id"
                :class="sectionChildren.slug == section.slug ? 'active-section' : ''"
                :data-section-targat="'#section-' + section.slug" @click="openSectionContent(section.slug)">
                {{ section.name }}
            </button>
        </div>
        <div class="offcanvas-body">
            <div v-for="(category, index) in sectionChildren.children" :key="category.id" class="section-content"
                :class="index == 0 ? 'active-section-content' : ''">
                <div class="sidebar">
                    <button class="categories-item" :class="index == 0 ? 'active-category' : ''"
                        @click="openSectionCategoryContent(category.slug)">
                        {{ category.name }}
                    </button>

                </div>
                <div class="content">
                    <div v-for="(categoryChildren, categoryChildrenIndex) in category.children"
                        :key="categoryChildren.id" class="category-content row p-0 m-0 w-100"
                        :class="categoryChildrenIndex == 0 ? 'active-category-content' : ''">
                        <a class="card-category col-4">
                            <img src="">
                            <span>
                                View all
                            </span>
                        </a>

                        <a class="card-category col-4">
                            <img src="">
                            <span>
                                {{ categoryChildren.name }}
                            </span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>
<script setup>
import { onMounted, ref } from 'vue';


const props = defineProps({
    sections: Array,
})
let sectionChildren = ref(props.sections[0]);
let sectionCategoryChildren = ref(props.sections[0]);

const openSectionContent = (slug) =>
{
    sectionChildren.value = props.sections.filter(section => section.slug == slug)[0];
}
const openSectionCategoryContent = (slug) =>
{
    sectionCategoryChildren.value = sectionChildren.value.children.filter(category => category.slug == slug)[0].children;
}


const openCategoriesPageOffcanvas = () =>
{

    $("#categories-page-offcanvas").offcanvas('show');
}

</script>