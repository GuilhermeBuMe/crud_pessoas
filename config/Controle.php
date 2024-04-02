<?php

namespace GuilhermeBM\CrudPessoa\Config;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Interface padrao que deverá ser sempre utlizada nos controles
 */
interface Controle
{
    public function processaRequisicao(ServerRequestInterface $request): ResponseInterface;
}
