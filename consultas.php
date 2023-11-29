<?php

session_start();

include_once("conexao.php");

$filtro = isset($_GET['filtro'])?$_GET['filtro'] :"";

//$sql = "select * from usuarios";
$sql = "select * from usuarios where profissao like '%$filtro%' ";
$consulta = mysqli_query($conexao, $sql);
$registros = mysqli_num_rows($consulta);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Cadastro - Consultas</title>
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
            <h1 class="title">Consultas</h1>
            <hr><br>

            <?php 
            if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            }
                
            ?>

            <form method="get" action="" class="form">
                Filtrar por profissão: <input type="text" name="filtro" class="campo" required autofocus>
                <input type="submit" value="Pesquisar" class="btn">
            </form>

            <div class="print">
            <?php
            
            echo "Resultado da pesquisa com a palavra <b>$filtro</b><br><br>";

            echo "$registros registros encontrados.";

            echo "<br><br>";

            while($row_usuario = mysqli_fetch_assoc($consulta)) {

                //$codigo = $exibirRegistros;
                //$nome = $exibirRegistros;
                //$email = $exibirRegistros;
                //$profissao = $exibirRegistros;
                
                echo "<article>";
                
                echo"<b>Código: </b>" . $row_usuario['codigo'] . "</b><br>";
                echo"<b>Nome: </b>" . $row_usuario['nome'] . "<br>";
                echo"<b>Email: </b>" . $row_usuario['email'] . "<br>";
                echo"<b>Profissão: </b>" . $row_usuario['profissao'] . "<br>";
                
                echo"<ul class='menu2'>";
                echo"<div class='divA'>";
                echo"<a class='caminho' href='editar.php?codigo=" . $row_usuario['codigo'] . "'><li>Editar</li></a>";
                echo"</div>";
                echo"<div class='divB'>";
                echo"<a class='caminho' href='processo-excluir.php?codigo=" . $row_usuario['codigo'] . "'><li>Excluir</li></a>";
                echo"</div>";
                echo"</ul>";

                echo "</article>";

            }

            mysqli_close($conexao);

            ?>
            </div>
        </section>
    </div>
</body>
</html>