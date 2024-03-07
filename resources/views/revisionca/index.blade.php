@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Revisión de consumos altos</h1>
@stop

@section('content')

    <div class=" form-inline">
        <div class="form-group mb-2 mr-2  ">
            <label class="px-2">Ruta</label>
            <select class="form-control select2" id="lrutas" name="lrutas" onchange="mostrartablas()">
                <option value=''>Seleccione una ruta</option>
                @foreach ($revisionca as $mirevisionca)
                    <option value='{{ $mirevisionca->ruta }}'>{{ $mirevisionca->ruta }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <table id="tlistaderutas" class="table table-bordered table-hover" style="width:100%" >    <!-- class="table table-bordered table-hover" style="width:100%"-->
        <thead>
            <tr>                   
                <th>Id</th>
                <th>Codigo</th>
                <th>Cliente</th>
                <th>Dirección</th>
                <th># medidor</th>
                <th>Lectura anterior</th>
                <th>Consumo Anterior</th>
                <th>Lectura actual</th>
                <th>Consumo actual</th>
                <th>Promedio</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    




    <label>últimas revisiones</label>

     <table id="tseguimiento" class="table table-bordered table-hover" style="width:100%" >
        <thead>
            <tr>                
                <th>Id</th>
                <th>Codigo</th>
                <th>Cliente</th>
                <th>Dirección</th>
                <th>Estado</th>
                <th>Observaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table> 

    <div class="modal fade" id="mconsolidado">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Datos de la revisión</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-12">
                                <span class="help-block text-muted small-font"><strong>Id</strong></span>
                                <input id="mtid" class="form-control" disabled>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-12">
                                <span class="help-block text-muted small-font"><strong>Nombre</strong></span>
                                <input id="mtnombre" class="form-control" disabled>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-12">
                                <span class="help-block text-muted small-font"><strong>Dirección</strong></span>
                                <input id="mtdireccion" class="form-control" disabled>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 mb-12">
                                <span class="help-block text-muted small-font"><strong>Revisión</strong></span>
                                <select class="form-control select2" aria-label="Default select example" id="lrevision" onchange="accionrevision()">
                                    <option value="0">Ninguno</option>
                                    <option value="1">Aplica</option>
                                    <option value="2">No aplica</option>
                                </select>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 mb-12" id="mlfllecturareal">
                                <span class="help-block text-muted small-font"><strong>Lectura real</strong></span>
                                <input id="mtlecturar" class="form-control" type="number">
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 mb-12" id="mlflobservaciones">
                                <span class="help-block text-muted small-font"><strong>Observación</strong></span>
                                <textarea name="mtobservacion" id="mtobservacion" rows="5" class="form-control"
                                    placeholder="Escirbir una observación clara de lo encontrado"></textarea>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-info" id="bagregar" onclick="updateseguimiento()"><span
                            class="fa fa-edit"></span>Guardar</button>
                </div>

            </div>
        </div>
    </div>

  

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <!-- DataTables -->
     <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}"> 

@stop

