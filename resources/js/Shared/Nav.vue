

<template>
    <nav class="mt-8">
        <ul class="flex flex-col space-y-4">
            <NavLink href="/" :active="$page.component=== 'Index'">Home</NavLink>
            <NavLink href="/users" :active="$page.component=== 'Users/Index'">Users</NavLink>
            <NavLink href="/logout" :active="$page.component=== 'logout'" method="post">Log out</NavLink>
        </ul>
    </nav>
</template>

<script>    
import NavLink from "../Shared/NavLink.vue"
    export default {
        components:{ NavLink },
    };
</script>