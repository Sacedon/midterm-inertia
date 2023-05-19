<template>

    <div class="overlay">


    </div>

    <div class="dialog-wrapper">

        <div class="dialog">
            <h3 class="text-3xl text-center text-black mb-3">{{ title }}</h3>
            <hr class="border-gray-700">
            <div class="mt-4 text-center text-black">
                {{ message }}
            </div>
            <div class="flex justify-center space-x-2 mt-4">
                <button class="bg-gray-600 rounded p-2 text-white hover:bg-gray-700" @click="$emit('confirm')">
                    Okay
                </button>
            </div>
        </div>

    </div>

</template>

<script setup>
let props = defineProps({
    title: "",
    message: ""
})
</script>