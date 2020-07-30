@extends('adminlte::page')

@section('title','Editar dados da página')

@section('content_header')
<h1>Editar dados da página</h1>
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


<div class='card'>
    <div class='card-body'>

        <form action="{{ route('pages.update', [ 'page'=>$page->id ]) }}" method="post" class="form-horizontal">
            @csrf
            @method('PUT')

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Título:</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{$page->title}}"  class="form-control @error('title') is-invalid @enderror" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Corpo:</label>
                    <div class="col-sm-10">
                        <textarea name="body" class='form-control bodyfield'>{{$page->body}}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <input type="reset" value="Limpar X " class="btn btn-warning" />
                        <input type="submit" value="Editar -> " class="btn btn-success" />
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

