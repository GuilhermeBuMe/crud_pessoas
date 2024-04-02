<?php

namespace GuilhermeBM\CrudPessoa\Funcao;

/**
 * Responsavel por gerar uma mensagem de erro contendo algumas informações importantes para o cliente e/ou desenvolvedor
 */
class Erro
{
    /**
     * @param ?string $debug Informacao do erro que sera mostrado para o DEV
     * @param ?string $info Informacao do erro que sera mostrado para o usuario
     * @return string Modelo padrao de erro do json
     */
    static public function exibeJson(?string $info = '', ?string $debug = '', ?\Throwable $th = null): string
    {
        $debugConteudo = $debug;

        if ($th) {
            $count = 1;
            while ($th instanceof \Throwable) {
                $debugConteudo .=  PHP_EOL . "Erro $count: " . PHP_EOL . $th->getMessage() . PHP_EOL . $th->getTraceAsString();

                $th = $th->getPrevious();
                $count++;
            }
        }

        $erro = [
            'erro' => [
                'info' => $info,
                'debug' => $debugConteudo,
            ]
        ];

        return json_encode($erro);
    }
}
