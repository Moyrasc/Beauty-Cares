<?php

namespace Model;

class Usuario extends ActiveRecord
{

    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono', 'email', 'password', 'token', 'confirmado', 'admin'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $email;
    public $password;
    public $token;
    public $confirmado;
    public $admin;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->confirmado = $args['confirmado'] ?? null;
        $this->admin = $args['admin'] ?? null;
    }

    //Mensajes de validación creación cuenta

    public function ValidarNuevaCuenta()
    {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es obligatorio';
        }
        if (!$this->apellido) {
            self::$alertas['error'][] = 'El Apellido obligatorio';
        }
        if (!$this->email) {
            self::$alertas['error'][] = 'El Email obligatorio';
        }
        if (!$this->telefono) {
            self::$alertas['error'][] = 'El Teléfono obligatorio';
        }
        if (strlen($this->telefono) < 9) {
            self::$alertas['error'][] = 'El teléfono debe contener 9 digítos';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        }
        if (strlen($this->password) < 8) {
            self::$alertas['error'][] = 'La contraseña debe contener mínimo 8 caracteres';
        }

        return self::$alertas;
    }
    //Verifica si el user existe
    public function existeUsuario()
    {
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . " ' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El usuario ya esta registrado';
        };

        return $resultado;
    }

    public function hashPassword()
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function crearToken()
    {
    }
}
