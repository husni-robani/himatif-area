<template>
  <Head title="Create user"/>

  <AdminLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Create New User</h2>
    </template>

    <div class="py-10">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

          <div class="p-6 rounded-sm">
            <form method="post" @submit.prevent="form.post(route('admin.users.store'))">

              <div class="relative z-0 w-full mb-6 group">
                <input id="name" v-model="form.name"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       name="name"
                       placeholder=" "
                       required type="text"/>
                <InputError :message="form.errors.name"/>
                <label
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                    for="name">Name</label>
              </div>
              <div class="relative z-0 w-full mb-6 group">
                <input id="email" v-model="form.email"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       name="email"
                       placeholder=" "
                       required type="email"/>
                <InputError :message="form.errors.email"/>
                <label
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                    for="email">Email
                  address</label>
              </div>
              <div class="relative z-0 w-full mb-6 group">
                <input id="npm" v-model="form.npm"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       name="npm"
                       placeholder=" "
                       required type="text"/>
                <InputError :message="form.errors.npm"/>
                <label
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                    for="npm">NPM</label>
              </div>
              <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                  <input id="position" v-model="form.position"
                         class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                         name="position"
                         placeholder=" "
                         required type="text"/>
                  <InputError :message="form.errors.position"/>
                  <label
                      class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                      for="position">Position</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                  <input id="phone" v-model="form.phone"
                         class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                         name="phone"
                         placeholder=" "
                         required type="text"/>
                  <InputError :message="form.errors.phone"/>
                  <label
                      class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                      for="phone">Phone
                    Number</label>
                </div>
              </div>

              <!--Period Input-->
              <div class="relative z-0 w-1/2  mb-6 group">
                <label class="sr-only" for="period">Underline select</label>
                <select id="period" v-model="form.year"
                        class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer"
                        required>
                  <option selected>Choose a Period</option>
                  <option v-for="period in periods" :value=period>{{ period }}</option>
                </select>
                <InputError :message="form.errors.year"/>
              </div>

              <!--Role Radio Group-->

              <div class="flex">
                <h2 class="text-md font-semibold mr-2">User Role : </h2>
                <div class="flex items-center mr-4">
                  <input id="inline-radio" v-model="form.role"
                         class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                         name="inline-radio-group"
                         type="radio"
                         value="Admin Period">
                  <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="inline-radio">Period
                    Administrator</label>
                </div>
                <div class="flex items-center mr-4">
                  <input id="inline-2-radio" v-model="form.role"
                         class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                         name="inline-radio-group" type="radio"
                         value="User">
                  <InputError :message="form.errors.role"/>
                  <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                         for="inline-2-radio">User</label>
                </div>
              </div>


              <button
                  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                  type="submit">
                Submit
              </button>
            </form>


          </div>

        </div>
      </div>
    </div>


  </AdminLayout>
</template>


<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {Head, useForm} from "@inertiajs/vue3";
import {usePush} from "notivue";
import InputError from "@/Components/InputError.vue";

const props = defineProps({
  periods: {
    required: true,
  },
})

const push = usePush();

function submit() {
  form.post(route('admin.users.store'), {
    onSuccess: () => {
      push.success({
        message: 'Success to create new User and password has been sent to user email'
      })
    }
  })
}

const form = useForm({
  email: null,
  name: null,
  year: null,
  phone: null,
  npm: null,
  role: null,
  position: null
})

</script>
