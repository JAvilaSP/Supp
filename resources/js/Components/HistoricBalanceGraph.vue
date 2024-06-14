<script setup>
import Chart from 'primevue/chart';
import { ref, onMounted } from "vue";


// const cogerDatitos = async () => {
//     const response = await fetch('/account_test');
//     const data = await response.json();
//     meses.value = data.map(obj => obj.date);
//     // console.log(meses.value);
// }
const meses = ref();
const mesesValores = ref();
const cogerDatitos = async () => {
    const response = await fetch('/account_test');
    const data = await response.json();
    meses.value = data.map(obj => obj.date);
    mesesValores.value = data.map(obj => obj.balance);
}
cogerDatitos();
onMounted(async () => {
    await cogerDatitos();
    chartData.value = await setChartData();
    chartOptions.value = setChartOptions();
});

const chartData = ref();
const chartOptions = ref();

const setChartData = () => {
    cogerDatitos();
    console.log(meses.value);
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
    <Chart type="bar" :data="chartData" :options="chartOptions" />
</template>
