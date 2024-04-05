<?php

// Carregar o Composer
require './vendor/autoload.php';

// Receber da URL o termo usado para pesquisar
$texto_pesquisar = filter_input(INPUT_GET, 'texto_pesquisar', FILTER_DEFAULT);

// Acrescentar no termo de pesquisa "%" para usar no LIKE e indica que pode ter caracteres antes e depois do termo pesquisado
$email = $texto_pesquisar;

// Incluir conexao com BD
include_once './conexao.php';

// QUERY para recuperar os registros do banco de dados
$query_usuarios = "SELECT email,idade,nome,endereco,telefone,perfil,cargo1,empresa1,dataInicio1,dataFim1,experiencia1,cargo2,empresa2,dataInicio2,dataFim2,experiencia2,cargo3,empresa3,dataInicio3,dataFim3,experiencia3,atividade1,atividade2,atividade3,formacao
                FROM formulario
                WHERE email LIKE :email
                ORDER BY id DESC";

// Prepara a QUERY
$result_usuarios = $comm->prepare($query_usuarios);

// Substituir o link da QUERY pelo termo de pesquisa
$result_usuarios->bindParam(':email', $email);

// Executar a QUERY
$result_usuarios->execute();

// Informacoes para o PDF
$dados = "<!DOCTYPE html>";
$dados .= "<html lang='pt-br'>";
$dados .= "<head>";
$dados .= "<meta charset='UTF-8'>";
$dados .= "<link rel='stylesheet' href='http://localhost/celke/css/custom.css'";
$dados .= "<title>Download Curriculo</title>";
$dados .= "</head>";
$dados .= "<body>";
//$dados .= "<h1>$nome</h1>";

// Ler os registros retornado do BD
while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
    
    // Extrair o array para imprimir pela chave do array
    extract($row_usuario);

    // Imprimir os dados usando a chave do array como variável em função do extract executado acima
    //$dados .= "ID: $id <br>";

    //Cabeçalho do curriculo
    $dados .= "<h1> $nome </h1>";
    $dados .= "<h2>Contato</h2>";
    $dados .= "Telefone: $telefone <br>";
    $dados .= "E-mail: $email <br>";
    $dados .= "Idade: $idade anos<br>";
    $dados .= "Endereço: $endereco <br>";
    $dados .= "<hr>";

    //dados pessoais e formação academica
    $dados .= "<h1> Dados pessoais </h1>";
    $dados .= "$perfil <br>";
    $dados .= "<h2> Formação academica </h2><br>";
    $dados .= "$formacao";
    $dados .= "<hr>";
    
    //Experiencia profissional 1
    $dados .= "<h1> Resumo de carreira </h1>";
    $dados .= " $cargo1 <br>";
    $dados .= "$empresa1 <br>";
    $dados .= "$dataInicio1 <br>";
    $dados .= "$dataFim1 <br>";
    $dados .= "$experiencia1 <br>";
    $dados .= "<hr>";

    //experiecnia 2
    $dados .= "$cargo2 <br>";
    $dados .= "$empresa2 <br>";
    $dados .= "$dataInicio2 <br>";
    $dados .= "$dataFim2 <br>";
    $dados .= "$experiencia2 <br><br>";
    $dados .= "<hr><br>";

    //experiencia3
    $dados .= " $cargo3 <br>";
    $dados .= "$empresa3 <br>";
    $dados .= "$dataInicio3 <br>";
    $dados .= "$dataFim3 <br>";
    $dados .= "$experiencia3 <br>";
    $dados .= "<hr>";


    //Atividades Complementares
    $dados .= "<h2> Atividades Complementares </h2>";
    $dados .= "$atividade1 <br>";
    $dados .= "$atividade2 <br>";
    $dados .= "$atividade3 <br>";
}
$dados .= "</body>";
$dados .= "</html>";

// Referenciar o namespace Dompdf
use Dompdf\Dompdf;

// Instanciar e usar a classe dompdf
$dompdf = new Dompdf(['enable_remote' => true]);

// Instanciar o metodo loadHtml e enviar o conteudo do PDF
$dompdf->loadHtml($dados);

// Configurar o tamanho e a orientacao do papel
// landscape - Imprimir no formato paisagem
//$dompdf->setPaper('A4', 'landscape');
// portrait - Imprimir no formato retrato
$dompdf->setPaper('A4', 'portrait');

// Renderizar o HTML como PDF
$dompdf->render();

// Gerar o PDF
$dompdf->stream();
