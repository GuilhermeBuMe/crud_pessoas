<?php

namespace GuilhermeBM\CrudPessoa\Controle\Pessoa;

use Psr\Http\Message\{ResponseInterface, ServerRequestInterface};
use Nyholm\Psr7\Response;

use GuilhermeBM\CrudPessoa\Config\Controle;
use GuilhermeBM\CrudPessoa\Funcao\{BancoDados, Erro};

use GuilhermeBM\CrudPessoa\Repositorio\Pessoa as PessoaRep;

class Deletar implements Controle
{
    function processaRequisicao(ServerRequestInterface $request): ResponseInterface
    {
        $listaPost = $request->getParsedBody();

        $idPessoa = filter_var($listaPost['id'], FILTER_VALIDATE_INT);
        if ($idPessoa === false) {
            return new Response(
                400,
                ['Content-Type' => 'json; charset=utf-8'],
                Erro::exibeJson(debug: 'Pessoa invalido')
            );
        }

        $bd = new BancoDados();

        $pessoaRep = new PessoaRep($bd);
        $pessoaRep->apagar($idPessoa);

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
