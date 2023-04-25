<template layout="default">
    <div class="py-4">
        <h1 class="text-4xl text-center text-blue-900 mb-3">User Login</h1>
        <hr>
        <div class="max-w-md mx-auto mt-5">
            <form @submit.prevent="submit" class="bg-gray-400 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4 flex flex-col">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">UserName:</label>
                    <input v-model="form.username" type="text" class="field">
                    <div class="text-sm text-red-500 italic" v-if="form.errors.username">{{ form.errors.username }}</div>
                </div>
                <div class="mb-4 flex flex-col">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password:</label>
                    <input v-model="form.password" type="password" class="field">
                    <div class="text-sm text-red-500 italic" v-if="form.errors.password">{{ form.errors.password }}</div>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:shadow-outline">
                        Login
                    </button>
                </div>
                <div class="text-sm text-red-500 italic" v-if="form.errors.authentication">{{ form.errors.authentication }}</div>
            </form>
        </div>
    </div>
</template>
<script setup>
import {useForm} from '@inertiajs/inertia-vue3'
    

let form = useForm({
    'username': '',
    'password': ''
})

let submit = () => {
    form.post('/login')
}

</script>