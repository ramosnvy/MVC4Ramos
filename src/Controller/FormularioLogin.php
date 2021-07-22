<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Helper\RenderizadorComHtml;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioLogin implements RequestHandlerInterface
{
    use RenderizadorComHtml;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml('Login/formulario.php', ['titulo' => 'Login']);


        return new Response(302, [], $html);
    }
}