<?php include "validar.php"; ?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h1>Cadastro do Membro Faccionado</h1>

                <form action="restrito_script.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group mb-3">
                        <label for="nome">Nome completo</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="genero">Gênero</label>
                        <select class="form-control" id="genero" name="genero" required>
                          <option value="">Selecione</option>
                         <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                   <option value="Outro">Outro</option>
                        </select>

                    </div>

                    <div class="form-group mb-3">
                        <label for="data_nascimento">Data de nascimento</label>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite o CPF" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="nacionalidade">Nacionalidade</label>
                        <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" placeholder="Digite a nacionalidade">
                    </div>

                    <div class="form-group mb-3">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" id="estado" name="estado" placeholder="Digite o estado">
                    </div>

                    <div class="form-group mb-3">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Digite a cidade">
                    </div>

                    <div class="form-group mb-3">
                        <label for="pai">Nome do pai</label>
                        <input type="text" class="form-control" id="pai" name="pai" placeholder="Digite o nome do pai">
                    </div>

                    <div class="form-group mb-3">
                        <label for="mae">Nome da mãe</label>
                        <input type="text" class="form-control" id="mae" name="mae" placeholder="Digite o nome da mãe">
                    </div>

                    <div class="form-group mb-3">
                        <label for="conjuge">Cônjuge</label>
                        <input type="text" class="form-control" id="conjuge" name="conjuge" placeholder="Digite o nome do cônjuge (se houver)">
                    </div>

                    <div class="form-group mb-3">
                        <label for="organizacao">Organização Criminosa</label>
                        <input type="text" class="form-control" id="organizacao" name="organizacao" placeholder="Digite o nome da facção ou organização">
                    </div>

                    <div class="form-group mb-3">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                    </div>

                    <div class="form-group mb-3">
                          <input type="submit" class="btn btn-success" value="Enviar" name="Enviar">
                      </div>

                </form>
                <div class="mt-3">
  <a href="lista.php" class="btn btn-primary">Ver Lista de Membros</a>
</div>


                <a href="logout.php" class="btn btn-danger mt-3">🔒 Sair</a>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
