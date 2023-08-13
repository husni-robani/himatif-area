<template>

  <GuestLayout>
    <Head title="Aspiration Form"/>
    <form class="space-y-8 divide-y divide-gray-200" @submit.prevent="submit">
      <div class="space-y-8 divide-y divide-gray-200">


        <div class="pt-8">
          <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">Personal Information</h3>
            <p class="mt-1 text-sm text-gray-500">Use a permanent address where you can receive mail.</p>
          </div>
          <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
            <div class="sm:col-span-3">
              <label class="block text-sm font-medium text-gray-700" for="name">Name</label>
              <div class="mt-1">
                <input id="name" v-model="form.name"
                       autocomplete="given-name"
                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                       name="name"
                       type="text"/>
              </div>
            </div>

            <div class="sm:col-span-3">
              <label class="block text-sm font-medium text-gray-700" for="npm">NPM</label>
              <div class="mt-1">
                <input id="npm" v-model="form.npm"
                       autocomplete="family-name"
                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                       name="npm"
                       type="text"/>
              </div>
            </div>

            <div class="sm:col-span-4">
              <label class="block text-sm font-medium text-gray-700" for="aspiration">Your Aspiration</label>
              <div class="mt-1">
                <textarea id="aspiration"
                          v-model="form.aspiration"
                          class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                          name="aspiration"
                          type="text"/>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="pt-5">
        <div class="flex justify-end">
          <PrimaryButton>
            Send
          </PrimaryButton>
        </div>
      </div>
    </form>
  </GuestLayout>
</template>
<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import {Head, useForm} from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {usePush} from "notivue";

const form = useForm({
  name: null,
  npm: null,
  aspiration: null
})

const props = defineProps({
  token: {
    required: true
  }
})

const push = usePush();

function submit() {
  form.post(route('aspiration.store', props.token), {
    onSuccess: () => {
      push.success({
        message: 'Thanks for the aspiration',
      })
    }
  })
}
</script>