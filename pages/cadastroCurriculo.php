<?php
  session_start();

  If(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Curriculo</title>
</head>
<body>
    <h1>Cadastre seu curriculo</h1><hr><br>
    <form method="POST" action="processa2.php">
        <label><h1>Informações basicas</h1>Nome:</label>
        <!-- Cabeçalho com as primeiras informações -->
        <input type="text" name="nome" placeholder="Digite o nome completo"><br><br>
        
        <label>E-mail:</label>
        <input type="email" name="email" placeholder="Digite o seu melhor E-mail"><br><br>

        <label>Idade:</label>
        <input type="int" name="idade" placeholder="Digite sua idade"><br><br>

        <label>Telefone:</label>
        <input type="telelefone" name="telefone" placeholder="(xx) xxxx-xxxx"><br><br>

        <label>Endereço:</label>
        <input type="text" name="endereco" placeholder="Digite seu endereço"><br><br><hr><br>

        <!-- Dados pessoais -->
        <label><h1>Informações Pessoais</h1>Dados pessoais:</label>
        <textarea name="perfil"placeholder="Digite suas caracterias principais que te deferem dos outros candidatos a possivel vaga de trabalho"></textarea ><br><br>
        
        <label>Formação academica:</label>
        <textarea name="formacao" placeholder="Digite seu grau de formação. EX: Cursando 3° periodo de analise e desenvolvimento de sistemas"></textarea ><br><br><hr><br>

                    <!-- Experiencias -->
        <!--Experiencia 1-->
        <label><h1>Ultimas experiencias</h1>Cargo</label>
        <textarea name="cargo1" placeholder="Digite seu ultimo cargo"></textarea ><br><br>
        <label>Empresa:</label>
        <textarea name="empresa1" placeholder="Digite o nome da empresa"></textarea ><br><br>
        <label>Data Inicio</label>
        <input type="date" name="dataInicio1">
        <label>Data Fim</label>
        <input type="date" name="dataFim1"><br><br>
        <label>Experiencia:</label>
        <textarea name="experiencia1" placeholder="Digite sua penultima experiencia na area desejada, tente ser o maximo coeso e resumir todos seus afazeres"></textarea ><br><br><hr>
        
        <!--Experiencia 2-->
        <label>Cargo</label>
        <textarea name="cargo2" placeholder="Digite seu ultimo cargo"></textarea ><br><br>
        <label>Empresa:</label>
        <textarea name="empresa2" placeholder="Digite o nome da empresa"></textarea ><br><br>
        <label>Data Inicio</label>
        <input type="date" name="dataInicio2">
        <label>Data Fim</label>
        <input type="date" name="dataFim2"><br><br>
        <label>Experiencia:</label>
        <textarea name="experiencia2" placeholder="Digite sua penultima experiencia na area desejada, tente ser o maximo coeso e resumir todos seus afazeres"></textarea ><br><br><hr>

        <!--Experiencia 3-->
        <label>Cargo</label>
        <textarea name="cargo3" placeholder="Digite seu ultimo cargo"></textarea ><br><br>
        <label>Empresa:</label>
        <textarea name="empresa3" placeholder="Digite o nome da empresa"></textarea ><br><br>
        <label>Data Inicio</label>
        <input type="date" name="dataInicio3">
        <label>Data Fim</label>
        <input type="date" name="dataFim3"><br><br>
        <label>Experiencia:</label>
        <textarea name="experiencia3" placeholder="Digite sua penultima experiencia na area desejada, tente ser o maximo coeso e resumir todos seus afazeres"></textarea ><br><br><hr>

        <!-- Atividades complementares -->
        <label><h1>Atividades Complementares</h1>Atividades Complementares:</label>
        <textarea name="atividade1" placeholder="Digite uma atividade complementar a sua vaga desejada. EX: um curso na area"></textarea ><br><br>
        
        <label>Atividades Complementares 2:</label>
        <textarea name="atividade2" placeholder="Digite uma atividade complementar a sua vaga desejada. EX: um curso na area"></textarea ><br><br>

        <label>Atividades Complementares 3:</label>
        <textarea name="atividade3" placeholder="Digite uma atividade complementar a sua vaga desejada. EX: um curso na area"></textarea ><br><br>

        

      <input type="submit" value="Gerar">
        
    </form>

</body>
</html>