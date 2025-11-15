<?php
if (isset($_GET['erro'])) {
    switch ($_GET['erro']) {
        case 'campos':
            echo "<p style='color: red; text-align: center;'>Preencha todos os campos.</p>";
            break;
        case 'sql':
            echo "<p style='color: red; text-align: center;'>Erro no servidor. Tente novamente.</p>";
            break;
        case 'credenciais':
            echo "<p style='color: red; text-align: center;'>Email ou senha incorretos.</p>";
            break;
        case 'acesso':
            echo "<p style='color: red; text-align: center;'>Acesso inválido ao login.</p>";
            break;
        }
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="../midias_pag_principal/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="midias_pag_principal/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="Box">
            <h1>Login</h1> 
            <form action="teste_login.php" method="POST">
            <div class="inputBox">
                <label for="Email" class="form-label"><i class="bi bi-envelope-fill"></i>Email</label>
                <input type="Email" name="email" id="Email" class="form-control" placeholder="Email">
            </div>
            <div class="inputBox">
                <label for="Senha" class="form-label"><i class="bi bi-lock-fill"></i>Senha</label>
                <input type="password" name="senha" id="Senha" class="form-control" placeholder="Senha">
            </div>
            <button type="submit" name="submit" id="submit" value="Enviar">Enviar</button>
            <p>Caso não tenha cadastro <a href="cadastro2.php">Clique aqui</a></p>
        </form>
    </div>
</body>
</html>