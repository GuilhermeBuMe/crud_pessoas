<?php

require_once "../vendor/autoload.php";

use GuilhermeBM\CrudPessoa\Funcao\BancoDados;

$bd = new BancoDados();

$query = "  CREATE TABLE 'pessoa' 
            (
                'id' INTEGER PRIMARY KEY,
                'nome' VARCHAR(100),
                'email' VARCHAR(100),
                'telefone' VARCHAR(20)
            )
";

$consulta = $bd->prepare($query);

$consulta->execute();

$bd = null;
