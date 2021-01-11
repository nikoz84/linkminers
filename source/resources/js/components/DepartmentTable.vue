<template>
<table class="table table-striped" v-if="items.lenght > 0">
    <thead>
    <tr>
        <th>ID</th>
        <th>ubigeoCode</th>
        <th>Status</th>
        <th>Nombre</th>
        <th>Creado en</th>
    </tr>
    </thead>
    <tbody>
        <tr v-for="(item, i) in items" :key="i">
            <td>{{ item.departmentId }}</td>
            <td>{{ item.ubigeoCode }}</td>
            <td>{{ item.status }}</td>
            <td>{{ item.name }}</td>
            <td>{{ item.createdDate }}</td>
        </tr>
    </tbody>
</table>
</template>

<script>
export default {
    name: "DepartmentTable",
    props:['items']
}
</script>

<style>

</style>
