@extends('adminlte::page')

@section('title', 'Cadastrar Novo Cliente')

@section('content_header')
    <h1>
        Cadastrar Cliente
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Cliente</a></li>
        <li class="breadcrumb-item active">Cadastrar</li>
    </ol>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="content row">
                        <div class="box box-success">
                            <div class="box-body">

                                @include('admin.includes.alerts')

                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Cadastrar</h3>
                                    </div>

                                    <form action="{{ route('client.store') }}" class="form" method="POST">
                                        <div class="card-body">
                                            @include('admin.clients._partials.form')
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
