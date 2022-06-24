<template>

    <div class="offcanvas-header">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button v-for="(section, index) in $page.props.sections" :key="section.id" class="nav-link section-tab"
                :class="index == 0 ? 'active' : ''" :id="'nav-' + section.slug + '-tab'" data-bs-toggle="tab"
                :data-bs-target="'#nav-' + section.slug" type="button" role="tab" :aria-controls="'nav-' + section.slug"
                aria-selected="true">
                {{ section.name }}
            </button>
        </div>
    </div>
</template>
