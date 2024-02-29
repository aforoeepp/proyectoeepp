@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <button type="button" class="btn btn-success float-right" id="bagregard" onclick="mostrardetalle()"><span
            class="fa fa-edit"></span>Agregar detalle</button>
    <h1>Editar recipiente</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {!! Form::model($recipiente, ['route' => ['aforo.recipiente.update', $recipiente], 'method' => 'put']) !!}


            <div class="form-group">
                {!! Form::label('name', 'Id') !!}
                {!! Form::text('id', null, [
                    'id' => 'id',
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese el nombre del recipiente',
                    'disabled' => true,
                    'required',
                ]) !!}

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese el nombre del recipiente',
                    'required',
                ]) !!}

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {!! Form::submit('Actualizar recipiente', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>


    <div class="card-body">
        <table class="table table-striped" id="tdetallerecipiente">
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Dimensiones</th>
                    <th>Equivalencia</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
            </tbody>
        </table>
    </div>


    <div class="modal fade" id="mrecipientedetalle">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detalle del recipiente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-12">
                                <span class="help-block text-muted small-font"><strong>Descripción</strong></span>
                                <input id="mtdescripcion" class="form-control">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-12">
                                <span class="help-block text-muted small-font"><strong>Dimensiones</strong></span>
                                <input id="mtdimensiones" class="form-control">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-12">
                                <span class="help-block text-muted small-font"><strong>Equivalencia</strong></span>
                                <input id="mtequivalencia" class="form-control">
                            </div>

                        </div>
                    </div>

                </div>
                <!-- Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-info" id="bagregar" onclick="guardardetalleseguimiento()"><span
                            class="fa fa-edit"></span>Guardar</button>
                </div>

            </div>
        </div>
    </div>

@stop

@section('css')

@stop

@section('js')
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>
    <script type="text/javascript">
       function load() {
       // console.log($("#id").val());
        mostrardetallerecipiente();
        }
        window.onload = load();

        function mostrardetalle() {
            $('#mrecipientedetalle').modal('show');
        }

        function guardardetalleseguimiento() {
            $.ajax({
                url: "{{ route('aforo.recipiente.guardardetalleseguimiento') }}", ///actualizamos la ruta
                method: 'get',
                data: {
                    descripcion: $("#mtdescripcion").val(),
                    dimensiones: $("#mtdimensiones").val(),
                    equivalencia: $("#mtequivalencia").val(),
                    recipiente_id: $("#id").val()
                }
            }).done(function(res) {
                if (res.respuesta) {
                    mostrardetallerecipiente();
                    $('#mrecipientedetalle').modal('toggle');
                    mostrarmensaje('Correcto', res.mensaje);
                } else {
                    mostrarmensaje('Error', res.mensaje);
                }
            });
        }

        //mostramos los mensajes en pantalla
        function mostrarmensaje(tipo, mensaje) {

            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            if (tipo == 'Correcto') {
                Toast.fire({
                    icon: 'success',
                    title: mensaje
                })
            }

            if (tipo == 'Error') {
                Toast.fire({
                    icon: 'error',
                    title: mensaje
                })
            }
        }

        function mostrardetallerecipiente() {
            console.log($("#id").val());
            $.ajax({
                url: "{{ route('aforo.recipiente.mostrardetallerecipiente') }}", ///mostrarlistaderutas
                method: 'get',
                data: {
                    recipiente_id: $("#id").val(),
                    opc: 1
                }
            }).done(function(res) {
                
                var informacion = JSON.parse(res);               

                $('#tdetallerecipiente tbody').empty();             

                var event_data = '';
                $.each(informacion, function(index, value) {
                    event_data += '<tr>';
                    event_data += '<td>' + value.descripcion + '</td>';
                    event_data += '<td>' + value.dimensiones + '</td>';
                    event_data += '<td>' + value.equivalencia + '</td>';
                    event_data +=
                        "<td> <a class ='bseguimiento'><button class='btn btn-primary' type='button'><span class='fas fa-binoculars'></span></button></a> </td>";
                    event_data += '</tr>';
                });
                $("#tdetallerecipiente").append(event_data);              

               
            });
        }
    </script>
@stop
