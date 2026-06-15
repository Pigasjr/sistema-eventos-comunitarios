<?php
$linkVoltar = 'index.php';

if (isset($_GET['voltar']) && $_GET['voltar'] === 'calendario') {
    $mes = $_GET['mes'] ?? date('m');
    $ano = $_GET['ano'] ?? date('Y');

    $linkVoltar = "index.php?acao=calendario&mes={$mes}&ano={$ano}";
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Detalhes do Evento</h1>
    <a href="<?= $linkVoltar ?>" class="btn btn-secondary">Voltar</a>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <strong>
            <?= htmlspecialchars($evento['titulo']) ?>
        </strong>
    </div>

    <div class="card-body">
        <div class="mb-3">
            <h5>Descrição</h5>
            <p>
                <?= nl2br(htmlspecialchars($evento['descricao'])) ?>
            </p>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>Data:</strong><br>
                <?= date('d/m/Y', strtotime($evento['data_evento'])) ?>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Horário:</strong><br>
                <?= substr($evento['horario'], 0, 5) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>Local:</strong><br>
                <?= htmlspecialchars($evento['local_evento']) ?>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Cidade:</strong><br>
                <?= htmlspecialchars($evento['cidade']) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>Categoria:</strong><br>
                <?= htmlspecialchars($evento['categoria']) ?>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Status:</strong><br>

                <?php
                $status = trim($evento['status_evento'] ?? '');
                $statusNormalizado = mb_strtolower($status, 'UTF-8');

                if ($statusNormalizado === 'ativo') {
                    echo '<span class="badge bg-success">Ativo</span>';
                } elseif ($statusNormalizado === 'encerrado') {
                    echo '<span class="badge bg-secondary">Encerrado</span>';
                } elseif ($statusNormalizado === 'cancelado') {
                    echo '<span class="badge bg-danger">Cancelado</span>';
                } else {
                    echo '<span class="badge bg-dark">' . htmlspecialchars($status ?: 'Status não informado') . '</span>';
                }
                ?>
            </div>
        </div>
    </div>
</div>