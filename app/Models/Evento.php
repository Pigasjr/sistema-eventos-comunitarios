<?php

require_once __DIR__ . '/../../config/database.php';

class Evento
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::conectar();
    }
    public function listartodos()
    {
        $sql = "SELECT * FROM eventos ORDER BY data_evento ASC,horario ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}