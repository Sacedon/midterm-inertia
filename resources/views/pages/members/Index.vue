<template layout="default">

    <div class="flex justify-between">
        <h1 class="text-4xl text-black-900">List of Members</h1>
        <Link href="/members/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:shadow-outline mb-3">Create Member</Link>
        
    </div>

<hr>

<table class="border-collapse w-full">
    <thead>
        <tr>
            <th class="p-3 font-bold bg-gray-200 text-gray-600 border-gray-300 hidden lg:table-cell">Last Name</th>
            <th class="p-3 font-bold bg-gray-200 text-gray-600 border-gray-300 hidden lg:table-cell">First Name</th>
            <th class="p-3 font-bold bg-gray-200 text-gray-600 border-gray-300 hidden lg:table-cell">Designation</th>
            <th class="p-3 font-bold bg-gray-200 text-gray-600 border-gray-300 hidden lg:table-cell">Company Name</th>
            <th class="p-3 font-bold bg-gray-200 text-gray-600 border-gray-300 hidden lg:table-cell">Action..</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="member of members" :key="member.id" class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ member.last_name }}</td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ member.first_name }}</td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ member.designation }}</td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ member.company.name }}</td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
            <div class="flex justify-center">
            <Link :href=" '/members/edit/' + member.id " class="bg-green-800 hover:bg-gray-700 text-white rounded px-3 py-1 mr-2">Edit</Link>
            <button @click="deleteMember(member.id)" class="bg-red-800 hover:bg-gray-700 text-white rounded px-3 py-1">Delete</button>
            </div>
            </td>
        </tr>
    </tbody>
</table>
</template>
<script setup>
import {Link} from '@inertiajs/inertia-vue3'
import { defineProps } from 'vue'
import { route } from '@inertiajs/inertia'
import { Inertia } from '@inertiajs/inertia';


let props = defineProps({
    members: Array,
    companies: Array
})

const deleteMember = (memberId) => {
  if (confirm('Are you sure you want to delete this member?')) {
    $inertia.delete(route('members.destroy', memberId)).then(() => {
      // Redirect to the members index page or display a success message
    });
  }
}

const closeNotif = () => {
    const toast = document.getElementById('toast-bottom-left');
    toast.style.opacity = '0'
    toast.style.transition = '.5s all ease'
}
</script>