

<template layout>

    <h1 class="text-4xl text-center text-black-900">Welcome To My Companies!!!</h1>
    <p class="text-black-800">
        {{ message }}
    </p>
    
    

</template>

<script setup>

import { Link, usePage } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'

InertiaProgress.init({
    delay: 250,

  // The color of the progress bar.
  color: '#29d',

  // Whether to include the default NProgress styles.
  includeCSS: true,

  // Whether the NProgress spinner will be shown.
  showSpinner: false,
})



const props = defineProps({
    topics:Array
})



const user = usePage().props.auth

console.log(user)

</script>
