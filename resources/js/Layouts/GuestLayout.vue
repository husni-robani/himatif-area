<template xmlns="http://www.w3.org/1999/html">
  <Notivue v-slot="item">
    <Notifications :item="item" :theme="materialTheme"/>
  </Notivue>

  <div class="relative bg-gray-100  min-h-screen">
    <Header/>

    <main class="mt-10">
      <slot/>
    </main>

    <div class="absolute inset-x-0 bottom-0">
      <Footer/>
    </div>
  </div>
</template>

<script setup>
import Header from "@/Layouts/Partials/Header.vue";
import Footer from "@/Layouts/Partials/Footer.vue";
import {materialTheme, Notifications, Notivue} from "notivue";
</script>