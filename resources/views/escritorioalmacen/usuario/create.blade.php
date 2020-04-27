@extends('layouts.admin')
@section('contenido')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

            <h3>Nueva Categoria</h3>

                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)

                        <li>{{$error}}</li>

                        @endforeach
                    </ul>

                </div>
                @endif

                {{-- {!!Form::open(array('url'=>'','method'=>'POST','autocomplete'=>'off')) !!}
                {{Form::token()}} --}}
                
                <form action="{{url('escritorioalmacen/usuario/')}}" method="post">
                    {{csrf_field() }}

                    <div class="form-group">
                        <label for="correo" class="">Correo</label>
                        <input type="text" name="correo" class="form-control " placeholder="Correo..." value="{{old('correo') }}">
                    </div>
                    <div class="form-group">
                        <label for="contrasena" class="">Contraseña</label>
                        <input type="text" name="contrasena" class="form-control " placeholder="Contraseña..." value="{{old('contrasena') }}">
                    </div>

                    <div class="form-group">
                        
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        
                        <button type="reset" class="btn btn-danger">Cancelar</button>
                        
                        
                    </div>


                </form>
                {{-- {!!Form::close()!!} --}}

        </div>
    
    </div>


@endsection