<template layout="default">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl text-center text-black-900">Edit Company: <strong>{{ company.name }}</strong></h1>

        <div class="max-w-md mx-auto mt-5">
            <form @submit.prevent="submit" class="bg-gray-400 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-3">
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
                    Save Changes
                </button>
            </div>
            </form>
        </div>
    </div>
</template>
<script setup>

import { useForm, usePage } from '@inertiajs/inertia-vue3'
import { setTransitionHooks } from 'vue';

const props = defineProps({
    company: Object
})

let form = useForm({
    name: props.company.name,
    type: props.company.type,
    address: props.company.address,
    net_worth: props.company.net_worth
})

const submit = () => {
    form.put('/companies/' + props.company.id)
}

</script>