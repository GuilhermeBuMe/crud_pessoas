<?php

namespace GuilhermeBM\CrudPessoa\Funcao;

/**
 * Responsável por gerar todas as telas presentes no sistema
 */
class View
{
    private string $caminho;

    public array $listaParametro;

    public function __construct(string $caminho, array $listaParametro = [])
    {
        $this->caminho = __DIR__ . "/../../public/views/" . $caminho . '.php';

        if (!file_exists($this->caminho)) {
            throw new \Exception("View não existe - {$this->caminho}");
        }

        $this->caminho = $caminho;

        $this->listaParametro = $listaParametro;
    }

    public function renderizar(): string
    {
        $view = new \League\Plates\Engine(__DIR__ . '/../../public/views/');

        return $view->render($this->caminho, $this->listaParametro);
    }
}
