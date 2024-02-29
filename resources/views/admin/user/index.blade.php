@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <a class="btn btn-secondary float-right" href="{{route('admin.user.create')}}">Agregar usuario</a>
    <h1>Administración de usuarios</h1>
@stop

@section('content')

<div class="card-body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td width="10px">
                        <a class="btn btn-primary" href="{{route('admin.user.edit', $user)}}">Editar</a>
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