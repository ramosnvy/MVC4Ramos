<?php


namespace Alura\Cursos\Helper;


trait FlashMensageTrait
{
    public function defineMensagem(string $tipo, string $mensagem) : void
    {
        $_SESSION['mensagem'] = $mensagem;
        $_SESSION['tipo_mensagem'] = $tipo;
        
    }
    
}