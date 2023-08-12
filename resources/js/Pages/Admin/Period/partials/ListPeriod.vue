<template>
  <section>
    <ul class="divide-y divide-gray-200 dark:divide-gray-700" role="list">
      <li v-for="period in props.periods"
          :key="period.year"
          class="pt-3 pb-0 sm:pt-4">
        <div class="flex items-center space-x-4 bg-slate-50 p-2 rounded-lg">
          <div class="flex-shrink-0">
            <img alt="Thomas image" class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-5.jpg">
          </div>
          <div class="flex-1 min-w-0">
            <p class="text-md font-medium text-gray-900 truncate dark:text-white">
              {{ period.name }}
            </p>
            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
              {{ period.year }}
            </p>
          </div>
          <!----Dropdown---->
          <DropdownsDot>
            <template #menu>
              <MenuItem v-slot="{ active }">
                <Link
                    :href="route('admin.periods.destroy', period.year)"
                    as="link"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-red-500"
                    method="delete"
                >
                  Delete
                </Link>
              </MenuItem>
              <MenuItem v-slot="{ active }">
                <Link :href="route('admin.periods.edit', period.year)"
                      class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                      method="get">Edit
                </Link>
              </MenuItem>
              <MenuItem v-slot="{ active }">
                <Link :href="route('admin.periods.edit', period.year)"
                      class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                      method="get">Detail
                </Link>
              </MenuItem>
              <MenuItem v-slot="{ active }">
                <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                   href="#">Set As Active</a>
              </MenuItem>
            </template>
          </DropdownsDot>

          <!----End Dropdown---->
        </div>
      </li>
    </ul>
  </section>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";
import DropdownsDot from "@/Components/DropdownsDot.vue";
import {MenuItem} from "@headlessui/vue";

document.addEventListener("DOMContentLoaded", function (event) {
  document.getElementById('defaultModalButton').click();
});

const props = defineProps({
  periods: {
    required: true
  }
})


</script>