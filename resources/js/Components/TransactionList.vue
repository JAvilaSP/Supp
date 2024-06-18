<script setup>

import { ref, onMounted } from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup';   // optional
import Row from 'primevue/row';                   // optional
const products = ref();

// const datosJson = await datos.json();
// console.log(datosJson);

// products.value = datosJson.map(info, info.);
// const columnasResultantes = [
//     { field: 'code', header: 'Code' },
//     { field: 'name', header: 'Name' },
//     { field: 'category', header: 'Category' },
//     { field: 'quantity', header: 'Quantity' }
// ];
const columnasResultantes = ref();

onMounted(async () => {
    await fetch('/transaction-history/show')
        .then(response => response.json())
        .then(data => {
          products.value = data;
        });

        columnasResultantes.value = Object.keys(products.value[0]);

        columnasResultantes.value = columnasResultantes.value.map((a) => {

            switch (a) {
                case "_id":
                    return {field: a, header: "ID"}

                case "sending_account":
                return {field: a, header: "Cuenta Origen"}

                case "receiving_account":
                return {field: a, header: "Cuenta Destino"}

                case "ammount":
                return {field: a, header: "Cantidad (€)"}

                default:
                    return {field: a, header: a}

            }
        })

});

</script>
<template>
<!-- <div class="card">
        <DataTable :value="transactions" tableStyle="min-width: 50rem">
            <Column field="code" header="Code"></Column>
            <Column field="name" header="Name"></Column>
            <Column field="category" header="Category"></Column>
            <Column field="quantity" header="Quantity"></Column>
        </DataTable>
    </div> -->

    <div class="card">
        <DataTable :value="products" tableStyle="min-width: 50rem">
            <Column v-for="col of columnasResultantes" :key="col.field" :field="col.field" :header="col.header"></Column>
        </DataTable>
    </div>
</template>
