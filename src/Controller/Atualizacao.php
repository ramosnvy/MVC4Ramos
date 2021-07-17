<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class Atualizacao implements InterfaceControladorRequisicao
{

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
        $titulo = ' Alterar Curso ' . $curso->getDescricao();
        require __DIR__.'/../../view/cursos/formulario.php';




    }
}