<?php
include "validar.php";
include "conexao.php";

// Dados do formulário
$id = $_POST['id'];
$nome = $_POST['nome'];
$genero = $_POST['genero'];
$data_nascimento = $_POST['data_nascimento'];
$cpf = $_POST['cpf'];
$nacionalidade = $_POST['nacionalidade'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$pai = $_POST['pai'];
$mae = $_POST['mae'];
$conjuge = $_POST['conjuge'];
$organizacao = $_POST['organizacao'];

$foto_sql = ""; // Inicializa

// Verifica se enviou nova foto
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
    $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
    $foto_nome = uniqid("img_", true) . "." . $extensao; // Garante nome único
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $foto_destino = "img/" . $foto_nome;

    // Verifica se diretório existe
    if (!is_dir("img")) {
        mkdir("img", 0755, true);
    }

    if (move_uploaded_file($foto_tmp, $foto_destino)) {
        $foto_sql = ", foto = '$foto_destino'";
    }
}

// Monta a query de atualização
$sql = "UPDATE faccionado SET
    nome = '$nome',
    genero = '$genero',
    data_nascimento = '$data_nascimento',
    CPF = '$cpf',
    nacionalidade = '$nacionalidade',
    estado = '$estado',
    cidade = '$cidade',
    pai = '$pai',
    mae = '$mae',
    conjuge = '$conjuge',
    faccao = '$organizacao'
    $foto_sql
    WHERE id_faccionado = $id";

// Executa
if (mysqli_query($conn, $sql)) {
    header("Location: lista.php?msg=editado");
    exit;
} else {
    echo "Erro ao atualizar: " . mysqli_error($conn);
}
