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
    public function editar()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            header('Location: index.php');
            exit;
        }

        $eventoModel = new Evento();
        $evento = $eventoModel->buscarPorId($id);

        if (!$evento) {
            header('Location: index.php');
            exit;
        }

        require_once __DIR__ . '/../Views/templates/header.php';
        require_once __DIR__ . '/../Views/eventos/editar.php';
        require_once __DIR__ . '/../Views/templates/footer.php';
    }

    public function atualizar()
    {
        $id = $_GET['id'] ?? null;

        if ($id && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'titulo' => trim($_POST['titulo']),
                'descricao' => trim($_POST['descricao']),
                'data_evento' => $_POST['data_evento'],
                'horario' => $_POST['horario'],
                'local_evento' => trim($_POST['local_evento']),
                'cidade' => trim($_POST['cidade']),
                'categoria' => $_POST['categoria'],
                'status_evento' => $_POST['status_evento']
            ];

            $eventoModel = new Evento();
            $eventoModel->atualizar($id, $dados);
        }

        header('Location: index.php');
        exit;
    }

    public function excluir()
    {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $eventoModel = new Evento();
            $eventoModel->excluir($id);
        }

        header('Location: index.php');
        exit;
    }

    public function visualizar()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            header('Location: index.php');
            exit;
        }

        $eventoModel = new Evento();
        $evento = $eventoModel->buscarPorId($id);

        if (!$evento) {
            header('Location: index.php');
            exit;
        }

        require_once __DIR__ . '/../Views/templates/header.php';
        require_once __DIR__ . '/../Views/eventos/visualizar.php';
        require_once __DIR__ . '/../Views/templates/footer.php';
    }

    public function calendario()
    {
        $eventoModel = new Evento();
        $eventos = $eventoModel->listarTodos();

        require_once __DIR__ . '/../Views/templates/header.php';
        require_once __DIR__ . '/../Views/eventos/calendario.php';
        require_once __DIR__ . '/../Views/templates/footer.php';
    }

}
