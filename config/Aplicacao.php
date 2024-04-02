<?php

namespace GuilhermeBM\CrudPessoa\Config;

use GuilhermeBM\CrudPessoa\Funcao\Erro;
use Nyholm\Psr7\Response;

/**
 * Responsável por receber a requisicao HTTP, e transforma-la para uma requisição para o servidor que utiliza a PSR-17. Ela tambem é responsável por identificar e iniciar
 * a classe do controle
 */
class Aplicacao
{
    public static function processar(): string
    {
        $caminho = $_SERVER['PATH_INFO'] ?? '/';
        $metodoHttp = $_SERVER['REQUEST_METHOD'];

        $rota = "$metodoHttp|$caminho";
        $listaRota = Rota::buscaRota();
        if (array_key_exists($rota, $listaRota)) {
            $controleClass = $listaRota["$metodoHttp|$caminho"];
        } else {
            $response = new Response(
                404
            );

            http_response_code($response->getStatusCode());
            foreach ($response->getHeaders() as $name => $values) {
                foreach ($values as $value) {
                    header(sprintf('%s: %s', $name, $value), false);
                }
            }

            return $response->getBody();
        }

        $psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();

        $creator = new \Nyholm\Psr7Server\ServerRequestCreator(
            $psr17Factory, // ServerRequestFactory
            $psr17Factory, // UriFactory
            $psr17Factory, // UploadedFileFactory
            $psr17Factory  // StreamFactory
        );

        $request = $creator->fromGlobals();

        try {
            /**
             * @var \Psr\Http\Server\RequestHandlerInterface $controle 
             */
            $controle = new $controleClass;

            $response = $controle->processaRequisicao($request);
        } catch (\Throwable $th) {
            $response = new Response(
                500
            );
        }

        http_response_code($response->getStatusCode());
        foreach ($response->getHeaders() as $name => $values) {
            foreach ($values as $value) {
                header(sprintf('%s: %s', $name, $value), false);
            }
        }

        return $response->getBody();
    }
}
