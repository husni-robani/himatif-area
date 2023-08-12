<template>
  <Menu as="div" class="relative inline-block text-left">
    <div>
      <MenuButton
          class="bg-gray-100 rounded-full flex items-center text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500">
        <span class="sr-only">Open options</span>
        <component :is="props.iconType" aria-hidden="true" class="h-7 w-7"/>
      </MenuButton>
    </div>

    <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95"
                enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75"
                leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
      <MenuItems
          class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
        <div class="py-1">
          <slot name="menu"/>
        </div>
      </MenuItems>
    </transition>
  </Menu>
</template>

<script setup>
import {Menu, MenuButton, MenuItem, MenuItems} from '@headlessui/vue'
import {EllipsisVerticalIcon} from '@heroicons/vue/24/solid'

const props = defineProps({
  iconType: {
    default: EllipsisVerticalIcon
  }

})

</script>