<?php

/**
 * @var array
 */
$listaPessoa = $listaPessoa;

$this->layout('layout', ['tituloPagina' => 'CRUD BÁSICO - Lista']);

?>

<div class="container-fluid bg-white shadow pt-5 pb-4">
    <div class="container">
        <div class="row gy-md-0 gy-3 align-items-center mb-4">
            <div class="col-md">
                <h4 class="mb-0">
                    <i class="fa-solid fa-users text-primary fa-xl me-3"></i>Pessoas Cadastradas
                </h4>
            </div>

            <div class="col-md-auto">
                <a class="btn btn-success w-100" href="pessoa/nova" role="button">
                    <i class="fa-solid fa-user-plus me-2"></i>Adicionar
                </a>
            </div>
        </div>

        <hr>

        <?php if (empty($listaPessoa)) : ?>
            <div class="alert alert-primary text-center" role="alert">
                Nenhum pessoa foi cadastrado
            </div>
        <?php else : ?>
            <div class="table-responsive">
                <table class="table table-stripped align-middle" id="tabela-pessoa" style="width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">
                                Nome
                            </th>

                            <th scope="col" style="width: 25%;">
                                E-mail
                            </th>

                            <th scope="col" style="width: 15%;">
                                Telefone
                            </th>

                            <th scope="col" class="text-center" style="width: 10%">
                                Editar
                            </th>

                            <th scope="col" class="text-center" style="width: 10%">
                                Apagar
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($listaPessoa as $pessoa) : ?>
                            <tr>
                                <td>
                                    <?= $this->e($pessoa['nome']) ?>
                                </td>

                                <td>
                                    <?= $this->e($pessoa['email']) ? $this->e($pessoa['email']) : 'Não registrado' ?>
                                </td>

                                <td>
                                    <?= $this->e($pessoa['telefone']) ? $this->e($pessoa['telefone']) : 'Não registrado' ?>
                                </td>

                                <td>
                                    <a type="button" class="btn btn-warning w-100" href="pessoa/editar?id=<?= $pessoa['id'] ?>" role="button">
                                        <i class="fa-solid fa-user-pen"></i>
                                    </a>
                                </td>

                                <td>
                                    <button type="button" class="btn btn-danger w-100" onclick="apagarPessoa(<?= $pessoa['id'] ?>)">
                                        <i class="fa-solid fa-user-slash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>
                                Nome
                            </th>

                            <th>
                                E-mail
                            </th>

                            <th>
                                Telefone
                            </th>

                            <th class="text-center">
                                Editar
                            </th>

                            <th class="text-center">
                                Apagar
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>