<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificando maior de idade</title>
</head>
<body>
    
    <form action="" method='post'>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required> <br>

        <label for="ano">Data de nascimento:</label>
        <input type="number" name="ano" required> <br>

        <!-- Botão de envio -->
        <button type="Submit">Verififcar</button>


    </form>
    

</body>
</html>

<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Recebe o ano
        $ano = $_POST['ano'];
        $nome = $_POST['nome'];
    }

    $idade = date(2025) - $ano;

   if ( $idade >= '18') {
   } else {
   
        $erro = "Acesso negado, $nome!";
    }

    if(isset($erro)) {
        echo"<p style= 'color: red';>$erro</p>";
    }



   

    $arquivo =fopen('log.acessos.txt', 'a');

        // Cria uma linha com nome e senha separados por ;
        $linha = $nome . ';' . $idade . "\n";

        // Insere a linha criada no arquivo (usuarios.txt)
        fwrite($arquivo, $linha);

        // Fecha o arquivo
        fclose($arquivo);

        // Mensagem de confirmação (Cadastro)
        echo "<p>Acesso permitido, $nome</p>";


?>