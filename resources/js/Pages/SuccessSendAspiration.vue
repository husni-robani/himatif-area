<template>
  <div class="min-h-screen pt-16 pb-12 flex flex-col bg-white">
    <main class="flex-grow flex flex-col justify-center max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex-shrink-0 flex justify-center">
        <a class="inline-flex" href="/">
          <span class="sr-only">Workflow</span>
          <HimatifThirdLogo/>
        </a>
      </div>
      <div class="py-16">
        <div class="text-center">
          <h1 class="mt-2 text-4xl font-extrabold text-secondaryAccent tracking-tight sm:text-5xl">Thanks for your
            aspiration</h1>
          <p class="mt-2 text-base text-gray-500">Let's Growth With HIMF Utama</p>
        </div>
      </div>
    </main>
    <footer class="flex-shrink-0 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8">
      <nav class="flex justify-center space-x-4">
        <Link :href="route('welcome')" class="text-sm font-medium text-gray-500 hover:text-gray-600">Home</Link>
        <span aria-hidden="true" class="inline-block border-l border-gray-300"/>
        <Link class="text-sm font-medium text-gray-500 hover:text-gray-600" href="#">About</Link>
        <span aria-hidden="true" class="inline-block border-l border-gray-300"/>
        <Link class="text-sm font-medium text-gray-500 hover:text-gray-600" href="#">Login</Link>
      </nav>
    </footer>
  </div>
</template>

<script setup>

import HimatifThirdLogo from "@/Assets/HimatifThirdLogo.vue";
import HimatifPrimaryLogo from "@/Assets/HimatifPrimaryLogo.vue";
import {Link} from '@inertiajs/vue3'
import HimatifSecondaryLogo from "@/Assets/HimatifSecondaryLogo.vue";
</script>