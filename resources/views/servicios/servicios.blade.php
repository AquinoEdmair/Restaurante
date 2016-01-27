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
                                    <div class="col-md-12 col-sm-12 col-xs-6" >

                                        @foreach($servicios as $servicio)
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <td style="padding-right:5px;">
                                                @if($servicio->asignacion==0)
                                                    <div class="swatch swatchNoAsignada">
                                                @else if($servicio->asignacion==1)
                                                    @if($servicio->estatusmesas_id==1)
                                                        <div class="swatch swatchDisponible">
                                                    @else if($servicio->estatusmesas_id==2)
                                                        <div class="swatch swatchOcupada">
                                                    @endif
                                                @endif
                                                    <br>
                                                        {{$servicio->nombre}}
                                                        <br>
                                                        Total de venta
                                                        <br>
                                                        <br>
                                                        <i class="fa fa-laptop"></i>
                                                        <i class="fa fa-laptop"></i>
                                                </div>
                                            </td>
                                        </div>
                                        @endforeach
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