@section('js')
    {{-- esto es para la tabla --}}
     {{-- <script src="https://code.jquery.com/jquery-3.7.1.js" type="text/Javascript"></script>  --}}

    <!-- DataTables  & Plugins -->
     <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script> 
    <!-- AdminLTE App -->


    <script src="{{ asset('js/sweetalert2@11.js') }}"></script> 
    <script type="text/javascript">
        function load() {
            // $('.select2').select2();
            //mostrarseguimiento();
            inicializartablarutas();
            inicializartablaseguimiento();
        }
        window.onload = load();

        function mostrartablas() {
            mostrarlistaderutas();
            mostrarseguimiento();
        }


        function mostrarlistaderutas() {
            // alert($("#lrutas").val());
            // $('#mconsolidado').modal('show');

            $.ajax({
                url: "{{ route('revisionca.mostrarlistaderutas') }}", ///mostrarlistaderutas
                method: 'get',
                data: {
                    ruta: $("#lrutas").val(),
                    opc: 0
                }
            }).done(function(res) {
                //console.log('leo el mejor');
                var informacion = JSON.parse(res);

                $('#tlistaderutas tbody').empty();
                $('#tlistaderutas').show(); // prueba
                $('#tlistaderutas').DataTable().clear(); //prueba
                $('#tlistaderutas').DataTable().destroy(); //prueba

                var event_data = '';
                $.each(informacion, function(index, value) {
                    event_data += '<tr>';                   
                    event_data += '<td>' + value.id + '</td>';                    
                    event_data += '<td>' + value.codigo + '</td>';
                    if(value.estado=='0'){
                        event_data += '<td>'+value.codigo+'|' + value.nombre +'|'+value.direccion+ '</td>';
                    }
                    if(value.estado=='1'){
                        event_data += '<td>' + value.nombre + ' <span class="fas fa-check-double"></span></td>';
                    }
                    if(value.estado=='2'){
                        event_data += '<td>' + value.nombre + ' <span class="fas fa-check"></span></td>';
                    }
                   
                    event_data += '<td>' + value.direccion + '</td>';
                    event_data += '<td>' + value.nmedidor + '</td>';
                    event_data += '<td>' + value.lecturaan + '</td>';
                    event_data += '<td>' + value.consumoan + '</td>';
                    event_data += '<td>' + value.lecturaac + '</td>';
                    event_data += '<td>' + value.consumoac + '</td>';
                    event_data += '<td>' + value.promedio + '</td>';
                    event_data += "<td> <a class ='bseleccionar'><button class='btn btn-primary' type='button'><span class='fas fa-binoculars'></span></button></a> </td>";
                    event_data += '</tr>';
                });
                $("#tlistaderutas").append(event_data);
                fn_dar_seleccionar();


                inicializartablarutas();

            });
        }

        function inicializartablarutas() {
            $('#tlistaderutas').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": false,
                "autoWidth": false,   
                "fixedHeader": true,             
                "responsive": true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/2.0.0/i18n/es-ES.json',
                },
                columnDefs: [
                    {
                        responsivePriority: 1,
                        targets: 2
                    },
                    {
                        responsivePriority: 1,
                        targets: 3
                    },
                    {
                        responsivePriority: 0,
                        targets: 10
                    },
                    // {                       
                    //     "targets": [ 0 ],
                    //     "visible": false,
                    //     "searchable": false
                    // },
                ]
            });
        }

        // funcion para capturar los metodos
        function fn_dar_seleccionar() {
            $("a.bseleccionar").click(function() {
                //$('#meliminarmovimiento').modal('show');
                $("#mtid").val($(this).parents("tr").find("td").eq(0).html());
                $.ajax({
                url: "{{ route('revisionca.mostrarlistaderutas') }}", ///actualizamos la ruta
                method: 'get',
                data: {
                    id: $("#mtid").val(),
                    opc: 2
                }
            }).done(function(res) {
                   var informacion = JSON.parse(res);
                   $("#mtnombre").val(informacion[0].nombre);
                   $("#mtdireccion").val(informacion[0].direccion);
                   $("#lrevision").val(informacion[0].estado);
                   $("#mtlecturar").val(informacion[0].lecturar);
                   document.getElementById("mtobservacion").value = informacion[0].observacion;                  
                    $('#mconsolidado').modal('show');               
            });



                /*$("#mtnombre").val($(this).parents("tr").find("td").eq(2).html());
                $("#mtdireccion").val($(this).parents("tr").find("td").eq(3).html());
                $("#lrevision").val('');
                document.getElementById("mtobservacion").value = '';
                $('#mconsolidado').modal('show');*/
            });

        };

        function updateseguimiento() {           
            $.ajax({
                url: "{{ route('revisionca.updateseguimiento') }}", ///actualizamos la ruta
                method: 'get',
                data: {
                    id: $("#mtid").val(),
                    estado: $("#lrevision").val(),
                    lecturar: $("#mtlecturar").val(),
                    observacion: document.getElementById("mtobservacion").value
                }
            }).done(function(res) {
                if (res.respuesta) {                    
                    mostrartablas();
                    $('#mconsolidado').modal('toggle');
                    mostrarmensaje('Correcto', res.mensaje);
                } else {
                    alert(res.mensaje);
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


        function mostrarseguimiento() {

            $.ajax({
                url: "{{ route('revisionca.mostrarlistaderutas') }}", ///mostrarlistaderutas
                method: 'get',
                data: {
                    ruta: $("#lrutas").val(),
                    opc: 1
                }
            }).done(function(res) {
                //alert(res);
                var informacion = JSON.parse(res);

                $('#tseguimiento tbody').empty();
                $('#tseguimiento').show(); // prueba
                $('#tseguimiento').DataTable().clear(); //prueba
                $('#tseguimiento').DataTable().destroy(); //prueba

                var event_data = '';
                $.each(informacion, function(index, value) {
                    event_data += '<tr>';                    
                    event_data += '<td>' + value.id + '</td>';
                    event_data += '<td>' + value.codigo + '</td>';
                    event_data += '<td>' + value.nombre +'</td>';
                    event_data += '<td>' + value.direccion + '</td>';
                    event_data += '<td>' + value.estado + '</td>';
                    event_data += '<td>' + value.observacion + '</td>';
                    event_data +="<td> <a class ='bseguimiento'><button class='btn btn-primary' type='button'><span class='fas fa-binoculars'></span></button></a> </td>";
                    event_data += '</tr>';
                });
                $("#tseguimiento").append(event_data);
                fn_dar_seguimiento();


                inicializartablaseguimiento();
            });
        }
        // funcion para capturar los metodos
        function fn_dar_seguimiento() {
            $("a.bseguimiento").click(function() {
                //$('#meliminarmovimiento').modal('show');
                $("#mtid").val($(this).parents("tr").find("td").eq(0).html());
                $.ajax({
                url: "{{ route('revisionca.mostrarlistaderutas') }}", ///actualizamos la ruta
                method: 'get',
                data: {
                    id: $("#mtid").val(),
                    opc: 2
                }
            }).done(function(res) {
                var informacion = JSON.parse(res);
                   $("#mtnombre").val(informacion[0].nombre);
                   $("#mtdireccion").val(informacion[0].direccion);
                   $("#lrevision").val(informacion[0].estado);
                   $("#mtlecturar").val(informacion[0].lecturar);
                   document.getElementById("mtobservacion").value = informacion[0].observacion;    
                    $('#mconsolidado').modal('show');               
            });
              /*  $("#mtnombre").val($(this).parents("tr").find("td").eq(2).html());
                $("#mtdireccion").val($(this).parents("tr").find("td").eq(3).html());
                if ($(this).parents("tr").find("td").eq(4).html() == 'Aplica') {
                    $("#lrevision").val('1');
                }
                if ($(this).parents("tr").find("td").eq(4).html() == 'No aplica') {
                    $("#lrevision").val('2');
                }
                document.getElementById("mtobservacion").value = $(this).parents("tr").find("td").eq(5).html();*/
               
            });

        };

        function inicializartablaseguimiento() {
            $('#tseguimiento').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": false,
                "autoWidth": false,   
                "fixedHeader": true,             
                "responsive": true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/2.0.0/i18n/es-ES.json',
                },
                columnDefs: [
                    {
                        responsivePriority: 1,
                        targets: 2
                    },
                    {
                        responsivePriority: 1,
                        targets: 3
                    },
                     {
                         responsivePriority: 0,
                         targets: 6
                     },
                    // {                       
                    //     "targets": [ 0 ],
                    //     "visible": false,
                    //     "searchable": false
                    // },
                ]
            });
        }

        // con este mostramos las acciones despues de darle en revision
        function accionrevision(){
          // console.log(  $("#lrevision").val());  
          if($("#lrevision").val()=='2'){
              $("#mtlecturar").val('0');
              document.getElementById('mtobservacion').value="No aplica";

              document.getElementById('mlfllecturareal').style.display='none';
              document.getElementById('mlflobservaciones').style.display='none';
          }else{
              $("#mtlecturar").val('');
              document.getElementById('mtobservacion').value="";

              document.getElementById('mlfllecturareal').style.display='';
              document.getElementById('mlflobservaciones').style.display='';
          }
        }
    </script>

    
@stop
