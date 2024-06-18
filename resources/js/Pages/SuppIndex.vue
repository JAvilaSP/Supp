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
                    <Button label="Únete!" class="buttonLink" />
                    </Link>
                </template>
            </Card>
            <img src="@/../assets/img/8069130.jpg" alt="Banking" class="hidden md:block w-[1000px] ">
        </div>
    </div>
    <!-- Banner 2 -->
    <div class="bg-gray-100 mt-4 py-10 align-middle justify-center">
        <h2 class="text-center text-3xl font-medium">Cuentas para todo tipo de humanos</h2>
        <p class="text-center text-xl px-[30%] my-8">Supp es el banco ideal para ti porque ofrece cuentas que se adaptan a tus necesidades, ya sea una cuenta nómina o una cuenta joven. Con la cuenta nómina de Supp, disfrutarás de beneficios exclusivos. Por otro lado, la cuenta joven de Supp está diseñada para brindarte flexibilidad y ventajas en comercios y tarjetas de débito sin costo. Elige Supp y aprovecha estos beneficios para una experiencia bancaria superior.</p>
        <div class="flex justify-center gap-8 mt-8">
            <Card style="width: 25rem; overflow: hidden">
                <template #header>
                    <img alt="user header" src="@/../assets/img/jovenes.jpg" />
                </template>
                <template #title>Cuenta Joven</template>
                <template #subtitle>Para adultos menores de 25 años</template>
                <template #content>
                    <p class="m-0">
                        Disfruta de esta cuenta diseñada especificamente para jovenes estudiantes o que busquen flexibilidad
                        en su cuenta bancaria. <br>Hacerse una cuenta joven en Supp significa disponer de 1000€ de manera instantanea.
                        <br>¡Además de descuentos en todas las discotecas de Málaga!
                    </p>
                </template>
                <template #footer>
                    <div class="flex gap-3 mt-1">
                        <Link :href="route('register')" class="">
                        <Button label="Únete!" class="buttonLink" />
                        </Link>

                    </div>
                </template>
            </Card>
            <Card style="width: 25rem; overflow: hidden">
                <template #header>
                    <img alt="user header" src="@/../assets/img/nomina.jpg" />
                </template>
                <template #title>Cuenta Nómina</template>
                <template #subtitle>¡Para todos! (los que tengan nómina)</template>
                <template #content>
                    <p class="m-0">
                        La cuenta nómina brinda al usuario un estatus elevado ante la sociedad, no solo demuestras que has
                        dejado de ser un niño, también demuestras tener absoluta independencia financiera. <br>Junto con tu cuenta
                        nómina vienen incluidos 1000€ y facilidades para solicitar cualquier tipo de beca o ayuda estatal.
                    </p>
                </template>
                <template #footer>
                    <div class="flex gap-3 mt-1">
                        <Link :href="route('register')" class="">
                        <Button label="Únete!" class="buttonLink" />
                        </Link>

                    </div>
                </template>
            </Card>
        </div>
    </div>
    <!-- Banner 3 -->
    <div class="mt-16 align-middle justify-center flex flex-col gap-6">
        <!-- <h2 class="text-center text-3xl">Una Experiencia Épica</h2> -->

        <div class="flex justify-center gap-12 h-[341.33px]">
            <img src="@/../assets/img/dinero-en-planta.png" alt="" class="w-[512px]">
            <div class="flex flex-col justify-center w-[512px] h-full py-4 content-center">
                <div class="">
                    <h2 class="font-bold text-xl text-gray-700 mb-2">Supp es ecosostenible y busca la ecoresiliencia</h2>
                    <h3 class="text-lg mb-4">Por eso somos el primer banco que prohibe a sus usuarios sacar dinero en efectivo.</h3>
                    <p class="mb-4">Además, no veis cuanto usamos el color verde??? <br><span class=" text-gray-300">por favor subvencionadnos</span></p>
                    <Link :href="route('register')" class="">
                        <Button label="Saber más" class="buttonLink" />
                        </Link>
                </div>
            </div>
        </div>
        <div class="flex justify-center gap-12 h-[341.33px]">
            <div class="flex flex-col justify-center w-[512px] h-full py-4 content-center">
                <div class="">
                    <h2 class="font-bold text-xl text-gray-700 mb-2">Un banco seguro</h2>
                    <h3 class="text-lg mb-4">En nuestras dos semanas de existencia no hemos quebrado ni una sola vez<sup>1</sup></h3>
                    <p class="mb-4">Crear tu cuenta en Supp es una apuesta exitosa asegurada!<sup>2</sup></p>
                    <Link :href="route('register')" class="">
                        <Button label="Saber más" class="buttonLink" />
                        </Link>
                </div>
            </div>
            <img src="@/../assets/img/dinero-en-suelo.png" alt="" class="w-[512px]">
        </div>
    </div>
    <!-- Banner 4 -->
    <div class="py-8 flex justify-center">
        <div class="w-[1072px] bg-gray-100 py-6 rounded-2xl text-center">
            <h1 class="t text-4xl mb-6">¡Te estamos esperando!</h1>
            <!-- <button class="buttonLink mb-4">Unete a mi secta</button> -->
            <Link :href="route('register')" class="">
                        <Button label="Entra!" class="buttonLink mb-4" />
                        </Link>
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
/* * {
    justify-content: center;
    text-align: center;
} */
.boton {
    @apply bg-green-600 text-white p-2;
}

</style>
