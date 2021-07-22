<?php

require __DIR__ . '/../vendor/autoload.php';


use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;


/** @var  ContainerInterface $container */
$container = require __DIR__ . '/../config/dependecies.php';

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



$psr17Factory = new Psr17Factory();
$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UrlFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory // StreamFactory
);

$request = $creator->fromGlobals();


/** @var  RequestHandlerInterface */
$controlador = $container->get($classeControladora);

$resposta = $controlador->handle($request);

foreach ($resposta->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $resposta->getBody();


