<script setup>
import Chart from 'primevue/chart';
import { ref, onMounted, watch } from "vue";
import Button from 'primevue/button';
import Card from 'primevue/card';
import Toast from 'primevue/toast';
import { useToast } from 'primevue/usetoast';

const toast = useToast();
const showToast = () => {
    toast.add({ severity: 'warn', summary: '¡Atención!', detail: 'Si sus deudas aumentan a mas de 500€, su cuenta será eliminada!!!', life: 3000 });
};


const meses = ref();
const mesesValores = ref();
const dinero = ref();

async function darmeDinero() {
    fetch('/damedinero');
    actualizarDineroActual();
    montar();
    if (dinero.value <= -500) {
        await fetch('/punish_account');
    }
    if (dinero.value < -200) {
        showToast();
    }
}

async function robarmeDinero() {
    fetch('/robadinero');
    actualizarDineroActual();
    montar();
}

async function actualizarDineroActual() {
    const responseActual = await fetch('/see_current_balance');
    const dataActual = await responseActual.json();
    console.log(dataActual);
    dinero.value = dataActual;
}


const cogerDatitos = async () => {
    const response = await fetch('/see_historic_balances');
    const data = await response.json();
    meses.value = data.map(obj => obj.month);
    mesesValores.value = data.map(obj => obj.balance);
    await actualizarDineroActual();
}

// onMounted(montar());
async function montar() {
    await cogerDatitos();
    chartData.value = await setChartData();
}
const chartData = ref();
const chartOptions = ref();

const setChartData = () => {
    // cogerDatitos();
    console.log(meses.value);
    meses.value.push('Mes actual');
    mesesValores.value.push(dinero.value);
    return {
        labels: meses.value,
        datasets: [
            {
                label: 'Tu dinerillo',
                data: mesesValores.value,
                backgroundColor: '#62C370',
                borderColor: '#52A25E',
                borderWidth: 2
            }
        ]
    };
};

function nuevoMes() {
    fetch('/historic_balance');
    montar();
}
montar();

// const setChartOptions = () => {
    //     const documentStyle = getComputedStyle(document.documentElement);
    //     const textColor = documentStyle.getPropertyValue('--p-text-color');
    //     const textColorSecondary = documentStyle.getPropertyValue('--p-text-muted-color');
    //     const surfaceBorder = documentStyle.getPropertyValue('--p-content-border-color');

    //     return {
//         plugins: {
//             legend: {
//                 labels: {
//                     color: textColor
//                 }
//             }
//         },
//         scales: {
//             x: {
//                 ticks: {
//                     color: textColorSecondary
//                 },
//                 grid: {
//                     color: surfaceBorder
//                 }
//             },
//             y: {
//                 beginAtZero: true,
//                 ticks: {
//                     color: textColorSecondary
//                 },
//                 grid: {
//                     color: surfaceBorder
//                 }
//             }
//         }
//     };
// }

</script>

<template>
    <Toast />
    <div class="p-8">
    <div class="flex justify-center">
        <div class="flex justify-between md:w-[80%] h-32">
            <Card class="md:w-[30%] bg-gradient-to-r from-green-300 to-green-600">
                <template #title>Tu saldo:</template>
                <template #content>
                    <h1 v-if="dinero >= 0" class="font-mono">{{ dinero }}€</h1>
                    <h1 v-else class="font-mono text-red-400">{{ dinero }}€</h1>
                </template>

            </Card>
            <!-- <Button @click="darmeDinero" label="perder 100€ bro" class="buttonLink" />
        <Button @click="robarmeDinero" label="ganar 100€ bro" class="buttonLink" />
        <Button @click="nuevoMes" label="Nuevo mes bro" class="buttonLink" />
        <Button @click="montar" label="Actualizar bro" class="buttonLink" /> -->
            <div class="md:w-1/3 grid grid-cols-2 gap-4 m-4">
                <Button @click="darmeDinero" label="Perder 100€" class="buttonLink" />
                <Button @click="robarmeDinero" label="Ganar 100€" class="buttonLink" />
                <Button @click="nuevoMes" label="Nuevo mes" class="buttonLink" />
                <Button @click="montar" label="Actualizar" class="buttonLink" />
            </div>
        </div>
    </div>
    <Chart type="bar" :data="chartData" :options="chartOptions" />
</div>
</template>

<style scoped>
.boton {
    @apply bg-green-600 text-white p-2;
}

.buttonLink {
    @apply text-sm
}
</style>
