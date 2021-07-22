<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Helper\RenderizadorComHtml;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Atualizacao implements RequestHandlerInterface
{

    use RenderizadorComHtml, FlashMessageTrait;

    private \Doctrine\Persistence\ObjectRepository $repositorioCursos;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioCursos = $entityManager->getRepository(Curso::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $redirecionaListarCursos = new Response(302,
            ['Location' => '/listar-cursos']
        );

        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        if(is_null($id) || $id === false){
            $this->defineMensagem('danger', 'ID de curso inválido');
            return $redirecionaListarCursos;
        }

        /* @var Curso $curso */
        $curso = $this->repositorioCursos->find($id);

        $html = $this->renderizaHtml('cursos/formulario.php', [
            'curso' => $curso,
            'titulo' => ' Altera Curso ' . $curso->getDescricao()
        ]);

        return new Response(302, [], $html);

    }
}