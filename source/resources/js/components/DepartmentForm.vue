<template>
    <div class="row">
        <div class="col-8" >
            <div class="card" v-show="show">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre del departamento</label>
                        <input v-model.trim="newDepartment.name" type="text" class="form-control" id="name" placeholder="Ex: Lima">

                    </div>
                    <div class="mb-3">
                        <label for="ubigeoCode" class="form-label">Código de geo-referencia</label>
                        <input v-model.trim="newDepartment.ubigeoCode" type="text" class="form-control" id="ubigeoCode" placeholder="Ex:05, 25">
                    </div>
                    <select class="form-select" v-model="newDepartment.status" aria-label="Select status code">
                        <option selected value="">Seleccionar estado</option>
                        <option value="ACTIVE">Activo</option>
                        <option value="DRAFT">Proyecto</option>
                        <option value="DELETED">Eliminado</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <a class="btn btn-dark" v-on:click="show = !show">
                {{ show === true ? 'Cancelar' : 'Adicionar nuevo departamento' }}
            </a>
            <a v-if="show === true" class="btn btn-primary" v-on:click.prevent="send()">
                Enviar
            </a>
        </div>
        <div class="col-12">
            <p><b>{{ message ? message  : '' }} </b>  {{ respStatus ? `- status code ${respStatus}` : '' }}</p>
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" v-for="(error, i) in errors" v-bind:key="i">
                        <p class="text-danger">{{ error[0] }}</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios"

export default {
    data(){
        return {
            show : false,
            newDepartment:{
                name : '',
                ubigeoCode: '',
                status: ''
             },
             errors: [],
             message: '',
             respStatus: ''
        }
    },
    created() {

    },
    methods: {
        async send() {
            try {
                const { data, status } = await axios.post('/api/department', this.newDepartment);
                if(status == 201) {
                    this.message = data.message
                    this.respStatus = status
                    this.errors = []
                    setTimeout(function(){
                        window.location.href = '/';
                    }, 2500);
                }

            } catch (e) {
                this.errors = e.response.data.errors
                this.message = e.response.data.message
                this.respStatus = e.response.status
            }

        }
    },
}
</script>

<style>

</style>
