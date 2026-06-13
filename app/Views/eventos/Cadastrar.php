<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Cadastrar Evento</h1>
    <a href="index.php" class="btn btn-secondary">Voltar</a>
</div>

<div class="card">
    <div class="card-header">
        <strong>Novo evento comunitário</strong>
    </div>
    <div class="card-body">
        <form action="index.php?acao=salvar" method="POST" id="formEvento">

            <div class="mb-3">
                <label for="titulo" class="form-label">Título do Evento</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição do Evento</label>
                <textarea name="descricao" id="descricao" class="form-control" rows="4" maxlength="500"
                    required></textarea>
                <small class="text-muted">
                    <span id="contadorDescricao">0</span> /500 caracteres
                </small>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="data_evento" class="form-label">Data do Evento</label>
                    <input type="date" name="data_evento" id="data_evento" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="horario" class="form-label">Horários</label>
                    <input type="time" name="horario" id="horario" class="form-control" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="local_evento" class="form-label">Local do Evento</label>
                <input type="text" name="local_evento" id="local_evento" class="form-control" required>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="uf" class="form-label">Estado</label>
                    <select id="uf" class="form-select" required>
                        <option value="">...estados...</option>
                    </select>
                </div>
                <div class="col-md-8 mb-3">
                    <label for="cidade" class="form-label">Cidade</label>
                    <select id="cidade" name="cidade" class="form-select" required disabled>
                        <option value="">Selecione um estado Primeiramente</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select name="categoria" id="categoria" class="form-select" required>
                    <option value="">Selecione uma categoria</option>
                    <option value="Evento Comunitário">Evento Comunitário</option>
                    <option value="Campanha Social">Campanha Social</option>
                    <option value="Evento Escolar">Evento Escolar</option>
                    <option value="Evento Religioso">Evento Religioso</option>
                    <option value="Palestra">Palestra</option>
                    <option value="Reunião">Reunião</option>
                    <option value="Outro">Outro</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="status_evento" class="form-label">Status</label>
                <select name="status_evento" id="status_evento" class="form-select" required>
                    <option value="Ativo">Ativo</option>
                    <option value="Encerrado">Encerrado</option>
                    <option value="Cancelado">Cancelado</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">
                Salvar Evento
            </button>
        </form>
    </div>
</div>