<?php

class EventoController
{
    public function index()
    {
        require_once __DIR__ . '/../Views/templates/header.php';
        require_once __DIR__ . '/../Views/eventos/listar.php';
        require_once __DIR__ . '/../Views/templates/footer.php';
    }
}