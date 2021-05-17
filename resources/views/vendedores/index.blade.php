@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                <div class="d-flex align-items-center justify-content-between mt-4">
                    <div>
                        <h3><i class="fas fa-users"></i> Vendedores</h3>
                    </div>
                    <div>
                        <div class="form-row align-items-center">
                            <div class="col-auto my-1">
                                <a class="btn btn-dark float-right" href={{ route('vendedores.criar') }}><i class="fas fa-plus"></i> Adicionar</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-dark text-center">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Status</th>
                                <th scope="col">Abertos</th>
                                <th scope="col">Em Andamento</th>
                                <th scope="col">Resolvidos</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendedores as $vendedor)
                                <tr>
                                    <th scope="row">{{ $vendedor->id }}</th>
                                    <td>{{ $vendedor->nome }}</td>
                                    <td>{{ $vendedor->email }}</td>
                                    <td>{{ $vendedor->telefone }}</td>
                                    @if ($vendedor->status == 1)
                                        <td>Ativo</td>
                                    @else
                                        <td>Inativo</td>
                                    @endif
                                    <td>{{ $vendedor->chamados_abertos }}</td>
                                    <td>{{ $vendedor->chamados_andamento }}</td>
                                    <td>{{ $vendedor->chamados_resolvidos }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-primary text-white mx-1" title="Editar" href="{{ route('vendedores.editar', [$vendedor->id]) }}"><i class="fas fa-pencil-alt"></i></a>
                                            <a class="btn btn-sm btn-danger text-white mx-1" title="Excluir" href="" onclick="return confirm(&quot;Deseja realmente excluir o vendedor {{ $vendedor->nome }} ?&quot;)"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
