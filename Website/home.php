<?php
session_start();
include 'config.php'; // Inclua o arquivo de configuração

// Consulta para obter o nome de usuário com base nas informações de autenticação
// Supondo que você tenha uma tabela chamada "usuarios" com uma coluna chamada "username"
$sql = "SELECT username, email FROM usuarios WHERE email = '" . $_SESSION['email'] . "'";

$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    // Se houver resultados, exiba o nome de usuário no HTML
    $row = $result->fetch_assoc();
    $username = $row["username"];
    $email = $row["email"]; // Recupera o email do resultado da consulta
} else {
    // Se nenhum resultado for encontrado, defina um valor padrão para o nome de usuário e email
    $username = "Nome de Usuário Padrão";
    $email = "Email Padrão";
}

$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p>Logo</p>
        </div>
        <div class="right-links">
            <a href="#">Change Profile</a>
            <a href="index.php"><button class="btnout">Logout</button></a>
        </div>
    </div>
    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hello<b> <?php echo $username; ?></b></p> 
                </div>
                <div class="box">
                    <p>Seu email é<b> <?php echo $email; ?></b></p> 
                </div>
            </div>
        </div>
    </main>
</body>
</html>
