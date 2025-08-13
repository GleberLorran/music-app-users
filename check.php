<?php
header("Content-Type: application/json");

// Lê o link enviado
$url = isset($_GET['url']) ? $_GET['url'] : '';
if (!$url) {
    echo json_encode(["status" => "error", "msg" => "URL vazia"]);
    exit;
}

// Função para testar sem baixar todo o conteúdo
$headers = @get_headers($url);
if ($headers && strpos($headers[0], '200') !== false) {
    echo json_encode(["status" => "ok"]);
} else {
    echo json_encode(["status" => "erro"]);
}
