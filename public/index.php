<?php

require_once '../app/Controllers/EventoController.php';

$controller = new EventoController();
$acao = $_GET['acao'] ?? 'index';
switch ($acao) {
    case 'cadastrar':
        $controller->cadastrar();
        break;

    case 'salvar':
        $controller->salvar();
        break;

    case 'editar':
        $controller->editar();
        break;

    case 'atualizar':
        $controller->atualizar();
        break;

    case 'excluir':
        $controller->excluir();
        break;

    case 'visualizar':
        $controller->visualizar();
        break;

    case 'calendario':
        $controller->calendario();
        break;

    default:
        $controller->index();
        break;
}