<template>
    <app-layout title="404">

        <div class="container page-404">
            <div class="row align-items-center h-100 text-center">
                <div class="col-lg-8 m-auto">

                    <img class="mb-5" src="/assets/images/404.png" alt="" />


                    <h2 class="mb-30">Page Not Found</h2>
                    <p class="font-lg text-grey-700 mb-30">
                        The link you clicked may be broken or the page may have been removed
                    </p>
                    <Link class="btn btn-primary" :href="route('homePage')">
                    Back To Home Page
                    </Link>

                </div>
            </div>
        </div>

    </app-layout>
</template>

<script setup>
import AppLayout from "./../../layouts/Frontend/AppLayout";
</script>
 