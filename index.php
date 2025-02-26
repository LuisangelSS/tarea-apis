<?php
require_once "libreria/motor.php";

plantilla::inicio();

?>

        <h1 class="title">Plataforma Multifuncional</h1>
        
        <p class="subtitle">Aquí puedes visualizar todas las APIs que ofrecemos catalogadas como ejercicios.</p>

        <div class="box has-text-centered">
            <figure class="image is-128x128 is-inline-block">
                <img class="is-rounded" src="foto/yo.jpg" alt="Foto de Luis Ángel Sánchez">
            </figure>
            <h2 class="title is-4">Luis Ángel Sánchez</h2>
        </div>

        <div class="content">
            <p>Estos son todos los ejercicios disponibles:</p>
            <ul>
            <?php
        $ejercicios = get_lista_ejercicios();
        foreach ($ejercicios as $ejercicio) {
            echo '<li><a href="' . $ejercicio["url"] . '"> ' . $ejercicio["nombre"] . '</a>: ' . $ejercicio["descripcion"] . '</li>';
        }
        ?>

            </ul>
        </div>
