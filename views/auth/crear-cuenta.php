<h1 class="nombre-pagina">Crear cuenta</h1>
<p class="descripcion-pagina">Completa el formulario para crear tu cuenta</p>

<?php include_once __DIR__ . "/../template/alertas.php"; ?>

<form class="formulario" method="POST" action="crear-cuenta">
    <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Tu Nombre" value="<?php echo s($usuario->nombre); ?>" />
    </div>
    <div class="campo">
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" placeholder="Tu Apellido" value="<?php echo s($usuario->apellido); ?>" />
    </div>
    <div class="campo">
        <label for="telefono">Teléfono</label>
        <input type="tel" id="telefono" name="telefono" placeholder="Tu Teléfono" value="<?php echo s($usuario->telefono); ?>" />
    </div>
    <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Tu E-mail" value="<?php echo s($usuario->email); ?>" />
    </div>
    <div class="campo">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" placeholder="Tu Contraseña" />
    </div>
    <input type="submit" class="boton" value="Crear Cuenta" />
</form>
<div class="acciones">
    <a href="/">¿Ya tienes cuenta? Inicia Sesión</a>
    <a href="/olvide">¿Has olvidado la contraseña?</a>
</div>