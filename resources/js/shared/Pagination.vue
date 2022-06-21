<template lang="">
    <div class="d-flex justify-content-center mt-5 mb-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li
                    class="page-item"
                    v-for="link in links"
                    :class="(!link.url ? 'disabled' : '',link.active ? 'active' : '')">
                   
                    <Component
                        :is="!link.url ? 'span' : 'Link'"
                        :href="link.url"
                        class="page-link"
                        v-html="link.label"
                    />
                </li>
            </ul>
        </nav>
    </div>
</template>
<script setup>
defineProps({
    links: Array,
});
</script>
