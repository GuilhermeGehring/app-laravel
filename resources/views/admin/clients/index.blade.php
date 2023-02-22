@extends('adminlte::page')

@section('title', 'Listagem de Clientes')

@section('content_header')
    <h1>
        <a href="{{ route('client.create') }}" class="btn btn-success"><i class="nav-icon fa fa-plus"></i></a>
        Clientes
    </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
        <li class="breadcrumb-item active">Clientes</li>
    </ol>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-success">
                        <div class="box-body">

                            @include('admin.includes.alerts')

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <th scope="row">{{ $client->id }}</th>
                                        <td>{{ $client->name }}</td>
                                        <td>
                                            <a href="{{ route('client.edit', $client->id) }}" class="badge bg-yellow">
                                                Editar
                                            </a>
                                            <a href="{{ route('client.show', $client->id) }}" class="badge bg-primary">
                                                Detalhes
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            @if (isset($data))
                                {!! $clients->appends($data)->links() !!}
                            @else
                                {!! $clients->links() !!}
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <a href="{{ route('client.export.xlsx') }}" class="btn btn-success">Exportar Dados</a>
            </div>
        </div>
    </section>
@stop
