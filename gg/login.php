<?php
session_start();

// Conexão com o banco
$host = "localhost";
$user = "root";
$pass = "";
$db = "estetica";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Erro na conexão: " . $conn->connect_error);
}

// Recebe dados do formulário
$username = $_POST['username'];
$senha = $_POST['password'];

// Busca usuário no banco
$sql = "SELECT * FROM usuarios WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
  $user = $result->fetch_assoc();
  
  // Verifica a senha
  if (password_verify($senha, $user['senha'])) {
    $_SESSION['usuario'] = $user['username'];
    header("Location: dashboard.html");
    exit;
  } else {
    echo "Senha incorreta.";
  }
} else {
  echo "Usuário não encontrado.";
}

$conn->close();
?>