<?php

namespace GuilhermeBM\CrudPessoa\Controle\Pessoa;

use Psr\Http\Message\{ResponseInterface, ServerRequestInterface};
use Nyholm\Psr7\Response;

use GuilhermeBM\CrudPessoa\Config\Controle;
use GuilhermeBM\CrudPessoa\Funcao\{BancoDados, View};

use GuilhermeBM\CrudPessoa\Repositorio\Pessoa as PessoaRep;

class Lista implements Controle
{
    function processaRequisicao(ServerRequestInterface $request): ResponseInterface
    {
        $bd = new BancoDados();

        $pessoaRep = new PessoaRep($bd);

        $listaPessoa = $pessoaRep->listar();

        $objView = new View('pessoa/lista', [
            'listaPessoa' => $listaPessoa,
        ]);

        return new Response(
            200,
            ['Content-Type' => 'text/html; charset=utf-8'],
            $objView->renderizar()
        );
    }
}
