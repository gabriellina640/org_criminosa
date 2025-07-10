<?php
include "validar.php";
include "conexao.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: lista.php");
    exit;
}

// Primeiro pega o nome da foto para apagar o arquivo depois
$sql = "SELECT foto FROM faccionado WHERE id_faccionado = $id";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $foto = $row['foto'];

    if (!empty($foto) && file_exists($foto)) {
        unlink($foto); // apaga a foto do servidor
    }
}

// Apaga o registro
$sql_del = "DELETE FROM faccionado WHERE id_faccionado = $id";
if (mysqli_query($conn, $sql_del)) {
    header("Location: lista.php?msg=excluido");
} else {
    echo "Erro ao excluir: " . mysqli_error($conn);
}
