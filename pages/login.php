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
    <script src="https://kit.fontawesome.com/6d3af73875.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../style.css">
    <title>Login</title>
</head>
<body>
    <div class="main-login">
        <div class="left-login">
            <h1>Faça Login<br>e estruture o seu <a href="../index.html">curriculo</a><h1>

            <img src="../img/login2.svg" class="left-login-image" alt="login animação">
            
        </div>
        <div class="right-login">
            
            <div class="card-login">
            <?php
                    if(isset($_SESSION['loginErro'])){
                    echo $_SESSION['loginErro'];
                    unset($_SESSION['loginErro']);
                    }
                    
                    If(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }


                    
                    ?>
                <h1>Login</h1>
                <form action="valida.php" method="POST">
                    <div class="textfield">
                        <label for="email">Usuário</label>
                        <input type="email" name="email" placeholder="usuario">
                    </div>
                    <div class="textfield">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Senha">
                    </div>
                    <a href=""><span >Esqueci minha senha</span></a>
                    <button class="btn-login" type="submit">Login</button>
                    <a href="cadastro.php">
                        <span>Cadastre-se</span>
                    </a>
                    <button class="btn-google"> <i class="fa-brands fa-google"></i>Conecte-se com o Google</button>
                    <button class="btn-linkedin"><i class="fa-brands fa-linkedin"></i>Conecte-se com o Linkedin</button>
                </form>
                
            </div>
        </div>
    </div>
</body>
</html>