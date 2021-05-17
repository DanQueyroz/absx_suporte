@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 mt-4">

                @include('alerts')

                <div class="card mt-5">
                    <div class="card-header">
                        <h3><i class="fas fa-headset"></i> Editar</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('chamados.atualizar', [$chamado->id]) }}" method="post">
                            @method('PUT')
                            @csrf
                            @include('chamados._form')
                            
                            <div class="form-row mt-3 border-top">
                                <div class="form-group col-md-8">
                                    <label>Vendedor</label>
                                    <input type="text" class="form-control" value="{{ $chamado->user->nome }}" readonly>
                                </div>
                            </div>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-dark w-100"><i class="fas fa-sync-alt mr-1"></i>
                                    Atualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
