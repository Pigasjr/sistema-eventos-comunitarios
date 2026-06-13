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

    public function cadastrar($dados)
    {
        $sql = "INSERT INTO eventos
        (titulo, descricao, data_evento, horario, local_evento, cidade, categoria, status_evento)
        VALUES
        (:titulo, :descricao, :data_evento, :horario, :local_evento, :cidade, :categoria, :status_evento)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':titulo', $dados['titulo']);
        $stmt->bindValue(':descricao', $dados['descricao']);
        $stmt->bindValue(':data_evento', $dados['data_evento']);
        $stmt->bindValue(':horario', $dados['horario']);
        $stmt->bindValue(':local_evento', $dados['local_evento']);
        $stmt->bindValue(':cidade', $dados['cidade']);
        $stmt->bindValue(':categoria', $dados['categoria']);
        $stmt->bindValue(':status_evento', $dados['status_evento']);

        return $stmt->execute();
    }
}