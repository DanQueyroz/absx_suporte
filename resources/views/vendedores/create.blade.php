@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 mt-4">

                <div class="card mt-5">
                    <div class="card-header">
                        <h3><i class="fas fa-user"></i> Adicionar</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('vendedores.adicionar') }}" method="post">
                            
                            @include('vendedores._form')

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-lg btn-dark w-100"><i class="fas fa-save mr-1"></i>
                                    Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
