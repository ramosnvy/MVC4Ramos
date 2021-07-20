<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\RenderizadorDeHtmlTrait;
use Alura\Cursos\Infra\EntityManagerCreator;

class Atualizacao implements InterfaceControladorRequisicao
{

    use RenderizadorDeHtmlTrait;

    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;
    private $repositorioCursos;

    public function __construct()
    {
        $entityManager= (new EntityManagerCreator())->getEntityManager();
        $this->repositorioCursos= $entityManager->getRepository(Curso::class);
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if (is_null($id) || $id === false){
            header('Location: /listar-cursos');
            return;
        }

        $curso = $this->repositorioCursos->find($id);


       echo $this->renderizaHtml('cursos/formulario.php', [
            'curso' => $curso,
            'titulo' => 'Altera Curso' . $curso->getDescricao(),
        ]);





    }
}