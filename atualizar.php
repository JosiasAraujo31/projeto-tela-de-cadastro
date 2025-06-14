<?php
$pdo = new PDO("mysql:host=localhost;dbname=clientes", "root", "");

$sql = "UPDATE clientes SET nome = ?, email = ?, telefone = ? WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([
  $_POST['nome'],
  $_POST['email'],
  $_POST['telefone'],
  $_POST['id']
]);

header("Location: listar.php");
?>
