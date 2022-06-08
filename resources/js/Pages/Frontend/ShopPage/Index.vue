<template>
  <app-layout :title="$page.props.category.name">
    <MobileShopHeader v-if="showMobileHeader" />
    <section class="container">
      <ShopHeader v-if="showDesktopHeader" />
      <div class="row">
        <ShopSidebar :categorySlug="$page.props.category.slug" :queryString="$page.props.queryString"
          v-if="showDesktopHeader" />
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
import MobileShopHeader from "@/Pages/Frontend/ShopPage/components/MobileShopHeader/index.vue";
import { ref } from "vue";

let showDesktopHeader = ref(true);
let showMobileHeader = ref(false);



const mediaQueryWidth = window.matchMedia("(max-width: 756px)");


if (mediaQueryWidth.matches)
{
  showMobileHeader.value = true;
  showDesktopHeader.value = false;
}
</script>
