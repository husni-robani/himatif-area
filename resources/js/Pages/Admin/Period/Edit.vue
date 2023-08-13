<template>
  <Head title="User Edit"/>

  <AdminLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Edit Period</h2>
    </template>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 py-12">
      <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <h3 class="text-lg font-medium leading-6 text-gray-900">{{ period.name }}</h3>
            <p v-show="period.active" class="mt-1 text-sm font-bold text-green-500 animate-pulse">Active</p>
          </div>
          <div class="mt-5 md:mt-0 md:col-span-2">
            <!----Form---->
            <UpdatePeriodInformation :period="period"/>
          </div>
        </div>
      </div>

    </div>
  </AdminLayout>
</template>

<script setup>
import {Head} from '@inertiajs/vue3';
import AdminLayout from "@/Layouts/AdminLayout.vue";
import UpdatePeriodInformation from "@/Pages/Admin/Period/partials/UpdatePeriodInformation.vue";

defineProps({
  period: {
    required: true
  }
})
</script>