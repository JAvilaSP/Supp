<template>

    <Head title="Bienvenido jiji" />
    <AuthenticatedLayout v-if="userLoggedIn">
        <template #header>
            <p>{{ $page.props.auth.user.name }}, se bienvenido a tu futuro proyecto.</p>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

    <div v-else>
        <h2>Inicia sesion bro.</h2>
        <Link :href="route('login')">Inicia ses</Link>
    </div>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps({
    userLoggedIn: {
        type: Boolean,
    },
})

</script>
