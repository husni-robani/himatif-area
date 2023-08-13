<template>
  <Notivue v-slot="item">
    <Notifications :item="item" :theme="materialTheme"/>
  </Notivue>

  <div class="bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:p-6">
      <h3 class="text-lg leading-6 font-medium text-gray-900">Update your email</h3>
      <div class="mt-2 max-w-xl text-sm text-gray-500">
        <p>Change the email address you want associated with your account.</p>
      </div>
      <form class="mt-5 sm:flex sm:items-center" @click.prevent="submit">
        <div class="w-full sm:max-w-xs">
          <label class="sr-only" for="email">Email</label>
          <input id="email"
                 v-model="form.email"
                 class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                 name="email"
                 placeholder="you@widyatama.ac.id"
                 type="email"/>
          <InputError :message="form.errors.email"/>
        </div>
        <PrimaryButton class="ml-2">
          Save
        </PrimaryButton>
      </form>
    </div>
  </div>
</template>

<script setup>

import {useForm} from "@inertiajs/vue3";
import {materialTheme, Notifications, Notivue, usePush} from "notivue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";

const form = useForm({
  email: null
})

const push = usePush();

function submit() {
  form.post(route('aspiration.store-email'), {
    onSuccess: () => {
      push.success({
        message: 'Link has been sent to ' + form.email
      });
      form.reset();
    }
  })
}
</script>