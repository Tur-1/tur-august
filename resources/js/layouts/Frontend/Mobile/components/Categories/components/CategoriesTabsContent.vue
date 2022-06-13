<template>
    <div class="offcanvas-body">
        <div class="tab-content w-100" id="nav-tabContent">
            <div
                v-for="(section, index) in $page.props.sections"
                :key="section.id"
                class="tab-pane w-100 fade"
                :class="index == 0 ? 'show active' : ''"
                :id="'nav-' + section.slug"
                role="tabpanel"
                aria-labelledby="nav-home-tab"
            >
                <div class="d-flex align-items-start w-100 tab-buttons-content">
                    <div
                        class="nav flex-column nav-pills"
                        id="v-pills-tab"
                        role="tablist"
                        aria-orientation="vertical"
                    >
                        <button
                            v-for="(
                                category, categoryIndex
                            ) in section.children"
                            :key="category.id"
                            class="nav-link"
                            :class="categoryIndex == 0 ? 'active' : ''"
                            :id="'v-pills-' + category.slug + '-tab'"
                            data-bs-toggle="pill"
                            :data-bs-target="'#v-pills-' + category.slug"
                            type="button"
                            role="tab"
                            aria-controls="v-pills-home"
                            aria-selected="true"
                        >
                            {{ category.name }}
                        </button>
                    </div>

                    <div class="tab-content" id="v-pills-tabContent">
                        <div
                            class="tab-pane fade"
                            v-for="(
                                category, categoryIndex
                            ) in section.children"
                            :key="category.id"
                            :class="categoryIndex == 0 ? 'show active' : ''"
                            :id="'v-pills-' + category.slug"
                            role="tabpanel"
                            aria-labelledby="v-pills-home-tab"
                        >
                            <Link
                                class="card-category"
                                :href="
                                    route('shopPage', {
                                        category_slug: category.slug,
                                    })
                                "
                            >
                                <img src="" />

                                <span> view all </span>
                            </Link>
                            <Link
                                class="card-category"
                                v-for="(
                                    subcategory, subcategoryIndex
                                ) in category.children"
                                :key="subcategory.id"
                                :href="
                                    route('shopPage', {
                                        category_slug: subcategory.slug,
                                    })
                                "
                            >
                                <img src="" />

                                <span> {{ subcategory.name }} </span>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
