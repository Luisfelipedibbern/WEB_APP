<?php
// Dados fictícios (pode puxar do banco depois)
$produto = [
  "nome" => "Galaxy S25 Ultra",
  "descricao" => "O Samsung Galaxy S25 é uma opção para utilizadores que procuram um smartphone com desempenho de ponta para multitarefas, jogos, e fotografia de alta qualidade.",
  "preco" => 8499.00,
  "imagem" => "https://cdn.mos.cms.futurecdn.net/KsHza7hcrkrX5Qb58JyjC.jpg",
  "galeria" => [
    "https://helios-i.mashable.com/imagery/reviews/02tfZKqGqDCzYuchOpFWkQm/images-23.fill.size_800x450.v1706514532.jpg",
    "https://cdn.mos.cms.futurecdn.net/CZywcp6PMRvkm396tgWKK-1200-80.jpg",
    "https://cdn.mos.cms.futurecdn.net/BtFvMhX8ZqHTPXDtRDfNxC.jpg"
  ]
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $produto["nome"] ?> - TechLMR</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

<main class="max-w-7xl mx-auto p-6 grid grid-cols-1 md:grid-cols-2 gap-8 mt-6">
  <!-- Galeria -->
  <div class="space-y-4">
    <img src="<?= $produto["imagem"] ?>" alt="Celular" class="w-full rounded-2xl shadow-lg">
    <div class="flex space-x-4">
      <?php foreach($produto["galeria"] as $img): ?>
        <img src="<?= $img ?>" class="w-20 h-20 rounded-lg border hover:border-blue-600 cursor-pointer">
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Detalhes -->
  <div class="space-y-6">
    <h2 class="text-3xl font-bold"><?= $produto["nome"] ?></h2>
    <p class="text-gray-600"><?= $produto["descricao"] ?></p>
    <div class="text-2xl font-semibold text-blue-600">R$ <?= number_format($produto["preco"], 2, ',', '.') ?></div>

    <div class="flex space-x-4 mt-4">
      <button class="flex-1 bg-blue-600 text-white py-3 rounded-xl hover:bg-blue-700">Comprar Agora</button>
      <button class="flex-1 border border-gray-300 py-3 rounded-xl hover:border-blue-600">Adicionar ao Carrinho</button>
    </div>
  </div>
</main>
</body>
</html>