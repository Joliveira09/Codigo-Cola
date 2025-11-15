<?php
include_once 'config.php'; // deve definir $conexao (mysqli)

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $nome  = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if ($nome === '' || $email === '' || $senha === '') {
        die('Preencha todos os campos.');
    }

    // Verifica se email já existe
    $check = $conexao->prepare("SELECT id FROM usuarios WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $check->close();
        $conexao->close();
        header("Location: cadastro2.php");
        exit();
    }
    $check->close();

    // INSERE senha em texto puro (NÃO RECOMENDADO PARA PROD)
    $stmt = $conexao->prepare("INSERT INTO usuarios (nome, email, senha_hash) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {
    header("Location: login2.php");
    exit;
}

    $stmt->close();
    $conexao->close();
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>    
    <link rel="stylesheet" href="cadastro.css">
    <link rel="shortcut icon" href="../midias_pag_principal/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">   
    <link rel="shortcut icon" href="midias_pag_principal/favicon.ico" type="image/x-icon">
</head>
<body>
        <div class="box">
            <form action = "cadastro2.php" method="post">
                <fieldset>
                    <h1 class="text-light">Cadastro</h1>
                    <div class="inputBox">
                        <label for="nome" class="form-label"><i class="bi bi-person-fill"></i>Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control" required placeholder="Nome completo">
                    </div>
                    <div class="inputBox">
                        <label for="email" class="form-label"><i class="bi bi-envelope-fill"></i>Email</label>
                        <input type="email" name="email" id="email" class="form-control" required placeholder="Email">
    
                    </div>
                    <label for="senha" class="form-label"><i class="bi bi-lock-fill"></i>Senha</label>
                    <div class="inputBox">
                        <input type="password"
                        name="senha"
                        id="senha"
                        class="form-control"
                        required placeholder="Criar senha">
                    </div>
                    <input type="submit" name="submit" id="submit" class="botao" value="Cadastrar">
                </fieldset>
            </form>
        </div>
</body>
</html>