<?php
require_once 'libreria/motor.php';

plantilla::inicio();

$n1 = 10;
$ejercicio = get_ejercicio($n1);

if (!$ejercicio) {
    echo '<section class="section">
            <div class="container">
                <h1 class="title">El ejercicio no encontrado</h1>
                <p class="subtitle">El ejercicio solicitado no existe.</p>
                <a class="button is-link" href="./">Volver al inicio</a>
            </div>
          </section>';
    exit();
}

$ejercicio = (object)$ejercicio;

$chiste = json_decode(file_get_contents('https://official-joke-api.appspot.com/random_joke'));
?>

<section class="section">
    <div class="container">
        <h1 class="title"><?php echo $ejercicio->nombre; ?></h1>
        <p class="subtitle"><?php echo $ejercicio->descripcion; ?></p>

        <div class="box">
            <h2 class="title is-4">Aquí tienes tu chiste del día:</h2>
            <p><strong><?php echo $chiste->setup; ?></strong></p>
            <p><?php echo $chiste->punchline; ?></p>
        </div>
    </div>
</section>

