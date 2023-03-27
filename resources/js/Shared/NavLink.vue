

<template>
    <Link 
    class=" rounded-lg text-cyan-800 p-4 hover:bg-gray-400 mb-2 w-full"
    :class="{'font-bold bg-slate-900 text-white': active}">
    <slot />
    </Link>
</template>

<script>    
import { Link } from '@inertiajs/vue3'
    export default {
        components:{ Link },
        props: {
            active : Boolean
        }
    };
</script>