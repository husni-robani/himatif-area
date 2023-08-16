<template>
  <Head title="Periods"></Head>
  <AdminLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Aspirations</h2>
    </template>

    <div class="w-3/4 mx-auto">
      <ul class="divide-y divide-gray-200" role="list">
        <li v-for="aspiration in props.aspirations" :key="aspiration.id" class="px-4 py-4 sm:px-0">
          <CardAspiration :id="aspiration.id" :created-time="aspiration.created_at"
                          :email="aspiration.email" :message="aspiration.aspiration" :name="aspiration.name"/>
        </li>
      </ul>
    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {Head} from "@inertiajs/vue3";
import CardAspiration from "@/Components/CardAspiration.vue";

const props = defineProps({
  aspirations: {
    required: true
  }
})
</script>