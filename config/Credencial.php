<?php

namespace GuilhermeBM\CrudPessoa\Config;

/**
 * Responsável por armazenar todas as credenciais do sistema
 */
class Credencial {
    const BANCO = [
        'tipo' => 'sqlite',
        'path' => __DIR__ . '/../banco.sqlite'
    ];
}