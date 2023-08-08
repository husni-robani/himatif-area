<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {Head} from "@inertiajs/vue3";
</script>



<template>
    <Head title="Users"></Head>

<!--TODO !!! : Add List of user (filter based on period) -->
    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Users</h2>
        </template>
        <div>
            <p>
                <a :href="route('admin.users.create')">Add New User</a>
            </p>
        </div>
    </AdminLayout>
</template>
