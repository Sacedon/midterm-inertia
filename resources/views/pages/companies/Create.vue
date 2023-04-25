<template layout="default">
    <h1 class="text-4xl text-center text-black-900">Create Company</h1>

    <hr>

    <div class="max-w-md mx-auto mt-5">
        <form @submit.prevent="submit" class="bg-gray-400 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div clas="mb-3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                <input v-model="form.name" type="text" class="field" id="name">
                <div class="text-sm text-red-500 italic" v-if="form.errors.name">{{ form.errors.name }}</div>
            </div>
            <div clas="mb-3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="type">Type</label>
                <input v-model="form.type" type="text" class="field" id="type">
                <div class="text-sm text-red-500 italic" v-if="form.errors.type">{{ form.errors.type }}</div>
            </div>
            <div clas="mb-3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="address">Address</label>
                <input v-model="form.address" type="text" class="field" id="address">
                <div class="text-sm text-red-500 italic" v-if="form.errors.address">{{ form.errors.address }}</div>
            </div>
            <div clas="mb-3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="net_worth">Net Worth</label>
                <input v-model="form.net_worth" type="number" class="field" id="net_worth">
                <div class="text-sm text-red-500 italic" v-if="form.errors.net_worth">{{ form.errors.net_worth }}</div>
            </div>
            <div>
                <button class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 mt-4 px-4 rounded focus:shadow-outline" type="submit">
                    Create Company
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

let form = useForm({
    name:'',
    type:'',
    address:'',
    net_worth:'',
    
})

const submit = () => {
    form.post('/companies')
}

</script>