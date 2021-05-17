<div class="mb-2">
    <label class="form-label">Nome</label>
    <input type="text" name="nome" value="{{ $vendedor->nome }}" class="form-control">
</div>
<div class="mb-2">
    <label for="exampleInputEmail1" class="form-label">E-mail</label>
    <input type="email" class="form-control" name="email" value="{{ $vendedor->email }}" id="exampleInputEmail1"
        aria-describedby="emailHelp">
</div>
<div class="form-row mb-2">
    <div class="form-group col-md-7">
        <label>Telefone</label>
        <input type="text" max="20" class="form-control" name="telefone" value="{{ $vendedor->telefone }}">
    </div>
    <div class="form-group col-md-5">
        <label>Status</label>
        <select class="form-control" name="status">
            @if ($vendedor->status == 1)
                <option selected value="1">Ativo</option>
                <option value="0">Inativo</option>
            @elseif($vendedor->status == 0)
                <option selected value="0">Inativo</option>
                <option value="0">Ativo</option>
            @endif

        </select>
    </div>
</div>
<div class="mt-3 mb-2 border-bottom pb-2">
    <span class="font-wheit-bold">Quantidade de Chamados</span>
</div>
<div class="form-row mb-1 border-bottom">
    <div class="form-group col-md-4">
        <label>Em Aberto</label>
        <input type="text" class="form-control" name="em_aberto" value="{{ $vendedor->chamados_abertos ?? 0}}">
    </div>
    <div class="form-group col-md-4">
        <label>Em Andamento</label>
        <input type="text" class="form-control" name="em_andamento" value="{{ $vendedor->chamados_andamento ?? 0}}">
    </div>
    <div class="form-group col-md-4">
        <label>Resolvidos</label>
        <input type="text" class="form-control" name="resolvidos" value="{{ $vendedor->chamados_resolvidos ?? 0}}">
    </div>
</div>
