<?php
$mes = isset($_GET['mes']) ? (int) $_GET['mes'] : (int) date('m');
$ano = isset($_GET['ano']) ? (int) $_GET['ano'] : (int) date('Y');

if ($mes < 1) {
    $mes = 12;
    $ano--;
}

if ($mes > 12) {
    $mes = 1;
    $ano++;
}

$nomesMeses = [
    1 => 'Janeiro',
    2 => 'Fevereiro',
    3 => 'Março',
    4 => 'Abril',
    5 => 'Maio',
    6 => 'Junho',
    7 => 'Julho',
    8 => 'Agosto',
    9 => 'Setembro',
    10 => 'Outubro',
    11 => 'Novembro',
    12 => 'Dezembro'
];

$diasSemana = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];

$primeiroDiaMes = mktime(0, 0, 0, $mes, 1, $ano);
$totalDiasMes = (int) date('t', $primeiroDiaMes);
$diaSemanaPrimeiroDia = (int) date('w', $primeiroDiaMes);

$mesAnterior = $mes - 1;
$anoAnterior = $ano;
if ($mesAnterior < 1) {
    $mesAnterior = 12;
    $anoAnterior--;
}

$proximoMes = $mes + 1;
$proximoAno = $ano;
if ($proximoMes > 12) {
    $proximoMes = 1;
    $proximoAno++;
}

$eventosPorDia = [];

foreach ($eventos as $evento) {
    $dataEvento = strtotime($evento['data_evento']);

    if ((int) date('m', $dataEvento) === $mes && (int) date('Y', $dataEvento) === $ano) {
        $dia = (int) date('d', $dataEvento);
        $eventosPorDia[$dia][] = $evento;
    }
}
?>

<div class="calendario-topo mb-4">
    <div>
        <h1 class="fw-bold mb-1">Calendário de Eventos</h1>
        <p class="text-muted mb-0">
            Visualize os eventos comunitários distribuídos por mês.
        </p>
    </div>

    <a href="index.php" class="btn btn-secondary">
        Voltar
    </a>
</div>

<div class="card calendario-container shadow-sm">
    <div class="card-body">

        <div class="calendario-cabecalho">
            <a href="index.php?acao=calendario&mes=<?= $mesAnterior ?>&ano=<?= $anoAnterior ?>" class="btn btn-light">
                ←
            </a>

            <h2 class="calendario-titulo">
                <?= $nomesMeses[$mes] ?>
                <?= $ano ?>
            </h2>

            <a href="index.php?acao=calendario&mes=<?= $proximoMes ?>&ano=<?= $proximoAno ?>" class="btn btn-light">
                →
            </a>
        </div>

        <div class="calendario-grid calendario-dias-semana">
            <?php foreach ($diasSemana as $diaSemana): ?>
                <div>
                    <?= $diaSemana ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="calendario-grid calendario-dias">
            <?php for ($i = 0; $i < $diaSemanaPrimeiroDia; $i++): ?>
                <div class="calendario-dia calendario-dia-vazio"></div>
            <?php endfor; ?>

            <?php for ($dia = 1; $dia <= $totalDiasMes; $dia++): ?>
                <div class="calendario-dia">
                    <div class="numero-dia">
                        <?= $dia ?>
                    </div>

                    <?php if (isset($eventosPorDia[$dia])): ?>
                        <?php foreach ($eventosPorDia[$dia] as $evento): ?>
                            <?php
                            $status = mb_strtolower(trim($evento['status_evento'] ?? ''), 'UTF-8');

                            $classeStatus = 'evento-calendario-azul';

                            if ($status === 'ativo') {
                                $classeStatus = 'evento-calendario-verde';
                            } elseif ($status === 'encerrado') {
                                $classeStatus = 'evento-calendario-cinza';
                            } elseif ($status === 'cancelado') {
                                $classeStatus = 'evento-calendario-vermelho';
                            }
                            ?>

                            <a href="index.php?acao=visualizar&id=<?= $evento['id'] ?>&voltar=calendario&mes=<?= $mes ?>&ano=<?= $ano ?>"
                                class="evento-calendario-item <?= $classeStatus ?>">
                                <span class="evento-hora">
                                    <?= substr($evento['horario'], 0, 5) ?>
                                </span>

                                <span class="evento-titulo">
                                    <?= htmlspecialchars($evento['titulo']) ?>
                                </span>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>