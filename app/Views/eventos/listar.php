<div class="mb-4">
    <h1 class="fw-bold">Eventos Comunitários</h1>
    <p class="text-muted">
        Consulte os eventos cadastrados, visualize os detalhes, edite informações ou remova registros.
    </p>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-body">
        <h5 class="fw-bold mb-2">Bem-vindo ao sistema de eventos comunitários!</h5>
        <p class="mb-0">
            Aqui serão listados os eventos comunitários cadastrados no sistema.
        </p>
    </div>
</div>

<div class="card shadow-sm">
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
                                    <?php
                                    $status = mb_strtolower(trim($evento['status_evento'] ?? ''), 'UTF-8');

                                    if ($status === 'ativo') {
                                        echo '<span class="badge bg-success">Ativo</span>';
                                    } elseif ($status === 'encerrado') {
                                        echo '<span class="badge bg-secondary">Encerrado</span>';
                                    } elseif ($status === 'cancelado') {
                                        echo '<span class="badge bg-danger">Cancelado</span>';
                                    } else {
                                        echo '<span class="badge bg-dark">Status não informado</span>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="index.php?acao=visualizar&id=<?= $evento['id'] ?>"
                                        class="btn btn-sm btn-info text-white">
                                        Ver
                                    </a>

                                    <a href="index.php?acao=editar&id=<?= $evento['id'] ?>" class="btn btn-sm btn-warning">
                                        Editar
                                    </a>

                                    <a href="index.php?acao=excluir&id=<?= $evento['id'] ?>"
                                        class="btn btn-sm btn-danger btn-excluir">
                                        Excluir
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>