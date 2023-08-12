<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {Head, Link, router} from "@inertiajs/vue3";

const props = defineProps({
  users: {
    required: true
  }
})

console.log(props.users);
</script>


<template>
  <Head title="Users"></Head>

  <AdminLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Users</h2>
    </template>

    <!--User List-->
    <div class="flex my-6 mx-auto w-11/12 lg:w-3/4">

      <div
          class="w-full  p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center justify-between mb-4">
          <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Latest Customers</h5>
          <Link :href="route('admin.users.create')"
                class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
            Add New User
          </Link>
        </div>
        <div class="flow-root">
          <ul class="divide-y divide-gray-200 dark:divide-gray-700" role="list">
            <li v-for="user in props.users"
                :key="user.email"
                class="py-3 sm:py-4">
              <div class="flex justify-between  items-center space-x-4">
                <Link :data="{id : user.id}" :href="route('admin.users.edit')"
                      class="flex items-center space-x-4"
                      method="get">
                  <div class="flex-shrink-0">
                    <img alt="Neil image"
                         class="w-8 h-8 rounded-full"
                         src={{user.image}}>
                  </div>
                  <div class="flex-initial min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                      {{ user.name }}
                    </p>
                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                      {{ user.email }}
                    </p>
                  </div>
                </Link>
                <div class="flex-initial items-center text-base text-gray-900 dark:text-white ">
                  {{ user.position }}
                </div>
                <div class="flex-initial min-w-0">
                  <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                    {{ user.year }}
                  </p>
                  <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                    {{ user.role }}
                  </p>
                </div>
                <div>
                  <Link :data="{id : user.id}"
                        :href="route('admin.users.destroy', user.id)"
                        as="button"
                        class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900"
                        method="delete"
                        type="button">
                    Delete
                  </Link>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>

    </div>
  </AdminLayout>
</template>
