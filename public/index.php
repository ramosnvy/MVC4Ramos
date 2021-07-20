<?php

require __DIR__ . '/../vendor/autoload.php';


use Alura\Cursos\Controller\InterfaceControladorRequisicao;


$rotas = require __DIR__ . '/../config/rotas.php';
$caminho = $_SERVER['PATH_INFO'];


session_start();

if (!array_key_exists($caminho, $rotas)){
    http_response_code(404);
    exit();
}


$ehCaminho = stripos($caminho, 'login');
if (!isset($_SESSION['logado']) && $ehCaminho === false){
    header('Location: /login');
    exit();
}

$classeControladora = $rotas[$caminho];
/** @var  InterfaceControladorRequisicao */
$controlador = new $classeControladora();
$controlador->processaRequisicao();


