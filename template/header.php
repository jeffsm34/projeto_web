<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APP PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid navbar-dark bg-dark fixed-top">
              <a class="navbar-brand text-white" href="http://localhost/projeto_php/">App Teste</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="http://localhost/projeto_php/">Home</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Produtos
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="http://localhost/projeto_php/produtos">Listar</a></li>
                      <li><a class="dropdown-item" href="http://localhost/projeto_php/produtos/create-produto.php">Inserir</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Relatório</a></li>
                    </ul>
                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Clientes
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="http://localhost/projeto_php/clientes">Listar</a></li>
                                <li><a class="dropdown-item" href="http://localhost/projeto_php/clientes/create-cliente.php">Inserir</a></li>
                            </ul>
                        </li>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </header>
    <div class="container my-4">