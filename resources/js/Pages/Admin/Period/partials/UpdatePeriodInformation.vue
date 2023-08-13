<template>
  <form method="post" @submit.prevent="submit">
    <div class="grid grid-cols-6 gap-6">
      <div class="col-span-6 sm:col-span-3">
        <InputLabel class="block text-sm font-medium text-gray-700" for="name">First name</InputLabel>
        <input id="name" v-model="form.name"
               autocomplete="given-name"
               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
               name="name"
               type="text"/>
      </div>

      <div class="col-span-6 sm:col-span-3">
        <InputLabel class="block text-sm font-medium text-gray-700" for="year">year</InputLabel>
        <input id="year" v-model="form.year"
               autocomplete="family-name"
               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
               name="year"
               type="number"/>
      </div>

      <div class="col-span-6 sm:col-span-4">
        <InputLabel class="block text-sm font-medium text-gray-700" for="description">Description</InputLabel>
        <textarea id="description" v-model="form.description"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                  name="description"
                  type="text"/>
      </div>

      <div class="col-span-6 sm:col-span-4">
        <InputLabel class="block text-sm font-medium text-gray-700" for="vision">Vision</InputLabel>
        <textarea id="vision" v-model="form.vision"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                  name="vision"
                  type="text"/>
      </div>

      <div class="col-span-6 sm:col-span-4">
        <InputLabel class="block text-sm font-medium text-gray-700" for="mission">Mission</InputLabel>
        <textarea id="mission" v-model="form.mission"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                  name="mission"
                  type="text"/>
      </div>


    </div>

    <!-- Button --->
    <div v-show="form.isDirty" class="flex justify-start py-10">
      <button
          class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50"
          type="button"
          @click.prevent="form.cancel()">
        Cancel
      </button>
      <PrimaryButton
          class="mx-4" type="submit">
        Save
      </PrimaryButton>
    </div>

  </form>
</template>
<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import {useForm} from "@inertiajs/vue3";
import {usePush} from "notivue";

const props = defineProps({
  period: {
    required: true
  }
})

const push = usePush();

const form = useForm({
  name: props.period.name,
  year: props.period.year,
  description: props.period.description,
  vision: props.period.vision,
  mission: props.period.mission
})

function submit() {
  form.patch(route('admin.periods.update', form.year), {
    preserveScroll: true,
    onSuccess: () => {
      push.success({
        message: 'period success to edit'
      })
    }
  })
}
</script>