<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\RenderizadorComHtml;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListaCursos implements RequestHandlerInterface
{
    use RenderizadorComHtml;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioCursos = $entityManager->getRepository(Curso::class);
    }


    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $dados = ['titulo' => 'Lista de Cursos',
            'cursos' => $this->repositorioCursos->findAll(),
        ];

    $html = $this->renderizaHtml('cursos/listar-cursos.php', $dados);

    return new Response(302, [], $html);

    }
}