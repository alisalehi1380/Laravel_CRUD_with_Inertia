
<template>
    <div class="">
        <!-- component -->
<div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
	<div class="relative py-3 sm:max-w-xl sm:mx-auto">
		<div
			class="absolute inset-0 bg-gradient-to-r from-blue-300 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
		</div>
		<div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
			<div class="max-w-md mx-auto">
				<div>
					<h1 class="text-2xl font-semibold">Login</h1>
				</div>
                <form @submit.prevent="submit" action="" method="post" class="flex flex-col items-start justify-start gap-3">
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <div class="relative">
                                <input v-model="form.email" autocomplete="off" id="email" name="email" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600" placeholder="Email address" />
                                <label for="email" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Email Address</label>
                                <div v-if="$page.props.errors.email" v-text="$page.props.errors.email" class="text-red-400"></div>
                            </div>
                            <div class="relative">
                                <input v-model="form.password" autocomplete="off" id="password" name="password" type="password" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600" placeholder="Password" />
                                <label for="password" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
                                <div v-if="$page.props.errors.password" v-text="$page.props.errors.password" class="text-red-400"></div>
                            </div>
                            <div class="relative">
                                <button class="bg-blue-500 text-white rounded-md px-2 py-1">Log in</button>
                            </div>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div>
</div>
        <!-- <form @submit.prevent="submit" action="" method="post" class="flex flex-col items-start justify-start gap-3">
            <input v-model="form.email" class="p-2 bg-gray-100 border-2 border-gray-200 rounded-lg" type="text" placeholder="email" name="email" id="">
            <div v-if="$page.props.errors.email" v-text="$page.props.errors.email" class="text-red-400"></div>
            <input v-model="form.password" class="p-2 bg-gray-100 border-2 border-gray-200 rounded-lg" type="password" placeholder="pass" name="password" id="">
            <div v-if="$page.props.errors.password" v-text="$page.props.errors.password" class="text-red-400"></div>
            <button type="submit" :disabled="form.processing"> Log in </button>
        </form> -->
    </div>
</template>

<script>    
    export default {

    layout:null
    }
</script>

<script setup>  
    import { useForm } from "@inertiajs/inertia-vue3";

    let form = useForm({
        email : '',
        password : '',
    });

    let submit = () => {
    form.post('/login');
    };
</script>