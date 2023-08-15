<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <div class="bg-white px-4 py-5 sm:px-6 rounded-lg shadow-md">
    <div class="flex space-x-3">
      <div class="min-w-0 flex-1">
        <p class="text-md font-medium text-gray-900">
          <a class="hover:underline" href="#">{{ name }} | <span class="text-sm font-base text-gray-600">{{
              email
            }}</span></a>
        </p>
        <p class="text-sm text-gray-500">
          <a class="hover:underline" href="#">{{ createdTime }}</a>
        </p>
      </div>
      <div class="flex-shrink-0 self-center flex">
        <DangerButton class="p-1" @click.prevent="submit">Delete</DangerButton>
      </div>
    </div>
    <div class="mt-4 text-gray-700 text-sm">
      <p>{{ props.message }}</p>
    </div>
  </div>
</template>

<script setup>
import {Menu, MenuButton, MenuItem, MenuItems} from '@headlessui/vue'
import {CodeBracketIcon, EllipsisVerticalIcon, FlagIcon, StarIcon} from '@heroicons/vue/24/solid'
import DangerButton from "@/Components/DangerButton.vue";
import {useForm} from "@inertiajs/vue3";
import {usePush} from "notivue";

const props = defineProps({
  message: {
    required: true,
    type: String
  },
  name: {
    required: true,
    type: String,
  },
  createdTime: {
    required: true,
    type: String
  },
  email: {
    required: true,
    type: String
  },
  id: {
    required: true
  }
})

const push = usePush();
const form = useForm({});

function submit() {
  form.delete(route('admin.aspiration.destroy', props.id), {
    onSuccess: () => {
      push.success({
        message: 'Aspiration Success to Delete'
      })
    }
  })
}
</script>