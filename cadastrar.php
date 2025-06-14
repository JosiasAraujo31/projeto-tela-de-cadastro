<?php
$pdo = new PDO("mysql:host=localhost;dbname=clientes", "root", "");
$sql = "INSERT INTO clientes (nome, email, telefone) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['nome'], $_POST['email'], $_POST['telefone']]);
header("Location: listar.php");
?>
