<?php

namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\RenderizadorDeHtmlTrait;
use Alura\Cursos\Infra\EntityManagerCreator;

class ListaCursos  implements InterfaceControladorRequisicao
{

    use RenderizadorDeHtmlTrait;

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
