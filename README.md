# CRUD_PESSOA - Teste

O projeto é um CRUD simples de gerenciamento de pessoas

## Conhecimentos utilizados

- PHP
- jQuery
- JavaScript
- PDO
- MVC
- Repository
- URL amigavel
- PSR-17
- Composer
- PHP templates
- SQLite

## Funcionamento

É nescessario iniciar o servidor dentro da pasta public.

O sistema apresenta uma unica entrada e através de URL amigáveis possibilita que o usuario navegue por ele.

Ele utiliza o conceito básico de MVC, separando o conteudo em Model, que contem as regras de négocio, View, que representa as telas do sistema atraves da utilização de templates, e por ultimo o Controler que responsável por fazer a lógica de funcionamento de cada requisição HTTP.

O funcionamento se baseia no seguinte caminha:

Recebe a requisição HTTP >> Redireciona para a entrada unica >> Excecuta a Aplicacao >> Aplicacao verifica a existencia da rota >> Executa o controle encontrado

A ultima etapa pode fazer a utilização tanto da camada de Model, e/ou da conexao com o banco que utiliza o repositorio, e/ou utiliza da classe view para gerar a tela nescessária.

## Bibliotecas utilizadas

- league/plates
- nyholm/psr7