<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputMask from 'primevue/inputmask';
import { watch, ref } from 'vue';
import SelectButton from 'primevue/selectbutton';


defineProps({
    mayorcito: {
        type: Boolean,
        required: false,
    }
});

const form = useForm({
    accountType: 'Cuenta Nómina',
    accountNumber: 'ES'
});
watch (form.birthday, (newDate) => {
  if (newDate) {
    form.birthday = new Date(newDate.getTime() - newDate.getTimezoneOffset() * 60000);
  }
});
const submit = () => {
    form.post(route('accountcreate'), {
        onFinish: () => form.reset('accountNumber'),
    });
};

const options = ref(['Cuenta Joven', 'Cuenta Nómina']);

function matar() {
    console.log(form.accountNumber,form.accountType);
}
</script>

<template>
    <GuestLayout>
        <Head title="Register" />
        <div class="text-center p-4 bg-slate-50 rounded-xl">
            <h1 class="text-gray-700 font-medium">Gracias por elegir Supp! Estamos encantados de tenerte, por favor dedica un par de minutos a crear tu nueva cuenta!</h1>
            <h1 class="mt-3 text-gray-700 font-medium">Recuerda que Supp quiere dar todo el poder a sus usuarios, aqui te permitimos elegir tu propio numero de cuenta mientras este no esté ocupado, sientete libre de impersonar a gente que no forme parte de la base de datos de Supp.</h1>
            <h1 class="mt-3 text-gray-700 font-medium">Y además, usted tendrá la capacidad de hacer que su cuenta sea Joven o Nómina (Solo aplicable para menores de 25 años)</h1>
        </div>
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="accountNumber" value="Account number" />

                <InputMask class="mt-1 block w-full" id="accountNumber" v-model="form.accountNumber" mask="ES99-9999-9999-9999-9999-9999" placeholder="ES99-9999-9999-9999-9999-9999" />

                <InputError class="mt-2" :message="form.errors.accountNumber" />
            </div>

            <div class="mb-4">
                <InputLabel for="accounttype" value="Account Type" />
                <div class="text-center">
                    <SelectButton v-if="mayorcito" class="my-4" id="accounttype" v-model="form.accountType" :options="options" aria-labelledby="basic" disabled />
                    <SelectButton v-else class="my-4" id="accounttype" v-model="form.accountType" :options="options" aria-labelledby="basic"  />
                </div>
                <InputError class="mt-2" :message="form.errors.accountType" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <!-- <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    ¿Ya estás registrado?
                </Link> -->

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Crear cuenta
                </PrimaryButton>
                <button @click="matar">matar</button>
            </div>
        </form>
    </GuestLayout>
</template>
