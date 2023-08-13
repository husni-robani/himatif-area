<template>
  <section>
    <ul class="divide-y divide-gray-200 dark:divide-gray-700" role="list">
      <li v-for="period in props.periods"
          :key="period.year"
          class="pt-3 pb-0 sm:pt-4">
        <div class="flex items-center space-x-4 bg-slate-50 p-2 rounded-lg">
          <span v-if="period.active === 1" class="relative flex h-3 w-3">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3 w-3 bg-green-400"></span>
          </span>
          <span v-else class="relative flex h-3 w-3">
            <span class="relative inline-flex rounded-full h-3 w-3 bg-gray-500"></span>
          </span>
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
                <button
                    class="block px-4 py-2 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-red-500"
                    @click.prevent="deletePeriod(period.year)"
                >
                  Delete
                </button>
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
                <button
                    v-show="period.active === 0"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                    @click.prevent="changeActiveStatus(period.year)">
                  Set As Active
                </button>
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
import {Link, useForm} from "@inertiajs/vue3";
import DropdownsDot from "@/Components/DropdownsDot.vue";
import {MenuItem} from "@headlessui/vue";
import {usePush} from "notivue";

const formDelete = useForm({})
const push = usePush();

function changeActiveStatus(year) {
  useForm({}).post(route('admin.periods.activeStatus', year), {
    onSuccess: () => {
      push.success({
        message: 'Active period has been changed'
      })
    }
  })
}

function deletePeriod(year) {
  formDelete.delete(route('admin.periods.destroy', year), {
    onSuccess: () => {
      push.warning({
        title: 'Delete Success',
        message: 'period ' + year + ' has been deleted',
      });
    },
    onError: () => {
      push.error({
        message: 'period failed to Delete'
      })
    }
  })

}

const props = defineProps({
  periods: {
    required: true
  }
})


</script>