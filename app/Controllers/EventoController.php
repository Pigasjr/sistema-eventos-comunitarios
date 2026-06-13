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
}