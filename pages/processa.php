<?php
session_start();

include_once ("conexao.php");

$nome = filter_input (INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

$sobrenome = filter_input (INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);

$email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

$number = filter_input (INPUT_POST, 'number', FILTER_SANITIZE_STRING);

$senha = filter_input (INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

//echo "Nome:$nome <br>";
//echo "sobrenome:$sobrenome <br>";
//echo "E-mail:$email <br>";
//echo "Tel:$number <br>";
//echo "senha:$senha <br>";

$result_usuario = "INSERT INTO usuarios (nome, sobrenome, email, number, senha) 
                       VALUES ('$nome', '$sobrenome', '$email', '$number', md5('$senha') )";
                       
mysqli_query($conn, $result_usuario);


if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<br><span 
    
    style=
        'padding:10px; 
        background-color:#36f446;
        color: white;
        margin-bottom: 15px;
        maring-top: 10px;
        border-radius:10px;'
        >
    
    Usuario Cadastrado com sucesso
    
    </span>";
    header("Location: login.php");
}else{
    $_SESSION['msg'] = "<br><span 
    
    style=
        'padding:10px; 
        background-color:#f44336;
        color: white;
        margin-bottom: 15px;
        maring-top: 10px;
        border-radius:10px;'
        >
    
    Falha ao cadastrar usuário
    
    </span>";
    header("Location:cadastro.php");
}
?>

