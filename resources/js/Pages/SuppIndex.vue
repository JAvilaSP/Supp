<template>

    <Head title="Bienvenido jiji" />
    <SuppHeaderUser v-if="userLoggedIn" />
    <SuppHeaderGuest v-else />
    <!-- Banner 1 -->
    <div class="mt-4 flex justify-center w-full">
        <div class="relative max-w-[80%]">
            <Card class="md:absolute md:left-[-15%] md:top-[15%] md:w-[40%] shadow-md bg-green-100">
                <template #content class="relative pb-16">
                    <h1 class="text-4xl text-gray-600">Bienvenido a la nueva manera de entender el capitalismo</h1>
                    <Link :href="route('register')" class="absolute bottom-4 right-4">
                    <Button label="Únete!" class="boton" />
                    </Link>
                </template>
            </Card>
            <img src="@/../assets/img/8069130.jpg" alt="Banking" class="hidden md:block w-[1000px] ">
        </div>
    </div>
    <!-- Banner 2 -->
    <div class="bg-gray-100 mt-4 py-10 align-middle justify-center">
        <h2 class="text-center text-3xl">Cuentas para todo tipo de seres</h2>
        <p class="text-center text-xl px-[30%]">Supp ofrece comida para todos todas amet, consectetur adipisicing elit.
            Inventore sed consequuntur error
            repudiandae numquam deserunt quisquam repellat libero asperiores earum nam nobis, culpa ratione
            quam perferendis esse, cupiditate neque
            quas!</p>
        <div class="flex justify-center">
            <Card style="width: 25rem; overflow: hidden">
                <template #header>
                    <img alt="user header" src="@/../assets/img/8069130.jpg" />
                </template>
                <template #title>Advanced Card</template>
                <template #subtitle>Card subtitle</template>
                <template #content>
                    <p class="m-0">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore sed consequuntur error
                        repudiandae numquam deserunt quisquam repellat libero asperiores earum nam nobis, culpa ratione
                        quam perferendis esse, cupiditate neque
                        quas!
                    </p>
                </template>
                <template #footer>
                    <div class="flex gap-3 mt-1">
                        <Link :href="route('register')" class="">
                        <Button label="Únete!" class="boton" />
                        </Link>
                        <Link :href="route('register')" class="">
                        <Button label="Únete!" class="boton" />
                        </Link>
                    </div>
                </template>
            </Card>
            <Card style="width: 25rem; overflow: hidden">
                <template #header>
                    <img alt="user header" src="@/../assets/img/8069130.jpg" />
                </template>
                <template #title>Advanced Card</template>
                <template #subtitle>Card subtitle</template>
                <template #content>
                    <p class="m-0">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore sed consequuntur error
                        repudiandae numquam deserunt quisquam repellat libero asperiores earum nam nobis, culpa ratione
                        quam perferendis esse, cupiditate neque
                        quas!
                    </p>
                </template>
                <template #footer>
                    <div class="flex gap-3 mt-1">
                        <Link :href="route('register')" class="">
                        <Button label="Únete!" class="boton" />
                        </Link>
                        <Link :href="route('register')" class="">
                        <Button label="Únete!" class="boton" />
                        </Link>
                    </div>
                </template>
            </Card>
        </div>
    </div>
    <!-- Banner 3 -->
    <div class="mt-4 align-middle justify-center flex flex-col gap-6">
        <h2 class="text-center text-3xl">Una Experiencia Épica</h2>

        <div class="flex justify-center gap-12 h-[341.33px]">
            <img src="@/../assets/img/dinero-en-planta.png" alt="" class="w-[512px]">
            <div class="flex flex-col justify-center w-[512px] h-full py-4 content-center">
                <div class="">
                    <h2 class="font-bold text-xl text-gray-700 mb-2">En tu móvil para hacerte la vidapp más fácil</h2>
                    <h3 class="text-lg mb-4">Más que una app, es la tranquilidad de tener a alguien a tu lado.</h3>
                    <p class="mb-4">Para ayudarte en todo eso que te esperas de un banco… y en un montón de cosas más
                        que no.</p>
                    <button class="buttonLink">Sopa Gratis</button>
                </div>
            </div>
        </div>
        <div class="flex justify-center gap-12 h-[341.33px]">
            <div class="flex flex-col justify-center w-[512px] h-full py-4 content-center">
                <div class="">
                    <h2 class="font-bold text-xl text-gray-700 mb-2">En tu móvil para hacerte la vidapp más fácil</h2>
                    <h3 class="text-lg mb-4">Más que una app, es la tranquilidad de tener a alguien a tu lado.</h3>
                    <p class="mb-4">Para ayudarte en todo eso que te esperas de un banco… y en un montón de cosas más
                        que no.</p>
                    <button class="buttonLink">Sopa Gratis</button>
                </div>
            </div>
            <img src="@/../assets/img/dinero-en-suelo.png" alt="" class="w-[512px]">
        </div>
    </div>
    <!-- Banner 4 -->
    <div class="py-8 flex">
        <div class="w-[1072px] bg-gray-100 py-6 rounded-2xl">
            <h1 class="t text-4xl mb-6">¡Te estamos esperando!</h1>
            <button class="buttonLink mb-4">Unete a mi secta</button>
            <h3>Y unete a mas de 3 personas que ya están dentro!</h3>
        </div>
    </div>

</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Button from 'primevue/button';
import SuppHeaderUser from '@/Components/SuppHeaderUser.vue';
import SuppHeaderGuest from '@/Components/SuppHeaderGuest.vue';
import Card from 'primevue/card';

defineProps({
    userLoggedIn: {
        type: Boolean,
    },
})

</script>

<style>
* {
    justify-content: center;
    text-align: center;
}
.boton {
    @apply bg-green-600 text-white p-2;
}

</style>
