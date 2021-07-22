<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Helper\RenderizadorComHtml;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioInsercao implements RequestHandlerInterface
{
    use RenderizadorComHtml;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $html = $this->renderizaHtml('cursos/formulario.php', ['titulo' => 'Novo Curso']);


        return new Response(302, [], $html);

    }
}