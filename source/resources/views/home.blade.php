@extends('layout.default')

@section('content')
<h5 class="d-flex justify-content-center bd-highlight mt-5">
    Departamentos del Perú
</h5>

<div class="d-flex justify-content-around">

    <p> Total de departamentos registrados: <b>{{ $paginator->total() }}</b></p>
</div>


{{-- TABLA --}}
<table class="table table-striped">
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
        @foreach($paginator->items() as $item)
        <tr>
            <td>
                <a href="department/{!! $item->departmentId !!}">{{ $item->departmentId }}</a>
            </td>
            <td>{{ $item->ubigeoCode }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->createdDate }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@include('layout.pagination', ['paginator' => $paginator])

<section class="mb-5">
    <div id="app">
        <department-form></department-form>
    </div>
</section>
@stop

@push('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
