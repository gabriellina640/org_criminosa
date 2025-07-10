<?php 
include "validar.php";
include "conexao.php";

// Recebe o termo de busca via GET
$busca = $_GET['busca'] ?? '';

// Monta a query com filtro caso tenha busca
if ($busca != '') {
    $sql = "SELECT * FROM faccionado WHERE nome LIKE '%$busca%' ORDER BY nome";
} else {
    $sql = "SELECT * FROM faccionado ORDER BY nome";
}

$resultado = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lista de Membros</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">

  <h1>Lista de Membros Faccionados</h1>

  <!-- Form de busca -->
  <form method="GET" class="mb-3" action="lista.php">
    <div class="input-group">
      <input type="text" name="busca" class="form-control" placeholder="Buscar pelo nome" value="<?php echo htmlspecialchars($busca); ?>">
      <button class="btn btn-outline-primary" type="submit">Buscar</button>
      <a href="lista.php" class="btn btn-outline-secondary">Limpar</a>
    </div>
  </form>

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>Foto</th>
        <th>Nome</th>
        <th>Gênero</th>
        <th>Data Nasc.</th>
        <th>CPF</th>
        <th>Nacionalidade</th>
        <th>Estado</th>
        <th>Cidade</th>
        <th>Pai</th>
        <th>Mãe</th>
        <th>Cônjuge</th>
        <th>Facção</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (mysqli_num_rows($resultado) > 0) {
          while ($linha = mysqli_fetch_assoc($resultado)) {
              echo "<tr>";
              // Mostra a foto, verifica se arquivo existe
              if (!empty($linha['foto']) && file_exists($linha['foto'])) {
                  echo "<td><img src='" . htmlspecialchars($linha['foto']) . "' alt='Foto' style='width:60px; height:auto;'></td>";
              } else {
                  echo "<td><img src='img/default.png' alt='Sem Foto' style='width:60px; height:auto;'></td>";
              }
              echo "<td>" . htmlspecialchars($linha['nome']) . "</td>";
              echo "<td>" . htmlspecialchars($linha['genero']) . "</td>";
              echo "<td>" . htmlspecialchars($linha['data_nascimento']) . "</td>";
              echo "<td>" . htmlspecialchars($linha['CPF']) . "</td>";
              echo "<td>" . htmlspecialchars($linha['nacionalidade']) . "</td>";
              echo "<td>" . htmlspecialchars($linha['estado']) . "</td>";
              echo "<td>" . htmlspecialchars($linha['cidade']) . "</td>";
              echo "<td>" . htmlspecialchars($linha['pai']) . "</td>";
              echo "<td>" . htmlspecialchars($linha['mae']) . "</td>";
              echo "<td>" . htmlspecialchars($linha['conjuge']) . "</td>";
              echo "<td>" . htmlspecialchars($linha['faccao']) . "</td>";
              
              // Botões editar e excluir
              echo "<td>
                      <a href='editar.php?id=" . $linha['id_faccionado'] . "' class='btn btn-sm btn-warning mb-1'>Editar</a>
                      <a href='excluir.php?id=" . $linha['id_faccionado'] . "' class='btn btn-sm btn-danger' onclick=\"return confirm('Tem certeza que deseja excluir este membro?');\">Excluir</a>
                    </td>";

              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='13' class='text-center'>Nenhum registro encontrado.</td></tr>";
      }
      ?>
    </tbody>
  </table>

  <a href="restrito.php" class="btn btn-secondary">Voltar ao Cadastro</a>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
