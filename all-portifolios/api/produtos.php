<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['erro' => 'Metodo nao permitido']);
    exit;
}

$produtos = [
    ["id" => 1, "nome" => "Camiseta Branca", "descricao" => "100% algodao, unissex", "preco" => 59.90, "categoria" => "Roupas"],
    ["id" => 2, "nome" => "Calca Jeans", "descricao" => "Azul escuro, corte slim", "preco" => 120.00, "categoria" => "Roupas"],
    ["id" => 3, "nome" => "Tenis Esportivo", "descricao" => "Ideal para corrida", "preco" => 230.50, "categoria" => "Calcados"],
    ["id" => 4, "nome" => "Jaqueta Corta-Vento", "descricao" => "Impermeavel e leve", "preco" => 179.99, "categoria" => "Roupas"],
    ["id" => 5, "nome" => "Bone Preto", "descricao" => "Ajustavel, aba curva", "preco" => 39.90, "categoria" => "Acessorios"],
    ["id" => 6, "nome" => "Meia Esportiva", "descricao" => "Pacote com 3 pares", "preco" => 29.90, "categoria" => "Roupas"],
    ["id" => 7, "nome" => "Camisa Social", "descricao" => "Branca, manga longa", "preco" => 89.00, "categoria" => "Roupas"],
    ["id" => 8, "nome" => "Cinto de Couro", "descricao" => "Couro legitimo, marrom", "preco" => 65.00, "categoria" => "Acessorios"],
    ["id" => 9, "nome" => "Relogio Digital", "descricao" => "A prova d'agua", "preco" => 150.00, "categoria" => "Acessorios"],
    ["id" => 10, "nome" => "Oculos de Sol", "descricao" => "Protecao UV 400", "preco" => 99.90, "categoria" => "Acessorios"],
    ["id" => 11, "nome" => "Mochila Escolar", "descricao" => "Varios compartimentos", "preco" => 139.00, "categoria" => "Bolsas/Mochilas"],
    ["id" => 12, "nome" => "Tenis Casual", "descricao" => "Estilo urbano", "preco" => 200.00, "categoria" => "Calcados"],
    ["id" => 13, "nome" => "Camisa Polo", "descricao" => "Algodao premium", "preco" => 79.90, "categoria" => "Roupas"],
    ["id" => 14, "nome" => "Bermuda Sarja", "descricao" => "Cinza, bolsos laterais", "preco" => 89.90, "categoria" => "Roupas"],
    ["id" => 15, "nome" => "Pulseira Fitness", "descricao" => "Contador de passos", "preco" => 99.00, "categoria" => "Tecnologia"],
    ["id" => 16, "nome" => "Gorro de La", "descricao" => "Ideal para inverno", "preco" => 25.00, "categoria" => "Acessorios"],
    ["id" => 17, "nome" => "Chinelo Slide", "descricao" => "Confortavel e leve", "preco" => 45.00, "categoria" => "Calcados"],
    ["id" => 18, "nome" => "Camiseta Estampada", "descricao" => "Arte exclusiva", "preco" => 69.90, "categoria" => "Roupas"],
    ["id" => 19, "nome" => "Jaqueta Jeans", "descricao" => "Azul claro, estilo retro", "preco" => 160.00, "categoria" => "Roupas"],
    ["id" => 20, "nome" => "Carteira Masculina", "descricao" => "Couro sintetico", "preco" => 49.90, "categoria" => "Acessorios"],
    ["id" => 21, "nome" => "Saia Jeans", "descricao" => "Com botao frontal", "preco" => 95.00, "categoria" => "Roupas"],
    ["id" => 22, "nome" => "Blusa Cropped", "descricao" => "Manga bufante", "preco" => 59.00, "categoria" => "Roupas"],
    ["id" => 23, "nome" => "Sandalia Rasteira", "descricao" => "Tiras cruzadas", "preco" => 89.90, "categoria" => "Calcados"],
    ["id" => 24, "nome" => "Vestido Floral", "descricao" => "Curto e leve", "preco" => 119.00, "categoria" => "Roupas"],
    ["id" => 25, "nome" => "Macacao Feminino", "descricao" => "Modelo pantacourt", "preco" => 149.90, "categoria" => "Roupas"],
];

if (isset($_GET['search'])) {
    $search = strtolower($_GET['search']);
    $produtos = array_filter($produtos, fn($produto) => str_contains(strtolower($produto['nome']), $search));
    $produtos = array_values($produtos);
}

echo json_encode($produtos, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
