@extends('adminlte::page')

@section('title','Páginas')

@section('content_header')
<h1>
    Minhas páginas <a href="{{route('pages.create')}}" class='btn btn-sm btn-success'>+ Nova página </a>
</h1>
@endsection

@section('content')
<div class="card">
    <div class='card-body'>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th  width="50">ID</th>
                    <th>Título</th>
                    <th  width="250">Ações</th>
                </tr> 
            </thead>
            <tbody>
                @foreach($pages AS $page)
                <tr>
                    <td>{{$page->id}}</td>
                    <td>{{$page->title}}</td>
                    <td>
                        <a href="{{ route('pages.edit', ['page' => $page->id] )}}" class='btn btn-sm btn-info'>Editar</a>
                        <a href="#" target="_blank"class='btn btn-sm btn-success'>Ver -></a>

                        <form class='d-inline' action="{{ route('pages.destroy', ['page' => $page->id]) }}" method="post"  onsubmit="return confirm('Tem certeza que deseja excluir?')">
                            @csrf
                            @method('DELETE')
                            <button class='btn btn-sm btn-danger'> Excluir - X</button>
                        </form>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{ $pages->links() }}
@endsection
