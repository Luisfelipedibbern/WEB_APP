<?php
// Dados fictícios (pode puxar do banco depois)
$produto = [
  "nome" => "Capinha de Silicone Premium - iPhone 14",
  "descricao" => "Proteja seu iPhone 14 com estilo e segurança. Capinha de silicone premium com toque suave e resistência a quedas.",
  "preco" => 89.90,
  "imagem" => "https://ng.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/60/1367372/1.jpg?5642",
  "galeria" => [
    "https://tse2.mm.bing.net/th/id/OIP.netpPpnMMiTwqmMGaHy9bwHaHa?pid=ImgDet&w=178&h=178&c=7&dpr=1,5&o=7&rm=3",
    "https://tse1.mm.bing.net/th/id/OIP.10AikIzrhCTCj6pF2kd00AHaKS?rs=1&pid=ImgDetMain&o=7&rm=3"
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
  <img src="<?= $produto["imagem"] ?>" alt="Acessório" 
       class="w-full rounded-2xl shadow-lg aspect-[4/3] object-cover">
  <div class="flex space-x-4">
    <?php foreach($produto["galeria"] as $img): ?>
      <img src="<?= $img ?>" 
           class="w-20 rounded-lg border hover:border-blue-600 cursor-pointer aspect-[4/3] object-cover">
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