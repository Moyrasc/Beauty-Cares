<?php
// Recorre el array $alertas, donde $key es la clave y $mensajes es el valor.
foreach ($alertas as $key => $mensajes) :
    // Dentro de este bucle, recorre el array $mensajes.
    foreach ($mensajes as $mensaje) :
?>
        <div class="alerta <?php echo $key; ?>">
            <?php echo $mensaje ?>
        </div>
<?php
    endforeach;
endforeach;
?>