<?php
require_once __DIR__ . '/config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = trim($_POST['email'] ?? '');
  $senha = $_POST['senha'] ?? '';
  if ($email === '' || $senha === '') { header('Location: login.html'); exit; }

  try {
    $conn = db();
    $stmt = $conn->prepare('SELECT id, nome, email, senha FROM usuarios WHERE email=? LIMIT 1');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $res = $stmt->get_result();
    $user = $res->fetch_assoc();

    if ($user && password_verify($senha, $user['senha'])) {
      $_SESSION['usuario'] = ['id'=>$user['id'],'nome'=>$user['nome'],'email'=>$user['email']];
      header('Location: index.php'); exit;
    } else {
      $_SESSION['erro_login'] = 'E-mail ou senha inválidos.';
      header('Location: login.html?erro=senha_errada'); exit;
    }
  } catch (Throwable $e) {
    error_log('Erro login: ' . $e->getMessage());
    $_SESSION['erro_login'] = 'Erro de sistema.';
    header('Location: login.html?erro=erro_sistema'); exit;
  }
} else { header('Location: login.html'); exit; }
?>