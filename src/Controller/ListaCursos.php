<?php

namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class ListaCursos extends ControllerComHtml implements InterfaceControladorRequisicao
{

    private $repositorioDeCursos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->repositorioDeCursos = $entityManager->getRepository(Curso::class);
    }

    public function processaRequisicao():void
    {

        $dados = [
            'cursos' => $this->repositorioDeCursos->findAll(),
            'titulo' => "Lista de Cursos"
        ];

       echo $this->renderizaHtml('cursos/listar-cursos.php' , $dados );
    }
        
}
