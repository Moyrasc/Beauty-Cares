<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;

class LoginController
{
    public static function login(Router $router)
    {
        $router->render('auth/login');
    }

    public static function logout()
    {
        echo "Desde logout";
    }

    public static function olvide(Router $router)
    {
        $router->render('auth/olvide', []);
    }

    public static function recuperar()
    {
    }

    public static function crear(Router $router)
    {
        $usuario = new Usuario;
        //Alertas vacías
        $alertas = [];
        //$_SERVER = superglobal que contiene info sobre servidor y solicitud, en este caso almacena el método http
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->ValidarNuevaCuenta();

            //Revisar alertas vacias
            if (empty($alertas)) {
                //Verificar usuario no registrado
                $resultado = $usuario->existeUsuario();

                if ($resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                } else {
                    //hashear password
                    $usuario->hashPassword();
                    //Generar token único
                    $usuario->crearToken();
                }
            }
        }
        $router->render('auth/crear-cuenta', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
}
