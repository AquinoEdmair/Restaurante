@extends('layout')

@section('contenido')

            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Lista de Mesas</h2>
                                    <div class="clearfix"></div>
                                    <a href="{{URL::to('mesas/create')}}" class="btn btn-primary">Nueva Mesa</a>
                                </div>
                                <div class="x_content">
                                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
                                                <th>Nombre </th>
                                                <th>Estado Mesa </th>
                                                <th class=" no-link last"><span class="nobr">Acciones</span>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($mesas as $mesa)
                                                <tr class="even pointer"> 
                                                    <td class=" ">{{$mesa->nombre}}</td>
                                                    <td class=" ">{{$mesa->estatusmesas_id}}</td>
                                                    <td class=" last"><a href="{{ URL::to('mesas/' . $mesa->id . '/edit') }}" class="btn btn-success">Editar</a>
                                                    <a href="{{ URL::to('mesas/' . $mesa->id . '/delete') }}" class="btn btn-danger">Eliminar</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                        <br />
                        <br />
                        <br />

                    </div>
                </div>
                    
                </div>
                <!-- /page content -->

@stop

@section('scripts')

        <!-- Datatables -->
        <script type="text/javascript" src="{{URL::asset('js/datatables/js/jquery.dataTables.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/datatables/tools/js/dataTables.tableTools.js')}}"></script>

        <script>
            $(document).ready(function () {
                $('input.tableflat').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
            });

            var asInitVals = new Array();
            $(document).ready(function () {
                var oTable = $('#example').dataTable({
                    "oLanguage": {
                        "sSearch": "Search all columns:"
                    },
                    "aoColumnDefs": [
                        {
                            'bSortable': false,
                            'aTargets': [0]
                        } //disables sorting for column one
            ],
                    'iDisplayLength': 10,
                    "sPaginationType": "full_numbers",
                });
                $("tfoot input").keyup(function () {
                    /* Filter on the column based on the index of this element's parent <th> */
                    oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
                });
                $("tfoot input").each(function (i) {
                    asInitVals[i] = this.value;
                });
                $("tfoot input").focus(function () {
                    if (this.className == "search_init") {
                        this.className = "";
                        this.value = "";
                    }
                });
                $("tfoot input").blur(function (i) {
                    if (this.value == "") {
                        this.className = "search_init";
                        this.value = asInitVals[$("tfoot input").index(this)];
                    }
                });
            });
        </script>

@stop
