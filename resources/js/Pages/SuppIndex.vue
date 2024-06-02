<template>

    <Head title="Bienvenido jiji" />
    <div class="bg-green-500 text-white py-4 px-6 flex justify-between">
        <div>
            <ApplicationLogo class="block h-9 w-auto fill-current text-white-800" />
        </div>
        <div v-if="userLoggedIn" class="">
            <Link :href="route('dashboard')">{{ $page.props.auth.user.name }}'s Dashboard</Link>
        </div>
        <div v-else>
            <Link :href="route('login')">Log In</Link>
        </div>
    </div>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

defineProps({
    userLoggedIn: {
        type: Boolean,
    },
})

</script>
