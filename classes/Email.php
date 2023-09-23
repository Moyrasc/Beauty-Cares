<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{

    public $email;
    public $nombre;
    public $token;

    public function __construct($nombre, $email,  $token)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->token = $token;
    }

    public function enviarConfirmacion()
    {
        //Crear objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['PHPMAILER_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['PHPMAILER_PORT'];
        $mail->Username = $_ENV['PHPMAILER_USERNAME'];
        $mail->Password = $_ENV['PHPMAILER_PASSWORD'];

        $mail->setFrom('beautycares@beautycares.com', 'BeautyCares');
        $mail->addAddress('me@gmail.com');
        $mail->Subject = 'Confirma tu cuenta';

        //Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';
        $contenido = "<html>";
        $contenido .= "<p><strong> Bienvenid@ " . $this->nombre . " a Beauty Cares </strong> Para poder acceder a tu cuenta presiona el siguiente enlace: </p>";
        $contenido .= "<p><a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar Registro</a></p>";
        $contenido .= "<p>Si no has solicitado esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        //Envio mail
        $mail->send();
    }
};
