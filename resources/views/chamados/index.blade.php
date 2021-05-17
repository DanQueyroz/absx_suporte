@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @include('alerts')
                <div class="d-flex align-items-center justify-content-between mt-4">
                    <div>
                <h3><i class="fas fa-headset mr-1"></i> Chamados</h3>
            </div>
            <div>
                <div class="form-row align-items-center">
                <div class="col-auto my-1">
                    <a class="btn btn-dark float-right" href="{{ route('chamados.criar') }}"><i class="fas fa-plus mr-1"></i> Abrir chamado</a>
                </div>
                </div>
            </div>
        </div>
        
        <div class="table-responsive">
                <table class="table table-striped table-hover table-dark text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Data</th>
                            <th scope="col">Vendedor</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Assunto</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$chamados->count())
                            <tr>
                                <th colspan="8">
                                    <h2 class="my-4">Nenhum chamado aberto</h2>
                                </th>
                            </tr>
                        @endif
                        @foreach ($chamados as $chamado)
                            <tr>
                                <th scope="row">{{ $chamado->id }}</th>
                                <td>{{ date('d/m/Y', strtotime($chamado->data_do_chamado)) }}</td>
                                <td>{{ $chamado->user->nome }}</td>
                                <td>{{ $chamado->user->telefone }}</td>
                                <td>{{ $chamado->user->assunto }}</td>
                                <td>{{ $chamado->descricao }}</td>
                                <td>{{ $chamado->status }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn text-primary mx-1" data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('chamados.editar', [$chamado->id]) }}"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="{{ route('chamados.excluir', [$chamado->id]) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn text-danger mx-1" data-toggle="tooltip" data-placement="top" title="Excluir" href="" onclick="return confirm(&quot;Deseja realmente excluir o chamado Nº {{ $chamado->id }} ?&quot;)"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection 