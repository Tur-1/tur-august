<template>
    <label class="fw-600 mb-1 sidebar-border-top">Colors</label>
    <div class="list-group">
        <label v-for="(color, index) in $page.props.colors" :key="index"
            class="d-flex align-items-center justify-content-between mb-2">
            <div>
                <input class="form-check-input me-1" type="checkbox" name="color[]" :id="'color-' + color.id"
                    :value="color.slug" v-model="filters.color" />
                <span>{{ color.name }} ({{ color.products_count }})</span>
            </div>
            <img src="http://august.com/storage/images/colors/18-02-22-04-03-31-1645157011-black.png" width="20"
                alt="Black" />
        </label>
    </div>
</template>
<script setup>
defineProps({
    filters: Object,
});
</script> 
