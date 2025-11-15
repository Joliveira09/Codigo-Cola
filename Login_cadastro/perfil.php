<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    die('Acesso negado. <a href="login.html">Faça login</a>.');
}

echo 'Olá, ' . htmlspecialchars($_SESSION['user_nome']) . '! Bem-vindo ao seu perfil.';
?>
