@extends('layouts.admin')

        @section('contenido')   
            <div class="row">

    <div class="colg-lg-8 col-md-8 col-xs-12">

        <h3>Listado de Productos <a href="{{url('escritorioalmacen/producto/create')}}" ><button class="btn btn-success">Nuevo</button></h3></a>
            {{-- @include('almacen.categoria.search') --}}
    </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="table responsive">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                                {{-- <th>Id</th> --}}
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Categoria</th>
                                <th>Precio</th>
                                <th>Marca</th>
                                <th>Imagenes</th>
                                <th>Opciones</th>


                            </thead>
                            @foreach($productos as $pro) <!--la variable que recibo del controlador la guardo en cat y la muestro-->
                                <tr>
                                    {{-- <td>{{$linea->id}}</td> --}}
                                    <td>{{$pro->codigo}}</td>
                                    <td>{{$pro->producto}}</td>

                                    {{-- @if ($pro->linea_id == $lineas->id)
                                    <td>{{$lineas->linea}}</td>
                                    @endif --}}

                                    <td>{{$pro->categoria}}</td>

                                    <td>{{$pro->precio_compra}}</td>
                                    <td>{{$pro->proveedor}}</td>

                                    <td>
                                        <img src="{{asset('img/productos/'.$pro->imagen)}}"  height="100px" width="100px" class="img-thumbnail">
                                    </td>
                                    <td>

                                       
                                      
                                        <form method="post" action="{{url('escritorioalmacen/producto/'.$pro->codigo) }}">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                            <a href="{{ url('escritorioalmacen/producto/edit/'.$pro->id)}}"><button type="button" title="Editar" class="btn btn-info">Editar</button></a>
                                            <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple" >Eliminar</button>
                                                               
                                        </form>
                                    


                                    </td>

                                </tr>
                                {{-- @include('almacen.categoria.modal') --}}
                            @endforeach


                        </table>


                    </div>
                    {{$productos->render()}}

                </div>

            </div>

</div>
        @endsection