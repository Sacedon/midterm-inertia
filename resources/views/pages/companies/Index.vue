<template layout>

<div class="flex justify-between">
    <h1 class="text-4xl text-black-900">List of Companies</h1>
    <Link href="/companies/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:shadow-outline mb-3">Create Company</Link>
</div>

<hr>

<table class="border-collapse w-full">
    <thead>
        <tr>
            <th class="p-3 font-bold bg-gray-200 text-gray-600 border-gray-300 hidden lg:table-cell">Name of Company</th>
            <th class="p-3 font-bold bg-gray-200 text-gray-600 border-gray-300 hidden lg:table-cell">Type of Company</th>
            <th class="p-3 font-bold bg-gray-200 text-gray-600 border-gray-300 hidden lg:table-cell">Address</th>
            <th class="p-3 font-bold bg-gray-200 text-gray-600 border-gray-300 hidden lg:table-cell">Net Worth</th>
            <th class="p-3 font-bold bg-gray-200 text-gray-600 border-gray-300 hidden lg:table-cell">Action..</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="company of companies" :key="company.id" class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
            <td class="w-full lg:w-auto p3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ company.name }}</td>
            <td class="w-full lg:w-auto p3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ company.type }}</td>
            <td class="w-full lg:w-auto p3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ company.address }}</td>
            <td class="w-full lg:w-auto p3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ company.net_worth }}</td>
            <td class="w-full lg:w-auto p3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                 <Link :href=" '/companies/edit/' + company.id " class="bg-green-800 hover:bg-gray-700 text-white rounded px-3">Edit</Link>
            </td>
                
        </tr>
    </tbody>
</table>

</template>
<script setup>
import {Link} from '@inertiajs/inertia-vue3'

defineProps({
    'companies': Array
})
</script>