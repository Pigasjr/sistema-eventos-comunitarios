<?php

class Database
{
    public static function conectar()
    {
        $host = 'localhost';
        $dbname = 'sistema_eventos_comunitarios';
        $usuario = 'root';
        $senha = '';

        try {
            $pdo = new PDO(
                "mysql:host=$host;dbname=$dbname;charset=utf8",
                $usuario,
                $senha
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }
    }
}