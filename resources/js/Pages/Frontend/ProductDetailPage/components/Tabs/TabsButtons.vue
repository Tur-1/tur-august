<template lang="">
    <ul class="nav nav-tabs text-uppercase">
        <li class="nav-item">
            <a
                class="nav-link active"
                id="Description-tab"
                data-bs-toggle="tab"
                href="#Description"
                >Description</a
            >
        </li>
        <li class="nav-item">
            <a
                class="nav-link"
                id="Additional-info-tab"
                data-bs-toggle="tab"
                href="#Additional-info"
                >Additional info</a
            >
        </li>
        <li class="nav-item">
            <a
                class="nav-link"
                id="Reviews-tab"
                data-bs-toggle="tab"
                href="#Reviews"
                >Reviews ({{ $page.props.reviews.length }})</a
            >
        </li>
    </ul>
</template>
