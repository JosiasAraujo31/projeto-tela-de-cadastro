<?php
$pdo = new PDO("mysql:host=localhost;dbname=clientes", "root", "");

$id = $_GET['id'];
$sql = "DELETE FROM clientes WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header("Location: listar.php");
?>
