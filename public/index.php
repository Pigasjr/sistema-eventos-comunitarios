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
    default:
        $controller->index();
}