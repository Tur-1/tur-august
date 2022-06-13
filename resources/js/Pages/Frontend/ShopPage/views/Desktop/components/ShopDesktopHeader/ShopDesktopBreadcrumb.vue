<template>
    <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <Link href="/"> Home </Link>
            </li>

            <li class="breadcrumb-item" v-for="(breadcrumbItem, index) in $page.props.breadcrumb" :key="index">
                <Link :href="route('shopPage', { category_slug: breadcrumbItem.slug })">
                {{ breadcrumbItem.name }}
                </Link>
            </li>

            <li class="breadcrumb-item " aria-current="page">
                {{ $page.props.category.name }}
            </li>
        </ol>
    </nav>
</template>
 