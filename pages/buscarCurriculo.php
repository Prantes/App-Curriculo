<?php
session_start();
// Incluir conexao com BD
include_once('./conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Download Curriculo</title>
</head>

<body>

    <h1>Porfavor digite seu email para buscar seu Curriculo</h1>

    <?php
    // Receber os dados do formulário
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    ?>

    <?php
    // Criar a variável que deve receber o termo pesquisado
    // A variável é utilizada para enviar dados para a página gerar PDF e também manter o valor no formulário
    $texto_pesquisar = "";

    // Verificar se existe termo pesquisado, existindo acessa o IF e atribui o valor na variável $texto_pesquisar
    if (isset($dados['texto_pesquisar'])) {
        $texto_pesquisar = $dados['texto_pesquisar'];
    }

    // Link para gerar PDF e também enviar o termo de pesquisa
   
    ?>


    <form method="POST" action="">
        <label>Pesquisar</label>
        <!-- Campo para pesquisa o termo -->
        <input type="text" name="texto_pesquisar" placeholder="Digite seu email" value="<?php echo $texto_pesquisar; ?>"><br><br>

        <input type="submit" value="Pesquisar" name="PesqUsuario"><br><br>

    </form>

    <?php
    // Acessa o IF quando o usuário clicar no botão pesquisar
    if (!empty($dados['PesqUsuario'])) {
        // Acrescentar no termo de pesquisa "%" para usar no LIKE e indica que pode ter caracteres antes e depois do termo pesquisado
        $email = $dados['texto_pesquisar'];

        // QUERY para recuperar os registros do banco de dados
        $query_usuarios = "SELECT id,email,idade,nome,endereco,telefone,perfil,cargo1,empresa1,dataInicio1,dataFim1,experiencia1,cargo2,empresa2,dataInicio2,dataFim2,experiencia2,cargo3,empresa3,dataInicio3,dataFim3,experiencia3,atividade1,atividade2,atividade3,formacao
                FROM formulario
                WHERE email LIKE :email
                ORDER BY id DESC";

        // Prepara a QUERY
        $result_usuarios = $comm->prepare($query_usuarios);

        // Substituir o link da QUERY pelo termo de pesquisa
        $result_usuarios->bindParam(':email', $email);

        // Executar a QUERY
        $result_usuarios->execute();

        // Acessa o IF quando encontrar registro no BD
        if (($result_usuarios) and ($result_usuarios->rowCount() != 0)) {

            // Ler os registros retornado do BD
            while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {

                // Extrair o array para imprimir pela chave do array
                extract($row_usuario);

                // Imprimir os dados usando a chave do array como variável em função do extract executado acima
                echo "ID: $id <br>";
                echo "Nome: $nome <br>";
                echo "E-mail: $email <br>";
                echo "<hr>";
                echo "<a href='gerar_pdf.php?texto_pesquisar=$texto_pesquisar'>Download Curriculo</a><br><br>";
            }
        } else { // Acessa o ELSE quando não encontrar nenhum registro no banco de dados
            echo "<p style='color: #f00;'>Erro: Nenhum usuário encontrado!</p>";
        }
    }
    ?>

</body>

</html>