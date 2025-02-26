<?php
require_once 'libreria/motor.php';


plantilla::inicio();
?>

<!DOCTYPE html>
<html class="theme-dark"lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca de | Portal de Ejercicios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
    <section class="section">
        <div class="container">
            <h1 class="title has-text-centered">Acerca de este proyecto</h1>

            <div class="box has-text-centered">
                <figure class="image is-128x128 is-inline-block">
                    <img class="is-rounded" src="foto/yo.jpg" alt="Foto de Luis Ángel Sánchez">
                </figure>
                <h2 class="title is-4">Luis Ángel Sánchez</h2>
                <p>Desarrollador en formación con interés al aprendisaje en el desarrollo web.</p>
            </div>

            <div class="box">
                <h2 class="title is-4">¿Qué es este proyecto?</h2>
                <p>Este portal es una colección de ejercicios prácticos que consumen distintas APIs para demostrar su funcionalidad en tiempo real.</p>
            </div>

            <div class="box">
                <h2 class="title is-4">¿Qué tecnología se usó?</h2>
                <p>Este proyecto fue desarrollado usando <strong>Bulma</strong>, un framework CSS basado en Flexbox.</p>
                <p>Se eligió Bulma por las siguientes razones:</p>
                <ul>
                    <li>✔️ Es ligero y fácil de usar.</li>
                    <li>✔️ No requiere archivos JavaScript adicionales.</li>
                    <li>✔️ Permite un diseño moderno y responsive sin esfuerzo.</li>
                </ul>
            </div>

            <div class="has-text-centered">
                <a href="index.php" class="button is-link">Volver al inicio</a>
            </div>
        </div>
    </section>
</body>
</html>
