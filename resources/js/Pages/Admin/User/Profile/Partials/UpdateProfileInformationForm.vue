<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Link, useForm, usePage} from '@inertiajs/vue3';
import {ref} from "vue";

const roleChange = ref(false);

const props = defineProps({
  mustVerifyEmail: {
    type: Boolean,
  },
  status: {
    type: String,
  },
  user: {
    required: true
  }
});

// const user = usePage().props.auth.user;

const form = useForm({
  image: props.user[0].image,
  name: props.user[0].name,
  phone: props.user[0].phone,
  npm: props.user[0].npm,
  position: props.user[0].position,
  id: props.user[0].id,
  role: props.user[0].role
});
</script>

<template>
  <section>
    <header>
      <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Profile Information</h2>
      <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
        Update your account's profile information and email address.
      </p>
      <img class="w-28 h-28 my-2" src="https://ui-avatars.com/api/?background=3d3d3d&color=fff&rounded=true">
    </header>

    <form class="mt-6 space-y-6" @submit.prevent="form.patch(route('admin.users.update'))">
      <div class="xl:flex space-x-4"
      >
        <div class="basis-1/2">
          <div>
            <InputLabel for="name" value="Name"/>

            <TextInput
                id="name"
                v-model="form.name"
                autocomplete="name"
                autofocus
                class="mt-1 block w-full"
                required
                type="text"
            />

            <InputError :message="form.errors.name" class="mt-2"/>
          </div>

          <div>
            <InputLabel for="email" value="Email"/>

            <TextInput
                id="email"
                v-model="props.user[0].email"
                autocomplete="username"
                class="mt-1 block w-full text-gray-500"
                disabled
                type="email"
            />
          </div>

          <div>
            <InputLabel for="npm" value="NPM"/>

            <TextInput
                id="npm"
                v-model="form.npm"
                class="mt-1 block w-full"
                required
                type="text"
            />

            <InputError :message="form.errors.npm" class="mt-2"/>
          </div>

          <div>
            <InputLabel for="phone" value="Phone"/>

            <TextInput
                id="phone"
                v-model="form.phone"
                class="mt-1 block w-full"
                required
                type="text"
            />

            <InputError :message="form.errors.phone" class="mt-2"/>
          </div>

          <div
          >
            <InputLabel for="position" value="Position"/>
            <TextInput
                id="position"
                v-model="form.position"
                class="mt-1 block w-full"
                required
                type="text"
            />
          </div>
        </div>
        <div class="basis-1/2 space-y-6">
          <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Period information</h3>
          <div>
            <div>
              <InputLabel for="email" value="Year"/>

              <TextInput
                  id="email"
                  v-model="props.user[0].year"
                  autocomplete="username"
                  class="mt-1 block w-full text-gray-500"
                  disabled
                  type="text"
              />
            </div>
          </div>
          <div>
            <div>
              <h3 class="block font-medium text-sm text-gray-700 dark:text-gray-300">Role</h3>
              <div class="flex w-full space-x-4">
                <div class="flex w-full items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
                  <input id="role"
                         v-model="form.role"

                         class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                         name="role"
                         type="radio"
                         value="Admin Period"
                  >
                  <label class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                         for="role">Admin Period</label>
                </div>
                <div class="flex w-full items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
                  <input id="role-2" v-model="form.role"
                         class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                         name="role-2"
                         type="radio"
                         value="User"
                  >
                  <label class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                         for="role-2">User</label>
                </div>
              </div>
            </div>
          </div>

          <div v-show="roleChange">
            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
              <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center pl-3">
                  <input id="horizontal-list-radio-license"
                         v-model="form.role"
                         class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                         name="list-radio"
                         type="radio" value="Admin Period">
                  <label class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                         for="horizontal-list-radio-license">Admin Period</label>
                </div>
              </li>
              <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center pl-3">
                  <input id="horizontal-list-radio-id"
                         v-model="form.role"
                         class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                         name="list-radio" type="radio" value="User">
                  <label class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                         for="horizontal-list-radio-id">User</label>
                </div>

              </li>
            </ul>
          </div>

        </div>
      </div>

      <div class="flex items-center gap-4">
        <PrimaryButton v-show="form.isDirty">Save</PrimaryButton>

        <Transition
            enter-active-class="transition ease-in-out"
            enter-from-class="opacity-0"
            leave-active-class="transition ease-in-out"
            leave-to-class="opacity-0"
        >
          <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">Saved.</p>
        </Transition>
      </div>
    </form>
  </section>
</template>
