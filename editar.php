<?php
$pdo = new PDO("mysql:host=localhost;dbname=clientes", "root", "");

$id = $_GET['id'];
$sql = "SELECT * FROM clientes WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$cliente = $stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Editar Cliente</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Editar Cliente</h1>
<form action="atualizar.php" method="POST">
  <input type="hidden" name="id" value="<?= $cliente['id'] ?>">
  <input type="text" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" required><br>
  <input type="email" name="email" value="<?= htmlspecialchars($cliente['email']) ?>" required><br>
  <input type="text" name="telefone" value="<?= htmlspecialchars($cliente['telefone']) ?>" required><br>
  <button type="submit">Atualizar</button>
</form>

<button class="theme-toggle" onclick="toggleTheme()">Trocar Tema</button>

<script>
  function toggleTheme() {
    document.body.classList.toggle("dark");
    localStorage.setItem("tema", document.body.classList.contains("dark") ? "dark" : "light");
  }

  window.onload = () => {
    if (localStorage.getItem("tema") === "dark") {
      document.body.classList.add("dark");
    }
  };
</script>

</body>
</html>
