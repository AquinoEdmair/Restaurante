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
                                        <div class="col-md-3 col-sm-3 col-xs-12" id ="{{ $servicio->id }}">
                                            <td style="padding-right:5px;">
                                                @if($servicio->asignacion==0)
                                                    <div class="swatch swatchNoAsignada">
                                                @elseif($servicio->asignacion==1)
                                                    @if($servicio->estatusmesas_id==1)
                                                        <div class="swatch swatchDisponible">
                                                    @elseif($servicio->estatusmesas_id==2)
                                                        <div class="swatch swatchOcupada">
                                                    @endif   
                                                @endif
                                                    <br>
                                                        {{$servicio->nombre}}
                                                        <br>
                                                        @if($servicio->pedido)
                                                        $  {{$servicio->pedido->total}}
                                                        @else
                                                        $ 0.000
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <a href="nuevosPedidosmesa/{{ $servicio->id }}" data-toggle="modal" class="verNotificaciones" style="cursor:pointer"><span class="badge">@if($servicio->pedido) {{$servicio->pedido->detallespedidos->count()}} @endif</span><i class="fa fa-book"></i></a>                                                        
                                                        <a href="pedidosMesa/{{ $servicio->id }}" data-toggle="modal" class="verPedidos" style="cursor:pointer"><i class="fa fa-credit-card"></i></a>
                                                </div>
                                            </td>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="modal fade" id="myModalNotificaciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Nuevos Pedidos</h4>
                                          </div>
                                          <div class="modal-body" id="notificaciones_pedidos">


                                            

                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary arriba">Aceptar</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="modal fade" id="myModalPedidos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Pedidos</h4>
                                          </div>
                                          <div class="modal-body" id="pedidos_detalle">
                                            <table>
                                                <tr>
                                                    <td>Nombre:</td>
                                                    <td>Coca Cola</td>
                                                </tr>
                                                <tr>
                                                    <td>Cantidad:</td>
                                                    <td>5</td>
                                                </tr>
                                                <tr>
                                                    <td>Precio:</td>
                                                    <td>$10</td>
                                                </tr>
                                                <tr>
                                                    <td>Subtotal:</td>
                                                    <td>$50</td>
                                                </tr>
                                                <tr>
                                                    <td>Observaciones:</td>
                                                    <td>Que esten bien frias</td>
                                                </tr>
                                            </table>
                                            <br>
                                            <br>
                                             <table>
                                                <tr>
                                                    <td>Nombre:</td>
                                                    <td>Pepsi</td>
                                                </tr>
                                                <tr>
                                                    <td>Cantidad:</td>
                                                    <td>5</td>
                                                </tr>
                                                <tr>
                                                    <td>Precio:</td>
                                                    <td>$9.000</td>
                                                </tr>
                                                <tr>
                                                    <td>Subtotal:</td>
                                                    <td>$45.000</td>
                                                </tr>
                                                <tr>
                                                    <td>Observaciones:</td>
                                                    <td>Que no esten muy frias</td>
                                                </tr>
                                            </table>
                                            <br>
                                            <br>
                                                <h1>Total: </h1>
                                                <h2>$95.000</h1>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary">Cobrar</button>
                                          </div>
                                        </div>
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
<script type="text/javascript" src="{{URL::asset('js/Servicios.js')}}"></script>
<script type="text/javascript">
var ids_mesas = [
@foreach ($servicios as $servicio)
    [{{ $servicio->id }}],     
@endforeach
];


</script>
@stop