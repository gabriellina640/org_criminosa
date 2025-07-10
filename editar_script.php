<?php
include "validar.php";
include "conexao.php";

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

// Tratar foto (se enviou nova)
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $foto_nome = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $foto_destino = "img/" . $foto_nome;

    if (move_uploaded_file($foto_tmp, $foto_destino)) {
        $foto_sql = ", foto='$foto_destino'";
    } else {
        // Falha no upload, não altera a foto
        $foto_sql = "";
    }
} else {
    // Não enviou nova foto
    $foto_sql = "";
}

$sql = "UPDATE faccionado SET
    nome='$nome',
    genero='$genero',
    data_nascimento='$data_nascimento',
    CPF='$cpf',
    nacionalidade='$nacionalidade',
    estado='$estado',
    cidade='$cidade',
    pai='$pai',
    mae='$mae',
    conjuge='$conjuge',
    faccao='$organizacao'
    $foto_sql
    WHERE id_faccionado=$id";

if (mysqli_query($conn, $sql)) {
    header("Location: lista.php?msg=editado");
} else {
    echo "Erro ao atualizar: " . mysqli_error($conn);
}
