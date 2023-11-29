<?php

session_start();

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
            <h1 class="title">Cadastros de Usuários</h1>
            <hr><br>

            <?php 
            if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            }
                
            ?>

            <form method="post" action="processa.php" class="formulario">
            <!--<input type="submit" value="Salvar" class="btn">
                <input type="reset" value="Limpar" class="btn">
                <br><br>-->

                Nome<br>
                <input type="text" name="nome" class="campo" maxlength="40" style="text-align:center" required autofocus><br>
                Email<br>
                <input type="email" name="email" class="campo" maxlength="100" style="text-align:center" required><br>
                Profissão<br>
                <input type="text" name="profissao" class="campo" maxlength="100" style="text-align:center" required><br><br>

                <input type="submit" value="Salvar" class="btn">
                <input type="reset" value="Limpar" class="btn">
                <br>
                
                
            </form>
        </section>
    </div>
</body>
</html>