<template>

    <section class="bg-gray-800">
        <div class="wrapper flex justify-between">
            <div id="brand" class="text-lg text-white font-bold py-4">
                Midterm Project
            </div>
            <nav class="ml-4 flex items-baseline">
                <Link class="px-3 mt-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 hover:bg-opacity-50" href="/">Home</Link>
                <Link v-if="user" class="px-3 mt-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 hover:bg-opacity-50" href="/companies">Company</Link>
                <Link v-if="user" class="px-3 mt-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 hover:bg-opacity-50" href="/members">Member</Link>
                
            </nav>
            
            <div class="ml-4 flex items-baseline">
                
                <Link v-if="!user" class="px-3 mt-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 hover:bg-opacity-50" href="/login">Log In</Link>
                <Link v-if="user" class="px-3 mt-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 hover:bg-opacity-50" href="/logout" method="post" as="button">Log Out: <strong>{{ user.username }}</strong></Link>
            </div>
            
        </div>
    </section>
    
    </template>
    
    <script setup>
    import { Link } from '@inertiajs/inertia-vue3'
    import { defineProps } from 'vue'
    
    defineProps({
        user: ''
    })
    </script>
    