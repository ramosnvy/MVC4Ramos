<?php

use Alura\Cursos\Controller\{Atualizacao,
    Exclusao,
    FormularioInsercao,
    FormularioLogin,
    ListaCursos,
    Logout,
    Persistencia,
    RealizaLogin};

return [
    '/listar-cursos' => ListaCursos::class,
    '/novo-curso' => FormularioInsercao::class,
    '/salvar-curso' => Persistencia::class,
    '/excluir-curso' => Exclusao::class,
    '/atualizar-curso'=> Atualizacao::class,
    '/login'=> FormularioLogin::class,
    '/realiza-login' => RealizaLogin::class,
    '/logout' => Logout::class,
];
