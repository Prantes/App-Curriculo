<?php

$servidor = "localhost";
$usuario = "root";
$senha = '';
$dbname = "db_sos_cad";

//criar conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
?>

<?php

//Inicio da conexao com o banco de dados utilizando PDO
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "db_sos_cad";

    
try {
    //Conexao com a porta
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    //Conexao sem a porta
    $comm = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    
    //echo "Conexão com banco de dados realizado com sucesso.";
} catch (PDOException $err) {
    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}
    //Fim da conexão com o banco de dados utilizando PDO

    
?>