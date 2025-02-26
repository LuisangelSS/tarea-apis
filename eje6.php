<?php
require_once 'libreria/motor.php';

plantilla::inicio();

$n1 = 6;
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

$api_url = 'https://public-api.wordpress.com/wp/v2/sites/tusitio.wordpress.com/posts';
$response = json_decode(file_get_contents($api_url));

?>

<section class="section">
    <div class="container">
        <h1 class="title"><?php echo $ejercicio->nombre; ?></h1>
        <p class="subtitle"><?php echo $ejercicio->descripcion; ?></p>

        <div class="columns is-multiline">
            <?php
            foreach (array_slice($response, 0, 3) as $post) {
                echo '<div class="column is-one-third">
                        <div class="card">
                            <div class="card-content">
                                <p class="title is-4">' . $post->title->rendered . '</p>
                                <p class="subtitle is-6">' . $post->excerpt->rendered . '</p>
                                <a class="button is-link" href="' . $post->link . '">Ir al sitio</a>
                            </div>
                        </div>
                      </div>';
            }
            ?>
        </div>
    </div>
</section>
