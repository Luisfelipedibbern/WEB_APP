<?php
require_once __DIR__ . '/config.php';

$conn = db();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $token = $_GET['token'] ?? '';
  if ($token === '') { echo 'Token inválido.'; exit; }

  // Verifica token
  $stmt = $conn->prepare('SELECT pr.id, pr.user_id, u.email FROM password_resets pr JOIN usuarios u ON u.id=pr.user_id WHERE pr.token=? AND pr.used=0 AND pr.expires_at > NOW() LIMIT 1');
  $stmt->bind_param('s', $token); $stmt->execute();
  $row = $stmt->get_result()->fetch_assoc();
  if (!$row) { echo 'Link inválido ou expirado.'; exit; }
  // Mostra o form
  ?>
  <!DOCTYPE html>
  <html lang="pt-BR"><head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechLMR · Redefinir Senha</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
  </head><body>
    <main class="auth-wrap">
      <section class="auth-box">
        <div class="logo">Tech<span>LMR</span></div>
        <h1 class="auth-title">Redefinir senha</h1>
        <p class="auth-sub">Crie uma nova senha para <?php echo htmlspecialchars($row['email']); ?></p>
        <form class="form" action="reset_senha.php" method="POST">
          <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
          <input class="input border" type="password" name="senha" placeholder="Nova senha" required>
          <input class="input border" type="password" name="confirma" placeholder="Confirmar senha" required>
          <button class="btn btn-primary" type="submit">Atualizar senha</button>
        </form>
      </section>
    </main>
  </body></html>
  <?php
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $token = $_POST['token'] ?? '';
  $senha = $_POST['senha'] ?? '';
  $conf  = $_POST['confirma'] ?? '';

  if ($token==='' || $senha==='' || $conf==='' || $senha !== $conf) {
    echo 'Dados inválidos.'; exit;
  }

  // Valida token de novo
  $stmt = $conn->prepare('SELECT id, user_id FROM password_resets WHERE token=? AND used=0 AND expires_at > NOW() LIMIT 1');
  $stmt->bind_param('s', $token); $stmt->execute();
  $row = $stmt->get_result()->fetch_assoc();
  if (!$row) { echo 'Link inválido ou expirado.'; exit; }

  // Atualiza senha
  $hash = password_hash($senha, PASSWORD_DEFAULT);
  $stmt = $conn->prepare('UPDATE usuarios SET senha=? WHERE id=?');
  $stmt->bind_param('si', $hash, $row['user_id']); $stmt->execute();

  // Marca token como usado
  $stmt = $conn->prepare('UPDATE password_resets SET used=1, used_at=NOW() WHERE id=?');
  $stmt->bind_param('i', $row['id']); $stmt->execute();

  echo 'Senha atualizada com sucesso! <a href="index.html">Fazer login</a>';
  exit;
}

echo 'Método inválido.';
?>