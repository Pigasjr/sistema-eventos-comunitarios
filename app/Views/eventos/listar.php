<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Eventos Comunitários</h1>
    <a href="index.php?acao=cadastrar" class="btn btn-success">Cadastrar Evento</a>
</div>
<div class="card">
    <div class="card-header">
        <strong>Lista de Eventos Cadastrados</strong>
    </div>

    <div class="card-body">
        <?php if (empty($eventos)): ?>
            <div class="alert alert-warning">
                Nenhum evento cadastrado no momento.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Data</th>
                            <th>Horário</th>
                            <th>Cidade</th>
                            <th>Categoria</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($eventos as $evento): ?>
                            <tr>
                                <td><?= htmlspecialchars($evento['titulo']) ?></td>
                                <td><?= date('d/m/Y', strtotime($evento['data_evento'])) ?></td>
                                <td><?= substr($evento['horario'], 0, 5) ?></td>
                                <td><?= htmlspecialchars($evento['cidade']) ?></td>
                                <td><?= htmlspecialchars($evento['categoria']) ?></td>
                                <td>
                                    <span class="badge bg-primary">
                                        <?= htmlspecialchars($evento['status_evento']) ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="index.php?acao=editar&id=<?= $evento['id'] ?>"
                                        class="btn btn-sm btn-warning">Editar</a>

                                    <a href="index.php?acao=excluir&id=<?= $evento['id'] ?>"
                                        class="btn btn-sm btn-danger btn-excluir">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Bem vindo ao sistema de eventos comunitários!</h5>
        <p class="card-text">Aqui serão listados os eventos comunitários cadastrados no sistema.</p>
    </div>
</div>