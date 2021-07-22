<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RealizaLogin implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private ObjectRepository $repositorioUsuario;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioUsuario =
            $entityManager->getRepository(Usuario::class);

    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $email = filter_var(
            $request->getParsedBody()['email']
            , FILTER_SANITIZE_EMAIL);

        $redirecionamentoLogin = new Response(302, ['Location' => '/login']);

        if (is_null($email) || $email === false) {
            $this->defineMensagem('danger', 'O e-mail digitado não é um e-mail válido');
            return $redirecionamentoLogin;
        }

        $senha = filter_var($request->getParsedBody()['senha'], FILTER_SANITIZE_STRING);

        /* @var Usuario $usuario */
        $usuario = $this->repositorioUsuario->findOneBy(['email'=> $email]);

        if (is_null($usuario) || !$usuario->senhaEstaCorreta($senha)){
            $this->defineMensagem('danger', 'E-mail ou senha inválidos');
            return $redirecionamentoLogin;

        }

        $_SESSION['logado'] = true;

        return new Response(302, ['Location' => '/listar-cursos']);


    }
}