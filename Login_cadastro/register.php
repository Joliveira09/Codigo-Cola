<?php
include_once('config.php'); // Chama o arquivo global do database
if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Verifica se os dados foram enviados pelo método POST
    // Pega os valores enviados de acordo com o name (esse nome é o mesmo que colocamos entre aspas no form URLSearchParams)
    $Nome  = $_POST['nome'] ?? '';
    $Email = $_POST['email'] ?? '';
    $Senha = $_POST['senha'] ?? '';

    // Se tiver campo vazio não será registrado
    if (!$Nome || !$Email || !$Senha) {
    echo('Preencha todos os campos.');
    exit
    }

    // Inserir no banco
    $SenhaHash = password_hash($Senha, PASSWORD_DEFAULT);
    $stmt = $conexao->prepare('INSERT INTO usuarios (nome, email, senha_hash) VALUES (?, ?, ?)');
    $stmt->bind_param('sss', $Nome, $Email, $SenhaHash);


    // Irá executar o código para inserir os dados
    if($stmt->execute()){
    echo 'Cadastro realizado com sucesso!';}
    else{
        echo 'nenhuma_linha_afetada';
    }
}
// Caso apareça essa mensagem, o método enviado usado foi GET
else{
    echo 'metodo_invalido';
}
?>
