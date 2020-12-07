<?php

namespace app\site\controller;

use app\core\Controller;
use app\site\crosscuting\Email;

class UsuarioController extends Controller
{
    public function index()
    {
        $this->load("usuario/main", [
            'response' =>
            [
                "pageTitle" => "Criar conta"
            ]
        ]);
    }

    public function esqueci()
    {
        $this->load("usuario/esqueci", [
            'response' =>
            [
                "pageTitle" => "Esqueci a senha"
            ]
        ]);
    }

    public function recuperar()
    {

        $emailEnviado = Email::enviarEmail();

        $this->load("usuario/esqueci", [
            'response' =>
            [
                "pageTitle" => "Esqueci a senha",
                "message" => [
                    "success" => $emailEnviado,
                    "description" => $emailEnviado ? "Senha enviada para seu email." : 'Falha no envio'
                ]
            ]
        ]);
    }
}