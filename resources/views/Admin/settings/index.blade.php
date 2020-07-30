@extends('adminlte::page')
@section('title','Configurações')

@section('content_header')
<h1>Configurações</h1>
@endsection

@section('content')


@if($errors->any())
<div class="alert alert-danger">
    <h4><i  class="icon fas fa-ban"></i> - Erros encontrados:</h4>
    <ul>
        @foreach($errors->all() AS $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>

@endif

@if(session('warning'))
<div class="alert alert-success">
    {{ session('warning') }}
</div>

@endif


<div class='card'>
    <div class='card-body'>

        <form action="{{ route('settings.save') }}" method="post" class='form-horizontal'>
            @method('PUT')
            @csrf

            <div class="form-group row">
                <label class='col-sm-2 col-form-label'>Titulo do Site</label>
                <div class="col-sm-10">
                    <input type='text' name='title' value="{{$settings['title']}}" class='form-control' />
                </div>
            </div>
            
            <div class="form-group row">
                <label class='col-sm-2 col-form-label'>Subtitulo do Site</label>
                <div class="col-sm-10">
                    <input type='text' name='subtitle' value="{{$settings['subtitle']}}" class='form-control' />
                </div>
            </div>
            
            <div class="form-group row">
                <label class='col-sm-2 col-form-label'>Email de contato</label>
                <div class="col-sm-10">
                    <input type='email' name='email' value="{{$settings['email']}}" class='form-control' />
                </div>
            </div>
            
            <div class="form-group row">
                <label class='col-sm-2 col-form-label'>Cor de fundo</label>
                <div class="col-sm-1">
                    <input type='color' name='bgcolor' value="{{$settings['bgcolor']}}" class='form-control' />
                </div>
            </div>
            
            <div class="form-group row">
                <label class='col-sm-2 col-form-label'>Cor do texto</label>
                <div class="col-sm-1">
                    <input type='color' name='textcolor' value="{{$settings['textcolor']}}" class='form-control' />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <input type="reset" value="Limpar - x" class="btn btn-danger" />
                    <input type="submit" value="Salvar ->" class="btn btn-success" />
                </div>
            </div>
        </form>
    </div>




</div>

@endsection
