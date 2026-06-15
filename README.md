# Sistema de Eventos Comunitários

Projeto desenvolvido para a disciplina de programação web, utilizando PHP, MySQL, Bootstrap, CSS, JavaScript e organização no padrão MVC.

## Objetivo do projeto

O objetivo do sistema é permitir o gerenciamento de eventos comunitários, como campanhas sociais, eventos escolares, reuniões, palestras e atividades locais.

A aplicação permite cadastrar, listar, visualizar, editar e excluir eventos, além de apresentar os eventos em um calendário mensal.

## Tecnologias utilizadas

- PHP
- MySQL
- HTML
- CSS
- Bootstrap
- JavaScript
- BrasilAPI
- Git e GitHub

## Funcionalidades

- Cadastro de eventos comunitários;
- Listagem de eventos cadastrados;
- Visualização detalhada de cada evento;
- Edição de eventos;
- Exclusão de eventos com confirmação;
- Calendário mensal de eventos;
- Consumo da BrasilAPI para carregar estados e cidades;
- Contador de caracteres no campo de descrição;
- Interface responsiva com Bootstrap.

## Estrutura do projeto

O projeto foi organizado utilizando o padrão MVC:

- `Models`: responsáveis pela comunicação com o banco de dados;
- `Controllers`: responsáveis pelo controle das ações do sistema;
- `Views`: responsáveis pela exibição das telas;
- `public`: arquivos públicos como CSS, JavaScript e ponto de entrada do sistema;
- `config`: arquivo de conexão com o banco de dados;
- `database`: script SQL do banco.

## Banco de dados

O banco de dados utilizado é MySQL.

O script de criação do banco e da tabela está disponível em:

```text
database/script.sql
```
