<?php

namespace GuilhermeBM\CrudPessoa\Funcao;

use GuilhermeBM\CrudPessoa\Config\Credencial;

/**
 * Responsável por fazer a conexao com o banco utilizando o PDO
 */
class BancoDados extends \PDO
{
    public function __construct()
    {
        $tipo = Credencial::BANCO['tipo'];
        $path = Credencial::BANCO['path'];

        parent::__construct(
            "$tipo:$path",
            options: [
                \PDO::MYSQL_ATTR_FOUND_ROWS => true,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ]
        );
    }
}
