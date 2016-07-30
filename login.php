<?php

include "includes/database-conn.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

if(empty($email) || empty($senha)) {
    header('location: index.php?err=Os campos email e senha precisam ser preenchidos.');
    exit;
}

// consulta pessoas
$query = $pdo->prepare("select * from pessoas where email = :email and senha = :senha");
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->bindParam(':senha', $senha, PDO::PARAM_STR);
$query->execute();

$pessoa = $query->fetch(PDO::FETCH_ASSOC);

if(is_array($pessoa)) {
    $_SESSION['usuario'] = $pessoa;
    header('location: listagem-pessoas.php');
} else {
    header('location: index.php?err=Login ou senha invalidos.');
}
