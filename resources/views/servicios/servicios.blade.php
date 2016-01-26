@extends('layout')

@section('contenido')

            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Servicio de Mesas</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br/>
                                    <div class="col-md-12 col-sm-12 col-xs-6">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                    <td style="padding-right:5px;">
                                    <div class="swatch swatchDisponible">
                                    <br>
                                        Nombre Mesa
                                        <br>
                                        Total de venta
                                        <br>
                                        <br>
                                        <i class="fa fa-laptop"></i>
                                        <i class="fa fa-laptop"></i>
                                    </div>
                                    </td>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                    <td style="padding-right:5px;">
                                    <div class="swatch swatchOcupada">
                                    <br>
                                        Nombre Mesa
                                        <br>
                                        Total de venta
                                        <br>
                                        <br>
                                        <i class="fa fa-laptop"></i>
                                        <i class="fa fa-laptop"></i>
                                    </div>
                                    </td>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                    <td style="padding-right:5px;">
                                    <div class="swatch swatchNoAsignada">
                                    <br>
                                        Nombre Mesa
                                        <br>
                                        Total de venta
                                        <br>
                                        <br>
                                        <i class="fa fa-laptop"></i>
                                        <i class="fa fa-laptop"></i>
                                    </div>
                                    </td>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                    <td style="padding-right:5px;">
                                    <div class="swatch swatchDisponible">
                                    <br>
                                        Nombre Mesa
                                        <br>
                                        Total de venta
                                        <br>
                                        <br>
                                        <i class="fa fa-laptop"></i>
                                        <i class="fa fa-laptop"></i>
                                    </div>
                                    </td>
                                    </div>
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
<script type="text/javascript" src="{{URL::asset('js/InputFile.js')}}"></script>
@stop