<template>
  <GuestLayout>

    <div class="bg-white py-16 sm:py-24 h-full">
      <div class="relative sm:py-16">
        <div aria-hidden="true" class="hidden sm:block">
          <div class="absolute inset-y-0 left-0 w-1/2 bg-secondaryAccent rounded-r-3xl"/>
          <svg class="absolute top-8 left-1/2 -ml-3" fill="none" height="392" viewBox="0 0 404 392" width="404">
            <defs>
              <pattern id="8228f071-bcee-4ec8-905a-2a059a2cc4fb" height="20" patternUnits="userSpaceOnUse" width="20"
                       x="0"
                       y="0">
                <rect class="text-gray-200" fill="currentColor" height="4" width="4" x="0" y="0"/>
              </pattern>
            </defs>
            <rect fill="url(#8228f071-bcee-4ec8-905a-2a059a2cc4fb)" height="392" width="404"/>
          </svg>
        </div>
        <div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8">
          <div class="relative rounded-2xl px-6 py-10 bg-accent overflow-hidden shadow-xl sm:px-12 sm:py-20">
            <div aria-hidden="true" class="absolute inset-0 -mt-72 sm:-mt-32 md:mt-0">
              <svg class="absolute inset-0 h-full w-full" fill="none"
                   preserveAspectRatio="xMidYMid slice" viewBox="0 0 1463 360" xmlns="http://www.w3.org/2000/svg">
                <path class="text-accent text-opacity-40"
                      d="M-82.673 72l1761.849 472.086-134.327 501.315-1761.85-472.086z"
                      fill="currentColor"/>
                <path class="text-accent text-opacity-40"
                      d="M-217.088 544.086L1544.761 72l134.327 501.316-1761.849 472.086z"
                      fill="currentColor"/>
              </svg>
            </div>
            <div class="relative">
              <div class="sm:text-center">
                <h2 class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl">Get The Link for aspiration
                  link</h2>
                <p class="mt-6 mx-auto max-w-2xl text-lg text-white">Sagittis scelerisque nulla cursus in enim
                  consectetur quam. Dictum urna sed consectetur neque tristique pellentesque.</p>
              </div>
              <form class="mt-12 sm:mx-auto sm:max-w-lg sm:flex" method="post" @click.prevent="submit">
                <div class="min-w-0 flex-1">
                  <label class="sr-only" for="cta-email">Email address</label>
                  <input id="cta-email"
                         v-model="form.email"
                         class="block w-full border border-transparent rounded-md px-5 py-3 text-base text-gray-900 placeholder-gray-500 shadow-sm focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-accent"
                         placeholder="Enter your email"
                         type="email"/>
                  <InputError :message="form.errors.email" class="text-white"/>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-3">
                  <PrimaryButton
                      class="block w-full bg-secondaryAccent rounded-md border border-transparent px-5 py-3 text-sm  font-medium text-white shadow  sm:px-10 hover:bg-red-800 focus:bg-red-800"
                      type="submit">
                    Send Link
                  </PrimaryButton>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>

<script setup>

import {useForm} from "@inertiajs/vue3";
import {materialTheme, Notifications, Notivue, usePush} from "notivue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";

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