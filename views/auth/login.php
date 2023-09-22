<h1 class="nombre-pagina">Login</h1>
<p class="descripcion-pagina">Inicia Sesión </p>
<form class="formulario" method="POST" action="/">
    <div class="campo">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="prueba@prueba.com" />
    </div>
    <div class="campo">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" placeholder="contraseña123" />
    </div>
    <input type="submit" class="boton" value="Iniciar Sesión" />
</form>

<div class="acciones">
    <a href="/crear-cuenta">¿Aún no tienes cuenta? Crear una</a>
    <a href="/olvide">¿Has olvidado la contraseña?</a>
</div>