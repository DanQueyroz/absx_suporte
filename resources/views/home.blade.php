@extends('layouts.dashboard')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <div class="d-flex align-items-center justify-content-between mt-4 shado py-2">
          <div>
            <h3><i class="fas fa-headset"></i> Chamados</h3>
          </div>
          <div>
            <div class="form-row align-items-center">
              <div class="col-auto my-1">
                <button class="btn btn-dark float-right"><i class="fas fa-plus"></i> Abrir chamado</button>
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
                      <th scope="col">Assunto</th>
                      <th scope="col">Descrição</th>
                      <th scope="col">Status</th>
                      <th scope="col">Ações</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <th scope="row">1</th>
                      <td>fdsfsdfg</td>
                      <td>sgafddddddd</td>
                      <td>gsgsdgasg</td>
                      <td>gsdgasgasdg</td>
                      <td>dfasfsdagsd</td>
                      <td>
                        <div class="btn-group">
                          <a class="btn btn-sm btn-primary text-white mx-1" title="Editar" href=""><i class="fas fa-pencil-alt"></i></a>
                          <a class="btn btn-sm btn-danger text-white mx-1" title="Excluir" href=""><i class="fas fa-trash-alt"></i></a>
                        </div>
                      </td>
                  </tr>
              </tbody>
          </table>
      </div>
    </div>
  </div>
@endsection