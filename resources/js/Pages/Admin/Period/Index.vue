<template>
  <Head title="Periods"></Head>

  <AdminLayout>

    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Periods</h2>
    </template>

    <div class="flex my-6 mx-auto w-11/12 lg:w-3/4 bg-white border border-gray-200 rounded-lg shadow">
      <div
          class="w-full  p-4  sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center justify-between mb-4">
          <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Latest Customers</h5>
          <PrimaryButton @click="open = true">Create Period</PrimaryButton>
        </div>
        <div class="flow-root">
          <ListPeriod :periods="props.periods"/>
        </div>
      </div>
    </div>
    <SlideOvers v-model:open="open" @toggle="toggle">
      <template #title>
        <div>
          <h3 class="text-lg leading-6 font-medium text-gray-900">Create New Period</h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-500">you cant create period with the same year or period name</p>
        </div>
      </template>
      <template #content>
        <form method="post" @submit.prevent="submit">
          <div class=" space-y-6 sm:space-y-5">
            <div class="space-y-6 sm:space-y-5">
              <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <input-label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2" for="name">name
                </input-label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input id="name"
                         v-model="form.name"
                         class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                         name="name"
                         type="text"/>
                  <input-error :message="form.errors.name"/>
                </div>
              </div>

              <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <input-label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2" for="year">year
                </input-label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input id="year"
                         v-model="form.year"
                         class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                         min="2020"
                         name="year" type="number"/>
                  <input-error :message="form.errors.year"/>
                </div>
              </div>

              <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <input-label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"
                             for="description">description
                </input-label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                <textarea id="description"
                          v-model="form.description"
                          class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                          name="description"
                          type="text"/>
                  <input-error :message="form.errors.description"/>
                </div>
              </div>

              <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <input-label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"
                             for="vision">vision
                </input-label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                <textarea id="vision"
                          v-model="form.vision"
                          class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                          name="vision"
                          type="text"/>
                  <input-error :message="form.errors.vision"/>
                </div>
              </div>

              <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <input-label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"
                             for="mission">mission
                </input-label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                <textarea id="mission"
                          v-model="form.mission"
                          class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                          name="mission"
                          type="text"/>
                  <input-error :message="form.errors.mission"/>
                </div>
              </div>

              <div>
                <PrimaryButton type="submit">Create</PrimaryButton>
              </div>

            </div>
          </div>
        </form>
      </template>
    </SlideOvers>
  </AdminLayout>

</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {Head, useForm, usePage} from "@inertiajs/vue3";
import ListPeriod from "@/Pages/Admin/Period/partials/ListPeriod.vue";
import SlideOvers from "@/Components/SlideOvers.vue";
import {ref, watch, watchEffect} from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import {usePush} from "notivue";

const props = defineProps({
  periods: {
    required: true
  }
})
const open = ref(false);
const push = usePush();

const form = useForm({
  year: null,
  name: null,
  description: null,
  vision: null,
  mission: null
})

function toggle() {
  open.value = false;
}

function submit() {
  form.post(route('admin.periods.store'), {
    preserveScroll: true,
    onSuccess: () => {
      form.reset('name', 'year', 'description', 'vision', 'mission')
      open.value = false
      push.success({
        message: 'period success to create',
      });
    },
    onError: () => {
      push.error({
        message: 'period failed to create'
      })
    }
  })
}


</script>

