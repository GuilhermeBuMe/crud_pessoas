<?php

namespace GuilhermeBM\CrudPessoa\Controle\Pessoa;

use Psr\Http\Message\{ResponseInterface, ServerRequestInterface};
use Nyholm\Psr7\Response;

use GuilhermeBM\CrudPessoa\Config\Controle;
use GuilhermeBM\CrudPessoa\Funcao\{View};

use GuilhermeBM\CrudPessoa\Modelo\Pessoa;

class FormularioNovo implements Controle
{
    function processaRequisicao(ServerRequestInterface $request): ResponseInterface
    {
        $pessoa = new Pessoa();

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
