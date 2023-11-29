<?php 

session_start();
include_once("conexao.php");

$codigo = filter_input(INPUT_GET,"codigo", FILTER_SANITIZE_NUMBER_INT);
$sql = "SELECT * FROM usuarios WHERE codigo = '$codigo'";
$consulta = mysqli_query($conexao, $sql);
$row_usuario = mysqli_fetch_assoc($consulta);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Cadastro - Editar</title>
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
            <h1 class="title">Editar Usuário</h1>
            <hr><br>
           
            <?php 

            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
                
            ?>

            <form method="post" action="processo-editar.php" class="formulario">
                <input type="submit" value="Salvar" class="btn">
                    <!-- <script src="alerta.js"></script> -->
                <input type="button" value="Voltar" class="btn" onClick="history.go(-2)"> 
                    
                <br><br>

                <input type="hidden" name="codigo" value="<?php echo $row_usuario['codigo']; ?>"><br>
                Nome<br>
                <input type="text" name="nome" class="campo" maxlength="40" value="<?php echo $row_usuario['nome']; ?>" required><br>
                Email<br>
                <input type="email" name="email" class="campo" maxlength="100" value="<?php echo $row_usuario['email']; ?>" required><br>
                Profissão<br>
                <input type="text" name="profissao" class="campo" maxlength="100" value="<?php echo $row_usuario['profissao']; ?>"required><br>

            </form>

            <?php

            /*echo "$registros registros encontrados.";

            echo "<br><br>";

            while($exibirRegistros = mysqli_fetch_array($consulta)) {

                $codigo = $exibirRegistros[0];
                $nome = $exibirRegistros[1];
                $email = $exibirRegistros[2];
                $profissao = $exibirRegistros[3];
                
                echo "<article>";
                
                echo"id: <b>$codigo</b><br>";
                echo"Nome: $nome<br>";
                echo"Email: $email<br>";
                echo"Profissão: $profissao";
                
                echo"<a href='excluir.php?codigo=" . $registros['codigo'] . "'>Exluir</a><br><hr>";
                
                echo "</article>";

            }

            mysqli_close($conexao);*/

            ?>
            </div>
        </section>
    </div>
</body>
</html>