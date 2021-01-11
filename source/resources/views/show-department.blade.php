@extends('layout.default')

@section('content')
<div id="app">
    <section class="card mt-5">
        <div class="card-body" v-if="loading">
            <div class="card-title">
                <h5>Detalles del Departamento de: @{{ department.name }}</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Status</b>: @{{ department.status }}</li>
                <li class="list-group-item"><b>ubigeoCode</b>: @{{ department.ubigeoCode }}</li>
                <li class="list-group-item"><b>ID departamento</b>: @{{ department.departmentId }}</li>
                <li class="list-group-item"><b>ID usuário</b>: @{{ department.createdUser }}</li>
                <li class="list-group-item"><b>ID usuário actualizador</b>: @{{ department.lastModifiedUser }}</li>
                <li class="list-group-item">
                    <div class="d-flex justify-content-around">
                        <a href="{{ route('show.departments') }}"> Volver al inicio</a>
                        <a class="text-success" href="" v-on:click.prevent="show = !show">Editar</a>
                    </div>
                </li>
            </ul>
            <div v-if="message">
               <b> @{{ message }}</b>
            </div>
        </div>
        <div v-else class="card-body">
            <div class="card-title"> CARGANDO... </div>
        </div>
    </section>
    <section class="card mt-1" v-if="show">
        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre del departamento</label>
                <input v-model.trim="newDepartment.name" type="text" class="form-control" id="name" placeholder="Ex: Lima">
            </div>
            <div class="mb-3">
                <label for="ubigeoCode" class="form-label">Código de geo-referencia</label>
                <input v-model.trim="newDepartment.ubigeoCode" type="text" class="form-control" id="ubigeoCode" placeholder="Ex:05, 25">
            </div>
            <div class="mb-3">
                <select class="form-select" v-model="newDepartment.status" aria-label="Select status code">
                    <option selected value="">Seleccionar estado</option>
                    <option value="ACTIVE">Activo</option>
                    <option value="DRAFT">Proyecto</option>
                    <option value="DELETED">Eliminado</option>
                </select>
            </div>
            <div class="mb-3">
                <a class="btn btn-primary" v-on:click="edit">Enviar</a>
            </div>
            <div class="mb-3">
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" v-for="(error, i) in errors" v-bind:key="i">
                            <p class="text-danger">@{{ error[0] }}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
@stop

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>

        const id = @json( $department->departmentId );

        const app = new Vue({
            el: '#app',
            data() {
                return {
                    department: {},
                    loading: false,
                    show: false,
                    message: '',
                    errors: [],
                    newDepartment: {
                        name: '',
                        ubigeoCode: '',
                        status: '',
                        _method: 'PUT'
                    }
                }
            },
            methods: {
                edit(evt){
                    const id = this.department.departmentId;
                    const self = this
                    self.message = 'Enviando... espere um momento';
                    self.show = false;
                    axios.post('/api/department/' + id, this.newDepartment)
                    .then(function(resp){
                        self.department = resp.data.department;
                        self.message = resp.data.message;
                        //window.location.href = '/department/' + resp.data.department.departmentId;
                    }).catch(function(e){
                        self.errors = e.response.data.errors;
                        self.message = e.response.data.message;
                        self.show = true;
                    });

                }
            }
        })


        axios.get('/api/department/' + id).then(function (resp){
            app.loading = true
            app.department = resp.data
        });

    </script>
@endpush

