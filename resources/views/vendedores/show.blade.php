@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 mt-4">

                <div class="card mt-5">
                    <div class="card-header">
                        <h3><i class="fas fa-user"></i> Editar</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            
                            @include('vendedores._form')

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
