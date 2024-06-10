<template>
    <header class="flex items-center justify-between p-4 shadow-md bg-white border-b border-gray-200">
        <!-- Logo -->
        <div class="flex items-center">
            <ApplicationLogo class="block h-9 w-auto text-gray-800" />
            <span class="ml-2 text-xl font-bold text-green-800">Supp</span>
        </div>

        <!-- Navigation Links -->
        <nav class="flex items-center">
            <Link :href="route('login')" class="btn btn-primary mr-2">{{ $page.props.auth.user.name }}</Link>
        </nav>
    </header>
</template>

<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<style scoped>
.btn {
    @apply text-base font-medium px-4 py-2 rounded;
}

.btn-primary {
    @apply bg-blue-600 text-white hover:bg-blue-700;
}

.btn-secondary {
    @apply bg-gray-100 text-gray-800 border border-gray-300 hover:bg-gray-200;
}
</style>
