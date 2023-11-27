<?php

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
            <h1>Consultas</h1>
            <hr><br>

            <form method="get" action="">
                Filtrar por profissão: <input type="text" name="filtro" class="campo" required autofocus>
                <input type="submit" value="Pesquisar" class="btn">
            </form>

            <?php

            print "Resultado da pesquisa com a palavra <b>$filtro</b><br><br>";

            print "$registros registros encontrados.";

            print "<br><br>";

            while($exibirRegistros = mysqli_fetch_array($consulta)) {

                $codigo = $exibirRegistros[0];
                $nome = $exibirRegistros[1];
                $email = $exibirRegistros[2];
                $profissao = $exibirRegistros[3];
                
                print "<article>";
                
                print"id: <b>$codigo</b><br>";
                print"Nome: $nome<br>";
                print"Email: $email<br>";
                print"Profissão: $profissao";
                
                print "</article>";

            }

            mysqli_close($conexao);

            ?>

        </section>
    </div>
</body>
</html>