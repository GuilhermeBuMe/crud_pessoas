<?php

namespace GuilhermeBM\CrudPessoa\Repositorio;

use GuilhermeBM\CrudPessoa\Modelo\Pessoa as PessoaMod;

class Pessoa
{
    private \PDO $bd;

    public function __construct(\PDO $bd)
    {
        $this->bd = $bd;
    }

    public function listar(): array
    {
        $query = "  SELECT
                        id,
                        nome,
                        email,
                        telefone
                    FROM 
                        pessoa
                    ORDER BY
                        nome
        ";

        $consulta = $this->bd->prepare($query);
        $consulta->execute();

        return $consulta->fetchAll();
    }

    public function detalhar(int $idPessoa): PessoaMod
    {
        $query = "  SELECT
                        id,
                        nome,
                        email,
                        telefone
                    FROM 
                        pessoa
                    WHERE
                        id = :id
        ";

        $consulta = $this->bd->prepare($query);
        $consulta->execute([
            'id' => $idPessoa
        ]);

        $pessoa = $consulta->fetch(\PDO::FETCH_ASSOC);
        if ($pessoa === false) {
            throw new \Exception('Pessoa não encontrado');
        }

        $pessoaOb = new PessoaMod();
        $pessoaOb->hydrate($pessoa);

        return $pessoaOb;
    }

    public function criar(PessoaMod $pessoa): int
    {
        $query = "  INSERT INTO
                        pessoa
                        (
                            nome,
                            email,
                            telefone
                        )
                    VALUES
                        (
                            :nome,
                            :email,
                            :telefone
                        )
        ";

        $consulta = $this->bd->prepare($query);
        $consulta->execute([
            'nome' => $pessoa->nomeGet(),
            'email' => $pessoa->emailGet(),
            'telefone' => $pessoa->telefoneGet()
        ]);

        return $this->bd->lastInsertId();
    }

    public function editar(PessoaMod $pessoa): int
    {
        $query = "  UPDATE
                        pessoa
                    SET
                        nome = :nome,
                        email = :email,
                        telefone = :telefone
                    WHERE
                        id = :idPessoa
        ";

        $consulta = $this->bd->prepare($query);
        $consulta->execute([
            'nome' => $pessoa->nomeGet(),
            'email' => $pessoa->emailGet(),
            'telefone' => $pessoa->telefoneGet(),
            'idPessoa' => $pessoa->id
        ]);

        return $this->bd->lastInsertId();
    }

    public function apagar($idPessoa): void
    {
        $query = "  DELETE FROM
                        pessoa
                    WHERE
                        id = :idPessoa
        ";

        $consulta = $this->bd->prepare($query);
        $consulta->execute([
            'idPessoa' => $idPessoa
        ]);
    }
}
