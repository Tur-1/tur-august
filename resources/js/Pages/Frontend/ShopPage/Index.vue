<template>
  <app-layout :title="$page.props.category.name">
    <section class="container">
      <ShopHeader />
      <div class="row">
        <ShopSidebar :categorySlug="$page.props.category.slug" :queryString="$page.props.queryString" />
        <ShopProducts />
      </div>
    </section>
  </app-layout>
</template>

<script setup>
import AppLayout from "@/layouts/Frontend/AppLayout";
import ShopHeader from "./components/ShopHeader";
import ShopSidebar from "./components/ShopSidebar";
import ShopProducts from "./components/ShopProducts"; 
</script>
