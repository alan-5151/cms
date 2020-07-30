@extends('adminlte::page')
@section('title','Cadastro de páginas')

@section('content_header')
<h1>Cadastro de páginas</h1>
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
        <form action="{{route('pages.store')}}" method="post" class="form-horizontal">
            @csrf
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Título:</label>
                    <div class="col-sm-8">
                        <input type="text" name="title" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Corpo:</label>
                    <div class="col-sm-8">
                        <textarea name="body" class='form-control bodyfield'>{{old('body')}}</textarea>
                                           </div>
                </div>
            </div>

                       <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-8">
                        <input type="submit" value="Criar -->" class="btn btn-success" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>

<script>

tinymce.init({
height: 300,
        menubar: false,
        branding: false,
        selector: 'textarea.bodyfield',
        plugins: ['link', 'image code', 'table', 'autoresize', 'lists'],
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | image code | table | link | bullist numlist',
        content_css: [ '{{ asset('assets / css / content.css') }}' ],
        images_upload_url: '{{ route('imageupload') }}',
        file_picker_types: 'file image media',
        images_upload_credentiasl: true,
        convert_urls: false
        });

</script>

@endsection