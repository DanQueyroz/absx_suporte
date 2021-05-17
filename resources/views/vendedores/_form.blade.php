<div class="mb-2">
    <label class="form-label">Nome</label>
    <input type="text" name="nome" max="50" value="{{ $vendedor->nome }}" class="form-control @error('nome') is-invalid @enderror" required>
    @error('nome')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="mb-2">
    <label for="exampleInputEmail1" class="form-label">E-mail</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" max="50" value="{{ $vendedor->email }}" id="exampleInputEmail1"
aria-describedby="emailHelp" required>
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-row mb-2">
    <div class="form-group col-md-7">
        <label>Telefone</label>
        <input type="text" max="20" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ $vendedor->telefone }}" required>
        @error('telefone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-md-5">
        <label>Status</label>
        <select class="form-control @error('nome') is-invalid @enderror" name="status" required>
            @if ($vendedor->status == 1)
                <option selected value="1">Ativo</option>
                <option value="0">Inativo</option>
            @elseif($vendedor->status == 0)
                <option selected value="0">Inativo</option>
                <option value="1">Ativo</option>
            @endif
        </select>
        @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="mt-3 mb-2 border-bottom pb-2">
    <span class="font-wheit-bold">Quantidade de Chamados</span>
</div>
<div class="form-row mb-1 border-bottom">
    <div class="form-group col-md-4">
        <label>Em Aberto</label>
        <input type="text" class="form-control @error('em_aberto') is-invalid @enderror" name="em_aberto" min="0" value="{{ $vendedor->chamados_abertos ?? 0}}" required>
        @error('em_aberto')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-md-4">
        <label>Em Andamento</label>
        <input type="text" class="form-control @error('em_andamento') is-invalid @enderror" name="em_andamento" name="em_andamento" value="{{ $vendedor->chamados_andamento  ?? 0}}" required>
        @error('em_andamento')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-md-4">
        <label>Resolvidos</label>
        <input type="text" class="form-control @error('resolvidos') is-invalid @enderror" name="resolvidos" value="{{ $vendedor->chamados_resolvidos ?? 0 }}" required>
        @error('resolvidos')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
