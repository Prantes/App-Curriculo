<?php
    session_start();
    include_once ("conexao.php");

    if((isset($_POST['email']))&&(isset($_POST['senha']))){
    $email = mysqli_real_escape_String ($conn,$_POST['email']); //Escapas de caracteres especiais, como aspas precendo SQL injection
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    $senha = md5 ($senha);

        $sql ="SELECT * FROM usuarios WHERE email = '$email' && senha ='$senha' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $resultado = mysqli_fetch_assoc ($result);


    if(empty($resultado)){
        $_SESSION['loginErro'] = "<br><span 
    
        style=
            'padding:10px; 
            background-color:#f44336;
            color: white;
            margin-bottom: 15px;
            maring-top: 10px;
            border-radius:10px;'
            >
        
            Usuário ou senha inválido 
        
        </span>";
        header("Location: login.php");
        
    }elseif(isset($resultado)){
        header("Location: cadastroCurriculo.php");

    }else{
        $_SESSION['loginErro'] = "<br><span 
    
        style=
            'padding:10px; 
            background-color:#f44336;
            color: white;
            margin-bottom: 15px;
            maring-top: 10px;
            border-radius:10px;'
            >
        
            Usuário ou senha inválido 
        
        </span>";
        header("Location:login.php");
    }

    }else{
        $_SESSION['loginErro'] = "Usuário ou Senha inválido";
        header("location:login.php");

    }


?>