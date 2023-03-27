
<template>
    <div>
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-4xl text-red-500">
                Users
            </h1>
           
            <Link  href="/users/create" class="flex text-sm font-bold items-center gap-2 hover:bg-slate-200 p-2 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <p>New User</p>
            </Link>
        </div>
        <input v-model="search" type="text" placeholder="searching..." class="border p-2 rounded-lg mb-4">

            <!-- component -->
        <div class="bg-white">

            <div class="overflow-x-auto border-x border-t">
            <table class="table-auto w-full">
                <thead class="border-b">
                    <tr class="bg-gray-100">
                        <th class="text-left p-4 font-medium">
                        Name
                        </th>
                        <th class="text-left p-4 font-medium">
                        Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b hover:bg-gray-50"  v-for="user in users.data" :key="user.id">
                        <td class="p-4" >
                            {{ user.name }}
                        </td>
                        <td class="p-4 flex gap-4">
                        <Link :href="'/users/' + user.id + '/edit'" >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"  class="w-6 h-6 stroke-green-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
</svg>
</Link> 
                        <Link :href="'/users/' + user.id + '/delete'  " >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"  class="w-6 h-6 stroke-red-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
</svg>

                        </Link> 
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
        <Pagination :links="users.links" />
        
    </div>
</template>

<script setup>    
import {Link} from "@inertiajs/vue3";
import Pagination from "../../Shared/Pagination.vue"
import {ref, watch} from "vue";
import {Inertia, Method} from "@inertiajs/inertia"
import debounce from "lodash/debounce";
import throttle from "lodash/throttle";
// throttle like debounce with some diferent
        let props = defineProps({
            users: Object,
            filters : Object,
            can: Object
        });

        let search = ref(props.filters.search);

        watch(search , debounce(function(value) {
            console.log('1');
            Inertia.get('/users' , {search:value} , { 
                preserveState:true,
                replace:true,
            });
        },500));
</script>