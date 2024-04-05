<?php
include_once("conexao.php");

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$idade = filter_input(INPUT_POST, 'idade');
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone',);

$perfil = filter_input(INPUT_POST, 'perfil', FILTER_SANITIZE_STRING);
$formacao = filter_input(INPUT_POST, 'formacao', FILTER_SANITIZE_STRING);

$cargo1 = filter_input(INPUT_POST, 'cargo1', FILTER_SANITIZE_STRING);
$empresa1 = filter_input(INPUT_POST, 'empresa1', FILTER_SANITIZE_STRING);
$dataInicio1 = filter_input(INPUT_POST, 'dataInicio1', FILTER_SANITIZE_STRING);
$dataFim1 = filter_input(INPUT_POST, 'dataFim1', FILTER_SANITIZE_STRING);
$experiencia1 = filter_input(INPUT_POST, 'experiencia1', FILTER_SANITIZE_STRING);

$cargo2 = filter_input(INPUT_POST, 'cargo2', FILTER_SANITIZE_STRING);
$empresa2 = filter_input(INPUT_POST, 'empresa2', FILTER_SANITIZE_STRING);
$dataInicio2 = filter_input(INPUT_POST, 'dataInicio2', FILTER_SANITIZE_STRING);
$dataFim2 = filter_input(INPUT_POST, 'dataFim2', FILTER_SANITIZE_STRING);
$experiencia2 = filter_input(INPUT_POST, 'experiencia2', FILTER_SANITIZE_STRING);

$cargo3 = filter_input(INPUT_POST, 'cargo3', FILTER_SANITIZE_STRING);
$empresa3 = filter_input(INPUT_POST, 'empresa3', FILTER_SANITIZE_STRING);
$dataInicio3 = filter_input(INPUT_POST, 'dataInicio3', FILTER_SANITIZE_STRING);
$dataFim3 = filter_input(INPUT_POST, 'dataFim3', FILTER_SANITIZE_STRING);
$experiencia3 = filter_input(INPUT_POST, 'experiencia3', FILTER_SANITIZE_STRING);

$atividade1 = filter_input(INPUT_POST, 'atividade1', FILTER_SANITIZE_STRING);
$atividade2 = filter_input(INPUT_POST, 'atividade2', FILTER_SANITIZE_STRING);
$atividade3 = filter_input(INPUT_POST, 'atividade3', FILTER_SANITIZE_STRING);

$result_usuarios = "INSERT INTO formulario (email,idade,nome,endereco,telefone,perfil,cargo1,empresa1,dataInicio1,dataFim1,experiencia1,cargo2,empresa2,dataInicio2,dataFim2,experiencia2,cargo3,empresa3,dataInicio3,dataFim3,experiencia3,atividade1,atividade2,atividade3,formacao) VALUES ('$email','$idade','$nome','$endereco','$telefone','$perfil','$cargo1','$empresa1','$dataInicio1','$dataFim1','$experiencia1','$cargo2','$empresa2','$dataInicio2','$dataFim2','$experiencia2','$cargo3','$empresa3','$dataInicio3','$dataFim3','$experiencia3','$atividade1','$atividade2','$atividade3','$formacao')";

$resultado_usuario = mysqli_query($conn, $result_usuarios);



if(mysqli_insert_id($conn)){
    header("Location: buscarCurriculo.php");
    $_SESSION['msg'] = "<br><span 
   
   
    Usuario Cadastrado com sucesso
    
    </span>";
    
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