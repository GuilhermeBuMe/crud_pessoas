<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js" integrity="sha256-IW9RTty6djbi3+dyypxajC14pE6ZrP53DLfY9w40Xn4=" crossorigin="anonymous"></script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Jquery mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Proprio -->
    <script src="../js/comum.js"></script>
    <script src="../js/pessoa.js"></script>

    <style>
        body {
            width: 100%;
            height: 100vh;
            background-image: url('../img/background.jpg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
    </style>

    <title><?= $this->e($tituloPagina) ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark sticky-top" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">CRUD BÁSICO</a>

            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar-canvas-" aria-controls="navbar-canvas-" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="navbar-canvas-" aria-labelledby="navbar-canvas-label">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="navbar-canvas-label">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Fechar"></button>
                </div>

                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">
                                Pessoas Cadastradas
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <main class="py-5">
        <?= $this->section('content'); ?>
    </main>
</body>

</html>