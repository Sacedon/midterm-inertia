<template layout>

<ConfirmDialog v-if="showConfirm"
   title="Delete Company?"
   message="Are you sure about deleting this company file?"
   @cancel="cancelDelete()"
   @confirm="deleteCompany()"></ConfirmDialog>

<div class="flex justify-between">
    <h1 class="text-4xl text-black-900">List of Companies</h1>
    <Link href="/companies/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:shadow-outline mb-3">Create Company</Link>
</div>

<hr>

<Transition name="slide-down">
            <div v-if="showDialog" class="absolute top-0 left-0 min-h-full min-w-full -mt-1">
                <DeleteConfirmation title="Delete Confirmation"
                message="Are you sure you want to delete this item?" 
                @cancel="toggleDialog()"
                @confirm="deleteOffice()"
                ></DeleteConfirmation>
            </div>
        </Transition>

        <Transition name="slide-down">
            <div v-if="props.flash.error" class="absolute top-0 left-0 min-h-full min-w-full -mt-1">
                <WarningDialog :message="props.flash.error" @dismiss="closeErrorDialog()"></WarningDialog>
            </div>
        </Transition>

        <!-- renders only if showSuccessDialog is true -->
        <Transition name="slide-down">
            <div v-if="showSuccessDialog" class="absolute top-0 left-0 min-h-full min-w-full -mt-1">
                <InformationDialog :message="props.flash.success" @dismiss="closeInfoDialog()"></InformationDialog>
            </div>
        </Transition>

<table class="border-collapse w-full">
  <thead>
    <tr>
      <th class="p-3 font-bold bg-gray-200 text-gray-600 border-gray-300 hidden lg:table-cell">Name of Company</th>
      <th class="p-3 font-bold bg-gray-200 text-gray-600 border-gray-300 hidden lg:table-cell">Type of Company</th>
      <th class="p-3 font-bold bg-gray-200 text-gray-600 border-gray-300 hidden lg:table-cell">Address</th>
      <th class="p-3 font-bold bg-gray-200 text-gray-600 border-gray-300 hidden lg:table-cell">Net Worth</th>
      <th class="p-3 font-bold bg-gray-200 text-gray-600 border-gray-400 hidden lg:table-cell">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="company of companies" :key="company.id" class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
      <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ company.name }}</td>
      <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ company.type }}</td>
      <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ company.address }}</td>
      <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ company.net_worth }}</td>
      <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
        <div class="flex justify-center">
          <Link :href=" '/companies/edit/' + company.id " class="bg-green-800 hover:bg-gray-700 text-white rounded px-3 py-1 mr-2">Edit</Link>
          <button @click="getSelectedCompany(company.id)"  class="bg-red-800 hover:bg-gray-700 text-white rounded px-3 ml-2">Delete</button>
        </div>
      </td>
    </tr>
  </tbody>
</table>


</template>
<script setup>
import {Link, useForm} from '@inertiajs/inertia-vue3'
import {ref, onMounted, watch, onBeforeMount, onBeforeUnmount, onBeforeUpdate } from 'vue'
import DeleteConfirmation from '../../components/confirm-dialog.vue'
import InformationDialog from '../../components/information-dialog.vue'
import WarningDialog from '../../components/warning-dialog.vue'
onMounted(() => {
    if(props.flash.success && props.flash.success != 'Company deleted successfully!') {
        console.log(true)
        setTimeout(() => {
            showSuccessDialog.value = true
        }, 100)
    }
})
onBeforeUpdate(() => {
    if(!props.flash.error) {
        showSuccessDialog.value = true
    }
})
const props = defineProps({
    'companies': Array,
    'flash': Object
})
const showSuccessDialog = ref(false)
const showErrorDialog = ref(false)
const showDialog = ref(false)
let deleteForm = useForm()
let selectedCompany = null
const closeErrorDialog = () => {
    props.flash.error = null
}
const closeInfoDialog = () => {
    props.flash.success = null
    showSuccessDialog.value = false
}
// toggle modal
const toggleDialog = () => {
    showDialog.value = !showDialog.value
}
const getSelectedCompany = (id) => {
    selectedCompany = id
    console.log(selectedCompany)
    toggleDialog();
}
 
const deleteOffice = () => {
    deleteForm.delete('/companies/' + selectedCompany)
    toggleDialog()
}
watch(props.flash.success, (newValue, oldValue) => {
    if(newValue == 'Company deleted successfully!') {
        console.log(newValue)
    }
})
</script>
