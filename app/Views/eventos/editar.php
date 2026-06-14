<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Editar Evento</h1>
    <a href="index.php" class="btn btn-secondary">Voltar</a>
</div>

<div class="card">
    <div class="card-header">
        <strong>Alterar dados do evento</strong>
    </div>

    <div class="card-body">
        <form action="index.php?acao=atualizar&id=<?= $evento['id'] ?>" method="POST" id="formEvento">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título do Evento</label>
                <input type="text" name="titulo" id="titulo" class="form-control"
                    value="<?= htmlspecialchars($evento['titulo']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição do Evento</label>
                <textarea name="descricao" id="descricao" class="form-control" rows="4" maxlength="500"
                    required><?= htmlspecialchars($evento['descricao'] ?? '') ?></textarea>
                <small class="text-muted">
                    <span id="contadorDescricao"><?= strlen($evento['descricao'] ?? '') ?></span> / 500 caracteres
                </small>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="data_evento" class="form-label">Data do Evento</label>
                    <input type="date" name="data_evento" id="data_evento" class="form-control"
                        value="<?= $evento['data_evento'] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="horario" class="form-label">Horário</label>
                    <input type="time" name="horario" id="horario" class="form-control"
                        value="<?= $evento['horario'] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="local_evento" class="form-label">Local do Evento</label>
                    <input type="text" name="local_evento" id="local_evento" class="form-control"
                        value="<?= htmlspecialchars($evento['local_evento']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input type="text" name="cidade" id="cidade" class="form-control"
                        value="<?= htmlspecialchars($evento['cidade']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoria</label>
                    <select name="categoria" id="categoria" class="form-select" required>
                        <option value="Evento Comunitário" <?= $evento['categoria'] == 'Evento Comunitário' ? 'selected' : '' ?>>Evento Comunitário</option>
                        <option value="Campanha Social" <?= $evento['categoria'] == 'Campanha Social' ? 'selected' : '' ?>>
                            Campanha Social</option>
                        <option value="Evento Escolar" <?= $evento['categoria'] == 'Evento Escolar' ? 'selected' : '' ?>>
                            Evento Escolar</option>
                        <option value="Evento Religioso" <?= $evento['categoria'] == 'Evento Religioso' ? 'selected' : '' ?>>Evento Religioso</option>
                        <option value="Palestra" <?= $evento['categoria'] == 'Palestra' ? 'selected' : '' ?>>Palestra
                        </option>
                        <option value="Reunião" <?= $evento['categoria'] == 'Reunião' ? 'selected' : '' ?>>Reunião</option>
                        <option value="Outro" <?= $evento['categoria'] == 'Outro' ? 'selected' : '' ?>>Outro</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="status_evento" class="form-label">Status</label>
                    <select name="status_evento" id="status_evento" class="form-select" required>
                        <option value="Ativo" <?= $evento['status_evento'] == 'Ativo' ? 'selected' : '' ?>>Ativo</option>
                        <option value="Encerrado" <?= $evento['status_evento'] == 'Encerrado' ? 'selected' : '' ?>>
                            Encerrado</option>
                        <option value="Cancelado" <?= $evento['status_evento'] == 'Cancelado' ? 'selected' : '' ?>>
                            Cancelado</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Atualizar Evento
                </button>

        </form>
    </div>
</div>