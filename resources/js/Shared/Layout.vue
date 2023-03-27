

<template>
    <Head>
        <title>My App</title>
        <meta name="description" content="This is about my App" head-key="description">
    </Head>

    <div class="grid grid-cols-12 gap-3">
        <sidebar class="col-span-4 px-8 bg-gray-200 pt-8 h-screen">
            <h1 class="text-xl font-bold">My App</h1>
            <p class="mt-4">
                Welcome Back, {{ $page.props.auth.user.name }}!
            </p>
            <Nav />
        </sidebar>

        <section class="mx-8 col-span-8 mt-8">
            <slot />

        </section>
    </div>
    
</template>

<script>    
import Nav from "./Nav.vue";
import { Head } from "@inertiajs/inertia-vue3";
    export default {
        components:{ Nav , Head},
    };
</script>