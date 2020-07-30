@extends('adminlte::page')

@section('title','Cadastro de usuário')

@section('content_header')
<h1>Cadastro de usuário</h1>
@endsection

@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <h4>Erros encontrados:</h4>
    <ul>
        @foreach($errors->all() AS $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>

@endif

<div class='card'>
    <div class='card-body'>
        <form action="{{route('users.store')}}" method="post" class="form-horizontal">
            @csrf
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Nome Completo:</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">E-mail:</label>
                    <div class="col-sm-8">
                        <input type="email" name="email" value="{{old('email')}}" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Senha:</label>
                    <div class="col-sm-8">
                        <input type="password" name="password" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Redigite sua senha:</label>
                    <div class="col-sm-8">
                        <input type="password" name="password_confirmation" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-8">
                        <input type="submit" value="Cadastrar" class="btn btn-success" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection