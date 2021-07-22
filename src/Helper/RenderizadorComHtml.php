<?php

namespace Alura\Cursos\Helper;

trait RenderizadorComHtml
{

    public function renderizaHtml(string $caminhoTemplate, $dados): String
    {
        extract($dados);

        ob_start();

        require __DIR__ . '/../../src/View/' . $caminhoTemplate;

        $html = ob_get_clean();

        return $html;

    }
    
}