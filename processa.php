<?php

session_start();

include_once("conexao.php");

/*$nome = $_POST['nome'];
$email = $_POST['email'];
$profissao = $_POST['profissao'];*/

$nome = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
$profissao= filter_input(INPUT_POST,'profissao', FILTER_SANITIZE_SPECIAL_CHARS);

$sql = "INSERT INTO usuarios (nome, email, profissao, created) VALUES ('$nome','$email','$profissao', NOW())";
$salvar = mysqli_query($conexao, $sql);

$row_usuario = mysqli_affected_rows($conexao);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Cadastro</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="conteiner">
        <nav>
            <ul class="menu">
                <a href="index.php"><li>Cadastro</li></a>
                <a href="consultas.php"><li>Consultas</li></a>
            </ul>
        </nav>
        <section>
            <h1 class="title">Confirmação de Cadastro</h1>
            <hr><br><br>

            <?php 
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
                
            ?>

            <div class="subtitle">
                <?php

                if (mysqli_insert_id($conexao)){
                    $_SESSION['msg'] = "<p style='margin-left:10px;'> <b>Cadastro efetuado com sucesso!</b></p><br>";
                    header("Location: index.php");
                } else {
                    $_SESSION['msg'] = "<p style='margin-left:10px;'> <b>Cadastro não efetuado. <br>Já existe um usuário com esse email.</b></p><br>";
                    header("Location: index.php");
                }

                mysqli_close($conexao);

                ?>
            </div>
        </section>
    </div>
</body>
</html>