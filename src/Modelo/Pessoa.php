<?php

namespace GuilhermeBM\CrudPessoa\Modelo;

class Pessoa
{
    public ?int $id;
    private ?string $nome;
    private ?string $email;
    private ?string $telefone;

    public function __construct(int $id = null, ?string $nome = null, ?string $email = null, ?string $telefone = null)
    {
        $this->id = $id;
        $this->nomeSet($nome);
        $this->emailSet($email);
        $this->telefoneSet($telefone);
    }

    public function nomeSet(?string $nome)
    {
        if (!is_null($nome) && mb_strlen($nome) > 100) {
            throw new \InvalidArgumentException("Nome excede os 100 caracteres", 1);
        }

        $this->nome = $nome;
    }

    public function nomeGet(): ?string
    {
        return $this->nome;
    }

    public function emailSet(?string $email)
    {
        if (!is_null($email) && mb_strlen($email) > 100) {
            throw new \InvalidArgumentException("E-mail excede os 100 caracteres", 1);
        }

        $this->email = $email;
    }

    public function emailGet(): ?string
    {
        return $this->email;
    }

    public function telefoneSet(?string $telefone)
    {
        if (!is_null($telefone) && mb_strlen($telefone) > 20) {
            throw new \InvalidArgumentException("Nome excede os 20 caracteres", 1);
        }

        $this->telefone = $telefone;
    }

    public function telefoneGet(): ?string
    {
        return $this->telefone;
    }

    public function hydrate(array $consultaBanco = [])
    {
        $this->id = $consultaBanco['id'] ?? null;
        $this->nomeSet($consultaBanco['nome'] ?? null);
        $this->emailSet($consultaBanco['email'] ?? null);
        $this->telefoneSet($consultaBanco['telefone'] ?? null);
    }
}
