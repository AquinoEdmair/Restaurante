@extends('layout')

@section('contenido')

            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Nuevo Producto</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    {{ Form::open(array('url' => 'productos/'.$producto->id, 'class' => 'form-horizontal form-label-left', 'files' => true, 'method'=>'put')) }}
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="nombre" value="{{$producto->nombre}}" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="detalles">Detalles
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea class="form-control" name="detalles" rows="3">{{$producto->detalles}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="precio">Precio <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="precio" value="{{$producto->precio}}" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="categoria">Categoría <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="categoria" class="form-control">
                                                    @foreach($categorias as $categoria)
                                                      @if ($categoria->id==$producto->categorias_id)
                                                        <option value="{{$categoria->id}}" selected>{{$categoria->nombre}}</option>
                                                      @else
                                                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                                      @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="imagenactual">Imagen Actual
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <img src='{{asset($producto->imagen_principal)}}' class="thumb" height="100" width="100" alt="a picture">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="imagen">Imagen <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="file" name="imagen" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit" class="btn btn-success">Agregar Producto</button>
                                            </div>
                                        </div>
                                    {{Form::close()}}
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
