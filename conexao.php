<?php
$server = "localhost";
$user = "root";
$pass = "1234";
$bd = "organização_criminosa";

$conn = mysqli_connect($server, $user, $pass, $bd);

if (!$conn) {
    die("Erro na conexão: " . mysqli_connect_error());
}
// conexão ok, não imprime nada aqui para não quebrar redirecionamento
?>
