<?php

include_once("conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$profissao = $_POST['profissao'];

$sql = "insert into usuarios (nome,email,profissao) values ('$nome','$email','$profissao')";
$salvar = mysqli_query($conexao, $sql);

$linhas = mysqli_affected_rows($conexao);

mysqli_close($conexao);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Inventário</title>
    <link rel="stylesheet" href="css/estilo-css.css">
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

            <div class="subtitle">
                <?php

                if ($linhas == 1){
                    echo "Cadastro efetuado com sucesso!";
                } else {
                    echo "Cadastro não efetuado. <br> Já existe um usuário com esse email.";
                }

                ?>
            </div>
        </section>
    </div>
</body>
</html>