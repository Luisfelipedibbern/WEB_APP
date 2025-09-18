<?php
require_once __DIR__ . '/config.php';
if (!isset($_SESSION['usuario'])) { header('Location: index.html'); exit; }
$user = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TechLMR · Início</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<style>
  .card img {
  width: 100%;
  height: 250px;
  object-fit: contain;  
  background: #f5f5f5; 
}

</style>
<body>
  <header class="site-header">
    <div class="container header-inner">
      <div class="logo">Tech<span>LMR</span></div>
      <div class="header-search"><input type="text" placeholder="Buscar produtos..."></div>
      <nav class="header-nav">
        <a href="site.php">Início</a>
        <a href="categorias.php">Categorias</a>
        <a href="#">Ofertas</a>
        <a href="#">Contato</a>
        <a href="logout.php">Sair</a>
      </nav>
    </div>
  </header>

  <main>
    <!-- HERO -->
    <section class="hero">
      <div class="container hero-grid">
        <div>
          <h1>Bem vindo de volta,<br> Descubra o melhor da <span>TechLMR</span></h1>
          <p>Celulares e acessórios premium com ofertas que combinam tecnologia e estilo.</p>
          <a class="btn btn-primary" href="#carousel">Ver novidades</a>
        </div>
        <div>
          <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?q=80&amp;w=1200&amp;auto=format&amp;fit=crop" alt="Banner celular premium">
        </div>
      </div>
    </section>

    <!-- CAROUSEL -->
    <section id="carousel" class="section">
      <div class="container">
        <div class="carousel">
          <div class="carousel-track" style="transform: translateX(-200%);">
            <div class="slide">
              <img src="https://t2.tudocdn.net/726532?w=1920" alt="Lançamentos Apple">
              <div class="caption">Lançamentos Apple · descubra agora</div>
            </div>
            <div class="slide">
              <img src="https://t2.tudocdn.net/636202?w=1920" alt="Galaxy S">
              <div class="caption">Samsung Galaxy · performance sem limites</div>
            </div>
            <div class="slide">
              <img src="https://media.cnn.com/api/v1/images/stellar/prod/220921163441-airpods-pro-2-review-1.jpg?c=original" alt="Fones e Áudio">
              <div class="caption">Fones e Áudio · imersão total</div>
            </div>
          </div>
          <button class="carousel-btn prev">❮</button>
          <button class="carousel-btn next">❯</button>
          <div class="carousel-dots"><button class=""></button><button class=""></button><button class="active"></button></div>
        </div>
      </div>
    </section>

    <!-- PRODUTOS -->
    <section id="produtos" class="section">
      <div class="container">
        <h2 class="section-title">Destaques</h2>
        <div class="grid cols-3">
          <article class="card">
            <img src="https://www.apple.com/newsroom/images/product/iphone/standard/Apple-iPhone-14-Pro-iPhone-14-Pro-Max-hero-220907_Full-Bleed-Image.jpg.large.jpg" alt="iPhone 14 Pro">
            <div class="card-body">
              <h3>iPhone 14 Pro</h3>
              <p>O smartphone mais avançado da Apple.</p>
              <div class="price">R$ 7.999,00</div>
              <a href="celular-pdp.php" class="btn btn-primary">Comprar</a>
            </div>
          </article>
          <article class="card">
            <img src="https://www.movilzona.es/app/uploads-movilzona.es/2025/01/Samsung-Galaxy-S25-Ultra-3.jpg" alt="Galaxy S23">
            <div class="card-body">
              <h3>Samsung Galaxy S25 Ultra</h3>
              <p>Performance e tecnologia de ponta.</p>
              <div class="price">R$ 5.499,00</div>
              <a href="celular-pdp.php" class="btn btn-primary">Comprar</a>
            </div>
          </article>
          <article class="card">
            <img src="https://down-br.img.susercontent.com/file/br-11134207-7r98o-lm646n4r95wr43" alt="AirPods Pro">
            <div class="card-body">
              <h3>Capinha de Iphone</h3>
              <p>Proteja e deixe visualmente estiloso seu iphone</p>
              <div class="price">R$ 1.899,00</div>
              <a href="acessorios-pdp.php" class="btn btn-primary">Comprar</a>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- CONTATO -->
    <section id="contato" class="section contact">
      <div class="container">
        <h2 class="section-title">Fale Conosco</h2>
        <form>
          <input class="input" type="text" placeholder="Seu nome" required="">
          <input class="input" type="email" placeholder="Seu e-mail" required="">
          <textarea class="input" rows="4" placeholder="Sua mensagem" required=""></textarea>
          <button class="btn btn-primary" type="submit">Enviar</button>
        </form>
      </div>
    </section>
  </main>

  <footer><div class="container">© <?php echo date('Y'); ?> TechLMR — Todos os direitos reservados</div></footer>
  <script src="scripts.js"></script>
</body>
</html>