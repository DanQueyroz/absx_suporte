<div class="form-row mt-4">
    <div class="form-group col-md-8">
        <label class="form-label">Assunto</label>
        <input type="text" name="assunto" maxlength="50" value="{{ $chamado->assunto }}" class="form-control @error('assunto') is-invalid @enderror" required>
        @error('assunto')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-md-4">
      <label>Data</label>
      <input type="date" name="data" value="{{ $chamado->data_do_chamado }}" class="form-control @error('data') is-invalid @enderror">
      @error('data')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
</div>

<div class="form-row mt-4">
    <div class="form-group col-md-8">
        <label>Descrição</label>
        <input class="form-control rounded-0 @error('descricao') is-invalid @enderror" maxlength="150" name="descricao" value="{{ $chamado->descricao }}" rows="3" required>
        @error('descricao')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-md-4">
        <label>Status</label>
        <select class="form-control @error('status') is-invalid @enderror" name="status" required>
            <option selected value="{{ $chamado->status ?? 'Aberto' }}">{{ $chamado->status ?? 'Aberto'}}</option>
            <option value="Aberto">Aberto</option>
            <option value="Em Andamento">Em andamento</option>
            <option value="Atrasado">Atrasado</option>
            <option value="Resolvido">Resolvido</option>
        </select>
        @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
