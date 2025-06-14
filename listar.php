<?php
// Conexão com o banco
$pdo = new PDO("mysql:host=localhost;dbname=clientes", "root", "");

// Consulta os dados
$resultado = $pdo->query("SELECT * FROM clientes");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Lista de Clientes</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <h1>Clientes Cadastrados</h1>
  <button class="theme-toggle" onclick="toggleTheme()">Trocar Tema</button>
  <a href="index.html">Novo Cadastro</a>

  <?php foreach($resultado as $linha): ?>
  <div class="cliente-card">
    <strong>Nome:</strong> <?= htmlspecialchars($linha['nome']) ?><br>
    <strong>Email:</strong> <?= htmlspecialchars($linha['email']) ?><br>
    <strong>Telefone:</strong> <?= htmlspecialchars($linha['telefone']) ?><br><br>

    <a href="editar.php?id=<?= $linha['id'] ?>" style="color: orange;">Editar</a> |
    <a href="excluir.php?id=<?= $linha['id'] ?>" style="color: red;" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
  </div>
<?php endforeach; ?>

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
