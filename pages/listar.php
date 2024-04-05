<?php
    session_start();
    include_once ("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Cadastros</title>
</head>
<body>
    
    <?php
    //receber o numero da página
        $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
            $pagina = (!empty($pagina_atual))? $pagina_atual : 1;
//setar a quantidade de itens por página
    $qnt_result_pg = 5;
//calcular o inicio da vizualização
$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

//listagem de dados que vem do banco de dados 
    $result_usuarios ="SELECT * FROM usuarios LIMIT $inicio,$qnt_result_pg ";
    $resultado_usuarios = mysqli_query($conn, $result_usuarios);
    while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
            echo "ID:". $row_usuario['id'] . "<br>";
            echo "Nome:". $row_usuario['nome'] . "<br>";
            echo "Sobre Nome:". $row_usuario['sobrenome'] . "<br>";
            echo "Tel:". $row_usuario['number'] . "<br>";
            echo "Email:". $row_usuario['email'] . "<br><br><hr>";
    }

    //Página - Somar a quantidade de usuários
    $result_pg = "SELECT COUNT(id)AS num_result FROM usuarios";
    $resultado_pg = mysqli_query ($conn, $result_pg);
    $row_pg = mysqli_fetch_assoc($resultado_pg);
    //echo $row_pg['num_result'];
    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

    //Limitar os links antes e depois
    $max_links = 2;
    echo"<a href='listar.php?pagina=1'> Primeira página";
    for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina -1; $pag_ant++){
        if($pag_ant >=1){
            echo"<a href='listar.php?pagina= $pag_ant'> $pag_ant" ;
        }
        
    }
    echo "$pagina";

    for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
        if($pag_dep <= $quantidade_pg){
            echo"<a href='listar.php?pagina= $pag_dep'> $pag_dep" ;
        }
        
    }

    echo"<a href='listar.php?pagina= $quantidade_pg'> Ultima Página";
    ?>
</body>
</html>