<?php

namespace GuilhermeBM\CrudPessoa\Controle\Pessoa;

use Psr\Http\Message\{ResponseInterface, ServerRequestInterface};
use Nyholm\Psr7\Response;

use GuilhermeBM\CrudPessoa\Config\Controle;
use GuilhermeBM\CrudPessoa\Funcao\{BancoDados, Erro, FiltroDados};

use GuilhermeBM\CrudPessoa\Modelo\Pessoa;
use GuilhermeBM\CrudPessoa\Repositorio\Pessoa as PessoaRep;

class Criar implements Controle
{
    function processaRequisicao(ServerRequestInterface $request): ResponseInterface
    {
        $listaPost = $request->getParsedBody();

        $nome = $listaPost['nome'];
        $nome = FiltroDados::limpaString($nome);

        $email = $listaPost['email'] ? filter_var($listaPost['email'], FILTER_VALIDATE_EMAIL) : null;
        if ($email === false) {
            return new Response(
                201,
                ['Content-Type' => 'json; charset=utf-8'],
                Erro::exibeJson(debug: 'Email invalido')
            );
        }

        $email = FiltroDados::limpaString($email);

        $telefone = $listaPost['telefone'];
        $telefone = FiltroDados::limpaString($telefone);

        $pessoa = new Pessoa(null, $nome, $email, $telefone);

        $bd = new BancoDados();

        $pessoaRep = new PessoaRep($bd);
        $pessoaRep->criar($pessoa);

        $bd = null;

        return new Response(
            201,
            ['Content-Type' => 'json; charset=utf-8'],
            json_encode([
                'status' => 'sucesso'
            ])
        );
    }
}
