@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Vulnerabilidad</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-sm btn-default" href="{{ route('vulnerabilidades.index') }}"><span class="fa fa-chevron-circle-left" aria-hidden="true"></span> Volver</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> Hubo un problema con los datos ingresados.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form class="form-horizontal" action="{{ route('vulnerabilidades.update',$vulnerabilidad->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titulo" class="col-lg-2 col-lg-offset-2" control-label">Nombre</label>
            <div class="col-lg-6">
                <input type="text" id="titulo" name="titulo" class="form-control" value="{{ $vulnerabilidad->titulo }}"placeholder="Nombre">
            </div>
        </div>
        <div class="form-group">
            <label for="criticidad" class="col-lg-2 col-lg-offset-2" control-label">Criticidad</label>
            <div class="col-lg-6">
                <select name="criticidad_id" id="criticidad">
                    @foreach ($criticidades as $criticidad)
                        <option value="{{ $criticidad->id }}"
                        @if ($criticidad->id == $vulnerabilidad->criticidad_id)
                            selected
                        @endif
                        >{{$criticidad->texto}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="descripcion" class="col-lg-2 col-lg-offset-2" control-label">Descripcion</label>
            <div class="col-lg-6">
                <textarea class="form-control" style="height:120px" name="descripcion" id="descripcion" placeholder="Descripcion">{{ $vulnerabilidad->descripcion }}</textarea>
            </div>
        </div>            
        <div class="form-group">
            <label for="remediacion" class="col-lg-2 col-lg-offset-2" control-label">Remediacion</label>
            <div class="col-lg-6">
                <textarea class="form-control" style="height:120px" name="remediacion" id="remediacion" placeholder="Remediacion">{{ $vulnerabilidad->remediacion }}</textarea>
            </div>
        </div>            
        <div class="form-group">
            <label for="referencias" class="col-lg-2 col-lg-offset-2" control-label">Referencias</label>
            <div class="col-lg-6">
                <textarea class="form-control" style="height:50px" name="referencias" id="referencias" placeholder="Referencias">{{ $vulnerabilidad->referencias }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-sm btn-success"><span class="fa fa-plus" aria-hidden="true"></span>Editar</button>
            </div>
        </div>
    </form>

@endsection