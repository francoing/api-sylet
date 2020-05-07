@extends('layouts.admin')

        @section('contenido')   
            <div class="row">

    <div class="colg-lg-8 col-md-8 col-xs-12">

        <h3>Listado de Pedidos <a href="{{url('pedidos/export/ordenesdetallesorden/')}}" ><button class="btn btn-success">Enviar Pedidos</button></h3></a>
            {{-- @include('almacen.categoria.search') --}}
    </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="table responsive">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                                {{-- <th>Id</th> --}}
                                <th>Id Pedido</th>
                                <th>Usuario</th>
                                <th>Fecha</th>
                                <th>Opciones</th>
                                {{-- <th>Imagenes</th>
                                <th>Opciones</th> --}}


                            </thead>
                            @foreach($ordenes as $ord) <!--la variable que recibo del controlador la guardo en cat y la muestro-->
                                <tr>
                                    <td>{{$ord->id}}</td>
                                    <td>{{$ord->usuario}}</td>
                                    <td>{{$ord->creado_en}}</td>
                                     
                                    <td><a href="{{ url('escritorioalmacen/pedido/edit/'.$ord->id)}}"><button type="button" title="Editar" class="btn btn-info">Ver</button></a>
                                        
                                    </td>

                                </tr>
                                {{-- @include('almacen.categoria.modal') --}}
                            @endforeach


                        </table>


                    </div>
                    {{$ordenes->render()}}

                </div>

            </div>

</div>
        @endsection