<template>
  <Head title="User Edit"/>

  <AdminLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Detail User</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
          <UpdateProfileInformationForm
              :user=user
          />
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import {Head} from '@inertiajs/vue3';
import AdminLayout from "@/Layouts/AdminLayout.vue";
import UpdateProfileInformationForm from "@/Pages/Admin/User/Profile/Partials/UpdateProfileInformationForm.vue";

defineProps({
  user: {
    required: true
  }
})
</script>