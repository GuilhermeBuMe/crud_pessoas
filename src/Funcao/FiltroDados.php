<?php

namespace GuilhermeBM\CrudPessoa\Funcao;

/**
 * Responsável por tratar todos os dados que entram no sistema atraves da introdução de seu usuário
 */
class FiltroDados
{
    /**
     * Trata strings para serem inseridas no banco
     * @param string $string String que sera tratada pela funcao
     */
    static public function limpaString(?string $string): ?string
    {
        $stringTratada = $string;
        if ($string) {
            $stringTratada = trim($string);
            $stringTratada = htmlspecialchars($stringTratada);
        }

        return $stringTratada;
    }
}
