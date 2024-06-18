<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputMask from 'primevue/inputmask';
import { watch, ref } from 'vue';
import InputNumber from 'primevue/inputnumber';
import Button from 'primevue/button';



const form = useForm({
    destination: 'ES',
    ammount: null
});
const submit = () => {
    form.post(route('maketransfer.process'));
};

</script>

<template>
    <GuestLayout>

        <Head title="Register" />
        <div class="text-center p-4 bg-slate-50 rounded-xl">
            <h1 class="text-gray-700 font-medium">Bienvenido a la sección de creación de transferencias! Por favor,
                asegurate de escribir el número de cuenta adecuado para asegurar que su dinero llega a su destino!</h1>

        </div>
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="destination" value="Cuenta de destino" />

                <InputMask class="mt-1 block w-full" id="destination" v-model="form.destination"
                    mask="ES99-9999-9999-9999-9999-9999" placeholder="ES99-9999-9999-9999-9999-9999" autofocus />

                <InputError class="mt-2" :message="form.errors.destination" />
            </div>

            <div class="mb-4">
                <InputLabel for="ammount" value="Cantidad a enviar (€)" />
                <InputNumber class="mt-1 block w-full" id="ammount" v-model="form.ammount" inputId="integeronly" />
                <InputError class="mt-2" :message="form.errors.ammount" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('dashboard')" class="">
                <Button label="Volver al Dashboard" class="hover:underline" />
                </Link>

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Realizar Transferencia
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
