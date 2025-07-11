<?php include "../validar.php";
include "conexao.php";
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Meta obrigatória do Bootstrap -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bem vindo</title>

    <!-- Bootstrap CSS local -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <div class="row">
        <div class="p-5 mb-4 bg-light rounded-3">
  <div class="container-fluid py-5">
    <h1 class="display-5 fw-bold">Sistema de Cadastro de Faccionados</h1>
    <p class="fs-4 d-inline">Esse é um sistema simplificado de cadastros. Base de estudos para criação de sistemas Web com PHP e MySQL.</p>
    <hr class="my-4">
    <a>Acesse as funções.</a><br> <br>
    <a class="btn btn-primary btn-lg" href="restrito.php">Cadastro</a>
        <a class="btn btn-primary btn-lg" href="lista.php">Pesquisar</a>
        <a class="btn btn-danger btn-lg" href="logout.php">Sair</a>
  </div>
</div>

    </div>
    </div>
   
    <!-- Bootstrap JS local (inclui Popper) -->
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
   