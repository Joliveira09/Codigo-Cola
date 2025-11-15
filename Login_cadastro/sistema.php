<?php
session_start();

// Verificar se o usuário NÃO está logado
if(!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    header('Location: login2.php');
    exit(); // IMPORTANTE: parar execução após redirect
}

// Se chegou aqui, usuário está logado
$logado = $_SESSION['email'];

// NÃO remova as variáveis da sessão aqui, senão o usuário será deslogado
// unset($_SESSION['email']); // REMOVA ESTA LINHA
// unset($_SESSION['senha']); // REMOVA ESTA LINHA
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download</title>
    <link rel="shortcut icon" href="../midias_pag_principal/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../estilo/style.css">
</head>
<body>
    <article class="image_com_text">
        <img src=".//fundo_download.png" alt="" class = "fundo_site_pronto">
        <div class = "text_image_download">
            <h1 class="home_h1">Download</h1>
            <button class="baixar">
            Baixar jogo</button>
        </div>
    </article>
    <footer class="footer_download">
        <p>© 2025 Gabriel Moreira, João Gabriel e Juan Pablo.</p>
    </footer>
</body>
</html>