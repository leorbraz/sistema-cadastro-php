<?php 

session_start();
include_once("conexao.php");

$codigo = filter_input(INPUT_GET, 'codigo', FILTER_SANITIZE_NUMBER_INT);
$sql = "DELETE FROM usuarios WHERE codigo='$codigo'";

$consulta = mysqli_query($conexao, $sql);

if(mysqli_affected_rows($conexao)){
    $_SESSION["msg"] = "<p style='margin-left:10px;'> <b>Usuário excluído com sucesso!</b></p><br>";
    header("Location: consultas.php");
} else {
    $_SESSION["msg"] = "<p style='margin-left:10px;'> <b>Não foi possível excluir o usuário.</b></p><br>";
    header ("Location: consultas.php");
}

?>