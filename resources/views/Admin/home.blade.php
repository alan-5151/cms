@extends('adminlte::page')
@section('plugins.Chartjs', true)
@section('title','Painel de controle')

@section('content_header')
<div class='row'>
    <div class='col-md-6'>
        <h1>Painel de Controle</h1>
    </div>

    <div class='col-md-6'>
        <form class='float-md-right' method="GET" name='form_periodo'>
            <label class='control-label'>Período: </label>
            <select name='periodo' onchange="this.form.submit()">
                <option value='30' selected="selected">Defina o período</option>
                <option value='30'>Últimos 30 dias</option>
                <option value='60'>Últimos 60 dias</option>
                <option value='90'>Últimos 90 dias</option>
                <option value='120'>Últimos 120 dias</option>
            </select>
            <noscript><input type="submit" value="Submit"></noscript>
        </form>
    </div>

</div>

@endsection

@section('content')

<div class="row">
    <div class="col-md-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$visitsCount}}</h3>
                <p>Acessos</p>
            </div>
            <div class="icon">
                <i class="far fa-fw fa-eye"></i>
            </div>
        </div>
    </div>



    <div class="col-md-3">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$onlineCount}}</h3>
                <p>Visitantes on-line</p>
            </div>
            <div class="icon">
                <i class="far fa-fw fa-heart"></i>
            </div>
        </div>
    </div>



    <div class="col-md-3">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$pageCount}}</h3>
                <p>Páginas</p>
            </div>
            <div class="icon">
                <i class="far fa-fw fa-sticky-note"></i>
            </div>
        </div>
    </div>



    <div class="col-md-3">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$userCount}}</h3>
                <p>Usuários</p>
            </div>
            <div class="icon">
                <i class="far fa-fw fa-user"></i>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>Páginas mais visitadas últimos {{$ultimosDias}} dias.</h3>
            </div>
            <div class="card-body">
                <canvas id='pagePie'></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>Sobre as páginas</h3>
            </div>
            <div class="card-body">
                ...
            </div>
        </div>
    </div>

</div>
<script>
    window.onload = function () {
    let ctx = document.getElementById('pagePie').getContext('2d');
    window.pagePie = new Chart(ctx, {
    type: 'pie',
            data: {
            datasets: [{
            data: {{$pageValues}},
                    backgroundColor: '#0000ff'
            }],
                    labels: {!! $pageLabels !!}
            },
            options: {
            responsive: true,
                    legend: {
                    display: false
                    }
            }

    });
    };
</script>

@endsection