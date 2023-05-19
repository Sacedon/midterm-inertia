<template layout="default">
    <div class="flex justify-center items-center">
      <ConfirmDialog v-if="showConfirm"
        title="Message"
        :message="confirmMessage"
        @confirm="okay"
        @close="showConfirm = false"
      ></ConfirmDialog>
      <div class="text-center">
        <div class="mb-4">
          <textarea class="border rounded px-2 py-1 w-64 h-32" placeholder="Enter text here" v-model="confirmMessage"></textarea>
        </div>
        <button class="bg-gray-500 px-4 py-2 rounded-md text-white text-sm shadow-md hover:shadow-lg" @click="show">Click Me!</button>
      </div>
    </div>
  </template>
  
  
  <script setup>
  import { ref } from 'vue';
  import ConfirmDialog from '@/views/components/input-dialog.vue';
  
  const showConfirm = ref(false);
  const confirmMessage = ref('');
  
  function show(dialog) {
    showConfirm.value = true;
  }
  
  function okay() {
    showConfirm.value = false;
    confirmMessage.value = '';
  }
  </script>