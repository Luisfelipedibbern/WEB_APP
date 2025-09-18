<?php
echo "<script>alert('Teste')";
require_once __DIR__ . '/config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = trim($_POST['nome'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $senha = $_POST['senha'] ?? '';
  if ($nome === '' || $email === '' || $senha === '') {
    header('Location: cadastro.html');
    exit;
  }
  try {
    $conn = db();
    $stmt = $conn->prepare('SELECT id FROM usuarios WHERE email=? LIMIT 1');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    if ($stmt->get_result()->fetch_assoc()) {
      $_SESSION['cadastro_msg'] = 'E-mail já cadastrado.';
      header('Location: cadastro.html');
      exit;
    }
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    $stmt = $conn->prepare('INSERT INTO usuarios(nome,email,senha) VALUES(?,?,?)');
    $stmt->bind_param('sss', $nome, $email, $hash);
    $stmt->execute();
    $_SESSION['cadastro_msg'] = 'Conta criada! Faça login.';
    header('Location: index.php');
    exit;
  } catch (Throwable $e) {
    error_log('Erro cadastro:' . $e->getMessage());
    $_SESSION['cadastro_msg'] = 'Erro de sistema.';
    header('Location: cadastro.html');
    exit;
  }
} else {
  header('Location: cadastro.html');
  exit;
}
