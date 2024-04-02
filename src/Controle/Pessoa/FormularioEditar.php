<?php

namespace GuilhermeBM\CrudPessoa\Controle\Pessoa;

use Psr\Http\Message\{ResponseInterface, ServerRequestInterface};
use Nyholm\Psr7\Response;

use GuilhermeBM\CrudPessoa\Config\Controle;
use GuilhermeBM\CrudPessoa\Funcao\{BancoDados, View};

use GuilhermeBM\CrudPessoa\Repositorio\Pessoa as PessoaRep;

class FormularioEditar implements Controle
{
    function processaRequisicao(ServerRequestInterface $request): ResponseInterface
    {
        $listaGet = $request->getQueryParams();

        $idPessoa = filter_var($listaGet['id'], FILTER_VALIDATE_INT);
        if ($idPessoa === false) {
            return new Response(
                400,
                ['Content-Type' => 'text/html; charset=utf-8'],
                ''
            );
        }

        $bd = new BancoDados();

        $pessoaRep = new PessoaRep($bd);
        $pessoa = $pessoaRep->detalhar($idPessoa);

        $objView = new View('pessoa/formulario', [
            'pessoa' => $pessoa,
        ]);

        return new Response(
            200,
            ['Content-Type' => 'text/html; charset=utf-8'],
            $objView->renderizar()
        );
    }
}
