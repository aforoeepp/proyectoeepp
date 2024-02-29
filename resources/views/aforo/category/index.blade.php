@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{ route('aforo.category.create') }}">Agregar categoria</a>
    <h1>Categoria</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif


    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td width="40px">
                             <a class="btn btn-success" href="{{route('aforo.category.edit', $category)}}">Editar</a> 
                          </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@stop

@section('css')

@stop

@section('js')

@stop
