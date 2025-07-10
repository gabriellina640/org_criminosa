<?php
include "validar.php";
include "conexao.php";

// Ativa exibição de erros para debug (remove em produção)
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recebe dados do formulário
    $nome = $_POST['nome'] ?? '';
    $genero = $_POST['genero'] ?? '';
    $data_nascimento = $_POST['data_nascimento'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $nacionalidade = $_POST['nacionalidade'] ?? '';
    $estado = $_POST['estado'] ?? '';
    $cidade = $_POST['cidade'] ?? '';
    $pai = $_POST['pai'] ?? '';
    $mae = $_POST['mae'] ?? '';
    $conjuge = $_POST['conjuge'] ?? '';
    $faccao = $_POST['organizacao'] ?? '';  // aqui renomeei para faccao conforme banco

    // Upload da foto
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $foto_tmp = $_FILES['foto']['tmp_name'];
        $foto_nome = basename($_FILES['foto']['name']);

        // Para evitar sobrescrever arquivos com mesmo nome, podemos adicionar timestamp
        $foto_nome_final = time() . "_" . $foto_nome;

        $foto_destino = "img/" . $foto_nome_final;

        if (!move_uploaded_file($foto_tmp, $foto_destino)) {
            die("Erro ao mover o arquivo da foto.");
        }
    } else {
        $foto_destino = NULL; // Nenhuma foto enviada
    }

    // Prepara o SQL (sem segurança, só pra funcionar)
    $sql = "INSERT INTO faccionado (nome, genero, data_nascimento, CPF, nacionalidade, estado, cidade, pai, mae, conjuge, faccao, foto)
            VALUES (
                '$nome', '$genero', '$data_nascimento', '$cpf', '$nacionalidade', '$estado', '$cidade', '$pai', '$mae', '$conjuge', '$faccao', ";

    if ($foto_destino) {
        $sql .= "'$foto_destino')";
    } else {
        $sql .= "NULL)";
    }

    // Executa a query
    if (mysqli_query($conn, $sql)) {
        echo "Cadastro realizado com sucesso!";
        if ($foto_destino) {
            echo "<br><img src='$foto_destino' alt='Foto de $nome' style='max-width:200px; margin-top:10px;'>";
        }
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conn);
    }

} else {
    echo "Método inválido.";
}
?>
<a href="restrito.php">Ir para a área de cadastro</a>