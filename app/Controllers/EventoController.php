<?php
require_once __DIR__ . '/../Models/Evento.php';

class EventoController
{
    public function index()
    {
        $eventoModel = new Evento();
        $eventos = $eventoModel->listartodos();

        require_once __DIR__ . '/../Views/templates/header.php';
        require_once __DIR__ . '/../Views/eventos/listar.php';
        require_once __DIR__ . '/../Views/templates/footer.php';
    }

    public function cadastrar()
    {
        require_once __DIR__ . '/../Views/templates/header.php';
        require_once __DIR__ . '/../Views/eventos/cadastrar.php';
        require_once __DIR__ . '/../Views/templates/footer.php';
    }

    public function salvar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'titulo' => trim($_POST['titulo']),
                'descricao' => trim($_POST['descricao']),
                'data_evento' => $_POST['data_evento'],
                'horario' => $_POST['horario'],
                'local_evento' => trim($_POST['local_evento']),
                'cidade' => $_POST['cidade'],
                'categoria' => $_POST['categoria'],
                'status_evento' => $_POST['status_evento']
            ];
            $eventoModel = new Evento();
            $eventoModel->cadastrar($dados);
        }
        header('Location: index.php');
        exit();
    }
}