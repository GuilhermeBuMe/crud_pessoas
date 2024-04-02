<?php

/**
 * @var GuilhermeBM\CrudPessoa\Modelo\Pessoa
 */
$pessoa = $pessoa;

$this->layout('layout', ['tituloPagina' => 'CRUD BÁSICO - Formulário']);

?>

<div class="container-fluid bg-white shadow py-5">
    <section class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Pessoas Cadastradas</a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
        </nav>

        <h4 class="mt-5 mb-4">
            <i class="fa-solid fa-file-pen me-3 text-primary fa-xl"></i><?= empty($pessoa->id) ? 'Cadastrar Pessoa' : 'Editar Pessoa' ?>
        </h4>

        <hr>

        <div class="text-end">
            *: Campo Obrigatório
        </div>

        <form id="form-pessoa">
            <input type="hidden" name="id" value="<?= $pessoa->id ?>">

            <div class="mb-3">
                <label for="nome" class="form-label">
                    Nome *
                </label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= $this->e($pessoa->nomeGet()) ?>" aria-describedby="nomeHelp" maxlength="100" require>
                <div id="nomeHelp" class="form-text">Máximo de 100 caracteres</div>
                <div id="validationNome" class="invalid-feedback">
                    Campo Obrigatório
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $this->e($pessoa->emailGet()) ?>" aria-describedby="emailHelp" maxlength="100">
                <div id="emailHelp" class="form-text">Máximo de 100 caracteres</div>
            </div>

            <div class="mb-4">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="tel" class="form-control" id="telefone" name="telefone" value="<?= $this->e($pessoa->telefoneGet()) ?>" maxlength="16">
            </div>

            <div class="row gy-md-0 gy-3 align-items-center">
                <div class="col-md">
                    <a role="button" class="btn btn-secondary" href="../">
                        Cancelar
                    </a>
                </div>

                <div class="col-md text-end">
                    <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-user-check me-2"></i>Salvar
                    </button>
                </div>
            </div>
        </form>
    </section>
</div>

<script>
    var options = {
        onKeyPress: function(telefone, e, field, options) {
            var masks = ['(00) 0 0000-0000', '(00) 0000-00000'];
            var mask = (telefone.length < 15) ? masks[1] : masks[0];
            $('#telefone').mask(mask, options);
        }
    };

    $('#telefone').mask($('#telefone').val().length > 15 ? '(00) 0 0000-0000' : '(00) 0000-0000', options);

    $('#form-pessoa').submit((event) => {
        event.preventDefault()
        salvarPessoa()
    })
</script>