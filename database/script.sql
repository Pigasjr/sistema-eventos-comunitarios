CREATE DATABASE IF NOT EXISTS sistema_eventos_comunitarios
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

USE sistema_eventos_comunitarios;

CREATE TABLE IF NOT EXISTS eventos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    descricao TEXT NOT NULL,
    data_evento DATE NOT NULL,
    horario TIME NOT NULL,
    local_evento VARCHAR(150) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    categoria VARCHAR(100) NOT NULL,
    status_evento ENUM('Ativo', 'Encerrado', 'Cancelado') NOT NULL DEFAULT 'Ativo',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO eventos(titulo, descricao, data_evento, horario, local_evento, cidade, categoeria,status_evento)
VALUES
('Campanha do Agasalho', 'Arrecadação de roupas e cobertores para famílias em situação de vulnerabilidade.', '2026-06-20', '14:00:00', 'Escola Municipal Central', 'Ibirubá', 'Campanha Social', 'Ativo'),

('Festa Comunitária da Igreja', 'Evento comunitário com almoço, música e integração entre os moradores.', '2026-07-05', '11:30:00', 'Salão Paroquial', 'Selbach', 'Evento Comunitário', 'Ativo');