<?php

use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\ListaCursos;
use Alura\Cursos\Controller\Persistencia;

return [
    '/listar-cursos' => ListaCursos::class,
    '/novo-curso' => FormularioInsercao::class,
    '/salvar-curso' => Persistencia::class
];
