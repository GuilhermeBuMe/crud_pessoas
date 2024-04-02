<?php

namespace GuilhermeBM\CrudPessoa\Config;

/**
 * Contem todas as rotas do sistema
 */
class Rota
{
    /**
     * Retorna um array contendo todas as rotas do sistema, que utiliza como index de cada posição o metodo da requisicao + o caminho dela
     */
    static function buscaRota(): array
    {
        return [
            'GET|/' => \GuilhermeBM\CrudPessoa\Controle\Pessoa\Lista::class,
            'GET|/pessoa/nova' => \GuilhermeBM\CrudPessoa\Controle\Pessoa\FormularioNovo::class,
            'POST|/pessoa/nova' => \GuilhermeBM\CrudPessoa\Controle\Pessoa\Criar::class,
            'GET|/pessoa/editar' => \GuilhermeBM\CrudPessoa\Controle\Pessoa\FormularioEditar::class,
            'POST|/pessoa/editar' => \GuilhermeBM\CrudPessoa\Controle\Pessoa\Editar::class,
            'POST|/pessoa/remover' => \GuilhermeBM\CrudPessoa\Controle\Pessoa\Deletar::class
        ];
    }
}
