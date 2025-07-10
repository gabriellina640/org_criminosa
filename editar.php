<?php
include "validar.php";
include "conexao.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: lista.php");
    exit;
}

// Pega os dados atuais do membro
$sql = "SELECT * FROM faccionado WHERE id_faccionado = $id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
    echo "Membro não encontrado.";
    exit;
}

$dados = mysqli_fetch_assoc($result);
?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <title>Editar Membro</title>
  <link href="css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-4">
  <h1>Editar Membro Faccionado</h1>

  <form action="editar_script.php" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $dados['id_faccionado'] ?>">

    <div class="mb-3">
      <label for="nome" class="form-label">Nome completo</label>
      <input type="text" id="nome" name="nome" class="form-control" value="<?= htmlspecialchars($dados['nome']) ?>" required>
    </div>

    <div class="mb-3">
      <label for="genero" class="form-label">Gênero</label>
      <select id="genero" name="genero" class="form-control" required>
        <option value="M" <?= $dados['genero'] == 'M' ? 'selected' : '' ?>>Masculino</option>
        <option value="F" <?= $dados['genero'] == 'F' ? 'selected' : '' ?>>Feminino</option>
        <option value="Outro" <?= $dados['genero'] == 'Outro' ? 'selected' : '' ?>>Outro</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="data_nascimento" class="form-label">Data de nascimento</label>
      <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" value="<?= $dados['data_nascimento'] ?>" required>
    </div>

    <div class="mb-3">
      <label for="cpf" class="form-label">CPF</label>
      <input type="text" id="cpf" name="cpf" class="form-control" value="<?= htmlspecialchars($dados['CPF']) ?>" required>
    </div>

    <div class="mb-3">
      <label for="nacionalidade" class="form-label">Nacionalidade</label>
      <input type="text" id="nacionalidade" name="nacionalidade" class="form-control" value="<?= htmlspecialchars($dados['nacionalidade']) ?>">
    </div>

    <div class="mb-3">
      <label for="estado" class="form-label">Estado</label>
      <input type="text" id="estado" name="estado" class="form-control" value="<?= htmlspecialchars($dados['estado']) ?>">
    </div>

    <div class="mb-3">
      <label for="cidade" class="form-label">Cidade</label>
      <input type="text" id="cidade" name="cidade" class="form-control" value="<?= htmlspecialchars($dados['cidade']) ?>">
    </div>

    <div class="mb-3">
      <label for="pai" class="form-label">Nome do pai</label>
      <input type="text" id="pai" name="pai" class="form-control" value="<?= htmlspecialchars($dados['pai']) ?>">
    </div>

    <div class="mb-3">
      <label for="mae" class="form-label">Nome da mãe</label>
      <input type="text" id="mae" name="mae" class="form-control" value="<?= htmlspecialchars($dados['mae']) ?>">
    </div>

    <div class="mb-3">
      <label for="conjuge" class="form-label">Cônjuge</label>
      <input type="text" id="conjuge" name="conjuge" class="form-control" value="<?= htmlspecialchars($dados['conjuge']) ?>">
    </div>

    <div class="mb-3">
      <label for="organizacao" class="form-label">Organização Criminosa</label>
      <input type="text" id="organizacao" name="organizacao" class="form-control" value="<?= htmlspecialchars($dados['faccao']) ?>">
    </div>

    <div class="mb-3">
      <label for="foto" class="form-label">Foto (se quiser trocar)</label>
      <input type="file" id="foto" name="foto" class="form-control" accept="image/*">
      <?php if (!empty($dados['foto'])): ?>
        <img src="<?= htmlspecialchars($dados['foto']) ?>" alt="Foto atual" style="width:100px; margin-top:10px;">
      <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    <a href="lista.php" class="btn btn-secondary">Cancelar</a>
  </form>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
