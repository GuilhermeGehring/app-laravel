@extends('adminlte::page')

@section('title', "Detalhes do cliente {$client->name}")

@section('content_header')
    <h1>
        Cliente: {{ $client->name }}
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Cliente</a></li>
        <li class="breadcrumb-item active">Detalhes</li>
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
                                <p><strong>ID: </strong>{{ $client->id }}</p>
                                <p><strong>Nome: </strong>{{ $client->name }}</p>
                                <p><strong>E-mail: </strong>{{ $client->email }}</p>
                                <p><strong>Telefone: </strong>{{ $client->phone }}</p>
                                <p><strong>Endereço: </strong>{{ $client->address }}</p>
                                <div class="callout callout-info col-md-12">
                                    <p><strong>Observação: </strong>{{ $client->obs }}</p>
                                </div>

                                <hr>

                                <form action="{{ route('client.destroy', $client->id) }}" class="form" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Deletar</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
