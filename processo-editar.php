<?php 

session_start();
include_once("conexao.php");

$codigo = filter_input(INPUT_POST,'codigo', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
$profissao= filter_input(INPUT_POST,'profissao', FILTER_SANITIZE_SPECIAL_CHARS);

$sql = "UPDATE usuarios SET nome='$nome', email='$email', profissao='$profissao', modified=NOW() WHERE codigo='$codigo'";
$consulta = mysqli_query($conexao, $sql);

if(mysqli_affected_rows($conexao)){
    $_SESSION["msg"] = "<p style='margin-left:10px;'> <b>Usuário editado com sucesso!</b></p><br>";
    header("Location: consultas.php");
} else {
    $_SESSION["msg"] = "<p style='margin-left:10px;'> <b>Não foi possível editar.</b></p><br>";
    header ("Location: editar.php?codigo=$codigo");
}

?>


