@extends('layouts.admin')
@section('contenido')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

            <h3>Editar Categoria:{{$linea ->linea}}</h3>

                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)

                        <li>{{$error}}</li>

                        @endforeach
                    </ul>

                </div>
                @endif
        </div>
   </div>
                {{-- {!!Form::model($articulo,['method'=>'PATCH','route'=>['articulo.update',$articulo->idarticulo],'files'=>'true'])!!}
                {{Form::token()}} --}}

                <form action="{{url('escritorioalmacen/categoria/edit/'.$linea->id) }}" method="post" >
                    {{ csrf_field() }}

 <div class="row">

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="linea" class="">Nombre</label>
                <input type="text" name="linea" required value="{{$linea->linea}}" class="form-control " >
            </div>
        </div>

        


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="icono" class="">Icono</label>
                <input type="text" name="icono" required value="{{old('icono',$linea->icono)}}" class="form-control ">

            </div>
        </div>


        {{-- <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                    <label for="precio_compra" class="">Precio</label>
                    <input type="text" name="precio_compra" required value="{{$producto->precio_compra}}" class="form-control " >
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                    <label for="proveedor" class="">Proveedor</label>
                    <input type="text" name="proveedor" required value="{{$producto->proveedor}}" class="form-control " >
            </div>
        </div>



        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                    <label for="descripcion" class="">Descripcion</label>
                    <input type="text" name="descripcion" value="{{$producto->descripcion}}" class="form-control "placeholder="Descripcion del articulo..." >
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                    <label for="descripcion" class="">Imagen</label>
                    <input type="file" name="imagen" class="form-control " >
                    @if(($producto->imagen)!=="")
                        <img src="{{asset('img/productos/'.$producto->imagen)}} " heigth="200px" width="200px" >
                    @endif
            </div>
        </div>


        </div> --}}

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            
            <button type="submit" class="btn btn-primary">Guardar</button>
            
            <button type="reset" class="btn btn-danger">Cancelar</button>
            
            
        </div>
    </div>    
</form>

                {{-- {!!Form::close()!!} --}}



@endsection