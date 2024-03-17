@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Actualizar cliente</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            {!! Form::open(['route' => 'aforo.cliente.update']) !!}
            <div class="form-row">

                <div class="form-group col-lg-4 col-md-12 col-sm-12 mb-12">
                    {!! Form::label('name', 'Codigo usuario') !!}
                    {!! Form::text('codigousuario', null, ["id"=>'codigousuario',
                        'class' => 'form-control',
                        'placeholder' => 'Ingrese el codigo de la instalación',
                        'required','onchange'=>'mostrarusuariosxcodigo()'
                    ]) !!}

                    @error('codigousuario')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-lg-4 col-md-12 col-sm-12 mb-12">
                    {!! Form::label('name', 'Nombre del usuario', [ 'onclick'=>'mbuscarcliente()']) !!}
                    {!! Form::text('nombre', null, ["id"=>'nombre',
                        'class' => 'form-control',
                        'placeholder' => 'Ingrese el nombre del usuario',
                        'required',
                    ]) !!}

                    @error('nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>



                <div class="form-group col-lg-2 col-md-12 col-sm-12 mb-12">
                    {!! Form::label('tipoaforo', 'Tipo de aforo') !!}
                    {!! Form::select('tipoaforo', ["id"=>'tipoaforo','1' => 'Gran generador'], null, ['class' => 'form-control']) !!}
                    @error('tipoaforo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group col-lg-2 col-md-12 col-sm-12 mb-12">
                    {!! Form::label('tiporesiduos', 'Tipo de residuos') !!}
                    {!! Form::select('tiporesiduos', ["id"=>'tiporesiduos','1' => 'Ordinario', '2' => 'Organico'], null, ['class' => 'form-control']) !!}
                    @error('tiporesiduos')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>



                <div class="form-group col-lg-2 col-md-12 col-sm-12 mb-12">
                    {!! Form::label('name', 'Dirección') !!}
                    {!! Form::text('direccion', null, ["id"=>'direccion',
                        'class' => 'form-control',
                        'placeholder' => 'Ingrese la dirección',
                        'required',
                    ]) !!}

                    @error('direccion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-lg-2 col-md-12 col-sm-12 mb-12">
                    {!! Form::label('name', 'Telefono') !!}
                    {!! Form::number('telefono', null, ["id"=>'telefono',
                        'class' => 'form-control',
                        'placeholder' => 'Ingrese el telefono',
                        'required',
                    ]) !!}

                    @error('telefono')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-lg-2 col-md-12 col-sm-12 mb-12">
                    {!! Form::label('name', 'Correo') !!}
                    {!! Form::text('correo', null, ["id"=>'correo','class' => 'form-control', 'placeholder' => 'Ingrese el correo', 'required']) !!}

                    @error('correo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-lg-2 col-md-12 col-sm-12 mb-12">
                    {!! Form::label('category_id', 'Categoria') !!}
                    {!! Form::select('category_id', $categories, null, ['id'=>'category_id','class' => 'form-control']) !!}
                    @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group col-lg-4 col-md-12 col-sm-12 mb-12">
                    {!! Form::label('name', 'Nombre del usuario o representante') !!}
                    {!! Form::text('nombrerl', null, ['id'=>'nombrerl',
                        'class' => 'form-control',
                        'placeholder' => 'Ingrese el nombre del usuario o representante',
                        'required',
                    ]) !!}

                    @error('nombrerl')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-lg-2 col-md-12 col-sm-12 mb-12">
                    {!! Form::label('actividade_id', 'Actividad económica') !!}
                    {!! Form::select('actividade_id', $actividades, null, ['id'=>'actividade_id','class' => 'form-control']) !!}
                    @error('actividade_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group col-lg-2 col-md-12 col-sm-12 mb-12">
                    {!! Form::label('ruta_id', 'Ruta') !!}
                    {!! Form::select('ruta_id', $rutas, null, ['id'=>'ruta_id','class' => 'form-control']) !!}
                    @error('ruta_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>


            {!! Form::submit('Actualizar cliente', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

        </div>
    </div>


    <div class="modal fade" id="mbuscarcliente">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Buscar cliente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  
                    <div class="form-horizontal">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-12">
                                <span class="help-block text-muted small-font"><strong>Nombre</strong></span>
                                <input id="mtnombrec" class="form-control" onchange="mostrarusuariosxbusqueda()">
                            </div>
                        </div>
                    </div>

                    <table id="mtbuscarcliente" class="table table-striped">
                        <thead>
                            <tr>  
                                <th></th>              
                                <th>Id</th>
                                <th>Codigo usuario</th>
                                <th>Cliente</th>  
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table> 

                </div>
                <!-- Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>                   
                </div>

            </div>
        </div>
    </div>


@stop

@section('css')

@stop

@section('js')

    <script type="text/javascript">
        function mostrarusuariosxcodigo() {  
            $.ajax({
                url: "{{ route('aforo.cliente.mostrarlistadeclientes') }}", ///mostrarlistaderutas
                method: 'get',
                data: {
                    codigousuario: $("#codigousuario").val(),
                    opc: 0
                }
            }).done(function(res) {               
                var informacion = JSON.parse(res);
                $("#nombre").val(informacion[0].nombre);
                $("#tipoaforo").val(informacion[0].tipoaforo);
                $("#tiporesiduos").val(informacion[0].tiporesiduos);
                $("#direccion").val(informacion[0].direccion);
                $("#telefono").val(informacion[0].telefono);
                $("#correo").val(informacion[0].correo);
                $("#category_id").val(informacion[0].category_id);
                $("#nombrerl").val(informacion[0].nombrerl);
                $("#actividade_id").val(informacion[0].actividade_id);
                $("#ruta_id").val(informacion[0].ruta_id);              

            });
        }

        function mbuscarcliente(){           
            $('#mbuscarcliente').modal('show');   
        }

        function mostrarusuariosxbusqueda() { 
            $.ajax({
                url: "{{ route('aforo.cliente.mostrarlistadeclientes') }}", ///mostrarlistaderutas
                method: 'get',
                data: {
                    nombre: $("#mtnombrec").val(),
                    opc: 1
                }
            }).done(function(res) {  
                var informacion = JSON.parse(res);
                $('#mtbuscarcliente tbody').empty();               

                var event_data = '';
                $.each(informacion, function(index, value) {
                    event_data += '<tr>';     
                    event_data += "<td> <a class ='bseleccionar'><button class='btn btn-primary' type='button'><span class='fas fa-binoculars'></span></button></a> </td>";              
                    event_data += '<td>' + value.id + '</td>';                    
                    event_data += '<td>' + value.codigousuario + '</td>';  
                    event_data += '<td>' + value.nombre + '</td>';                   
                    event_data += '</tr>';
                });
                $("#mtbuscarcliente").append(event_data);
                fn_dar_seleccionar();               

            });
        }

        // funcion para capturar los metodos
        function fn_dar_seleccionar() {
            $("a.bseleccionar").click(function() {  
                $("#codigousuario").val($(this).parents("tr").find("td").eq(2).html());
                $('#mbuscarcliente').modal('toggle');
                mostrarusuariosxcodigo();
            });
        };

    </script>

@stop
