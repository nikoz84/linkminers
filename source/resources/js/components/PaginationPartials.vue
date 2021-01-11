<template>
<div>
    <department-table></department-table>
    <nav aria-label="navigation" v-if="paginator.total() > 0">
        <ul class="pagination pagination-sm">
            <li v-if="paginator.onFirstPage()" class="page-item disabled" aria-disabled="true">
                <span class="page-link">Anterior</span>
            </li>
            <li v-else class="page-item">
                <a class="page-link" :href="paginator.previousPageUrl()" rel="prev">Anterior</a>
            </li>


            <li v-if="paginator.hasMorePages()" class="page-item">
                <a class="page-link" :href="paginator.nextPageUrl()" rel="next">Próximo</a>
            </li>
            <li v-else class="page-item disabled" aria-disabled="true">
                <span class="page-link">Próximo</span>
            </li>
        </ul>
    </nav>
</div>
</template>

<script>
import DepartmentTable from './DepartmentTable.vue'

export default {
    props: ["paginator"],
    components: {"department-table" : DepartmentTable},
    created() {
        console.log(this.paginator)
    },
}
</script>

<style>

</style>
