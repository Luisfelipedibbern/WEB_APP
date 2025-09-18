<?php
require_once __DIR__ . '/config.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: esqueceu.html'); exit; }

$email = trim($_POST['email'] ?? '');
if ($email === '') { header('Location: esqueceu.html'); exit; }

try {
  $conn = db();
  // check user
  $stmt = $conn->prepare('SELECT id, nome FROM usuarios WHERE email=? LIMIT 1');
  $stmt->bind_param('s', $email); $stmt->execute();
  $user = $stmt->get_result()->fetch_assoc();

  // Always respond success (não vaza se e-mail existe)
  $_SESSION['recuperar_msg'] = 'Se existir uma conta com esse e-mail, enviaremos instruções.';

  if (!$user) { header('Location: index.html'); exit; }

  // gera token
  $token = bin2hex(random_bytes(32));
  $exp = (new DateTime('+1 hour'))->format('Y-m-d H:i:s');

  $stmt = $conn->prepare('INSERT INTO password_resets (user_id, token, expires_at) VALUES (?, ?, ?)');
  $stmt->bind_param('iss', $user['id'], $token, $exp);
  $stmt->execute();

  $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']==='on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/reset_senha.php?token=' . $token;

  // Tenta enviar email nativo. Configure o servidor para enviar ou substitua por SMTP/PHPMailer.
  $assunto = 'TechLMR - Redefinição de senha';
  $mensagem = "Olá, {$user['nome']},\n\nUse o link abaixo para redefinir sua senha (válido por 1 hora):\n{$link}\n\nSe não foi você, ignore este e-mail.";
  @mail($email, $assunto, $mensagem);

  // Como fallback, grava o link em um arquivo de log para testes locais
  file_put_contents(__DIR__ . '/reset_links.log', date('c')." | $email | $link\n", FILE_APPEND);

  header('Location: index.html'); exit;

} catch (Throwable $e) {
  error_log('Erro recuperar senha: ' . $e->getMessage());
  header('Location: index.html'); exit;
}
?>