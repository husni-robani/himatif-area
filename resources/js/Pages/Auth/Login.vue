<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import HimatifPrimaryLogo from "@/Assets/HimatifPrimaryLogo.vue";
import HimatifSecondaryLogo from "@/Assets/HimatifSecondaryLogo.vue";

defineProps({
  canResetPassword: {
    type: Boolean,
  },
  status: {
    type: String,
  },
});

const form = useForm({
  email: '',
  password: '',
  remember: false,
});

const submit = () => {
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
  });
};
</script>

<template>
  <Head title="Log in"/>
  <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
      <Link href="/">
        <HimatifSecondaryLogo class="w-40 h-40 fill-current"/>
      </Link>
    </div>

    <div
        class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
    >
      <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
      </div>

      <form @submit.prevent="submit">
        <div>
          <InputLabel for="email" value="Email"/>

          <TextInput
              id="email"
              v-model="form.email"
              autocomplete="username"
              autofocus
              class="mt-1 block w-full"
              required
              type="email"
          />

          <InputError :message="form.errors.email" class="mt-2"/>
        </div>

        <div class="mt-4">
          <InputLabel for="password" value="Password"/>

          <TextInput
              id="password"
              v-model="form.password"
              autocomplete="current-password"
              class="mt-1 block w-full"
              required
              type="password"
          />

          <InputError :message="form.errors.password" class="mt-2"/>
        </div>

        <div class="block mt-4">
          <label class="flex items-center">
            <Checkbox v-model:checked="form.remember" name="remember"/>
            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
          </label>
        </div>

        <div class="flex items-center justify-end mt-4">
          <Link
              v-if="canResetPassword"
              :href="route('password.request')"
              class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
          >
            Forgot your password?
          </Link>

          <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" class="ml-4">
            Log in
          </PrimaryButton>
        </div>
      </form>
    </div>
  </div>
</template>
