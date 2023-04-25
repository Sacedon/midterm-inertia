<template layout="default">


    <div class="container mx-auto px-4 py-8">
        

        <div class="max-w-md mx-auto mt-5">
            <form @submit.prevent="submit" class="bg-gray-400 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-3">
                   <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">Last Name</label>
                   <input v-model="form.last_name" type="text" class="field" id="last_name">
                   <div class="text-sm text-red-500 italic" v-if="form.errors.last_name">{{ form.errors.last_name}}</div>
                </div>
                <div class="mb-3">
                   <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">Fisrt Name</label>
                   <input v-model="form.first_name" type="text" class="field" id="first_name">
                   <div class="text-sm text-red-500 italic" v-if="form.errors.first_name">{{ form.errors.first_name}}</div>
                </div>
                <div class="mb-3">
                   <label class="block text-gray-700 text-sm font-bold mb-2" for="designation">Designation</label>
                   <input v-model="form.designation" type="text" class="field" id="designation">
                   <div class="text-sm text-red-500 italic" v-if="form.errors.designation">{{ form.errors.designation}}</div>
                </div>
                <div>
                    <label for="countries" class="block text-gray-700 text-sm font-bold mb-2">Select Company</label>
                    <select v-model="form.company_id" id="countries" class="block text-gray-700 text-sm font-bold mb-2">
                    <option value="">Choose company</option>
                    <option v-for="company in companies" :key="company.id" :value="company.id">{{ company.name }}</option>
                    
                    </select>
                    <div class="text-sm text-red-500 italic" v-if="form.errors.company_id">The in-charge field is required</div>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 mt-4 px-4 rounded focus:shadow-outline">Add</button>
            </form>
        </div>
    </div>
</template>
<script setup>
import { useForm, Link } from '@inertiajs/inertia-vue3'
const props = defineProps({
    'companies': Array
})
let form = useForm({
    last_name: '',
    first_name: '',
    designation: '',
    company_id: '',
})
const submit = () => {
    form.post('/members')
    
}
</script>