<?php

use Alura\Cursos\Controller\Atualizacao;
use Alura\Cursos\Controller\Exclusao;
use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\ListaCursos;
use Alura\Cursos\Controller\Persistencia;

return [
    '/listar-cursos' => ListaCursos::class,
    '/novo-curso' => FormularioInsercao::class,
    '/salvar-curso' => Persistencia::class,
    '/excluir-curso' => Exclusao::class,
    '/atualizar-curso'=> Atualizacao::class
];
