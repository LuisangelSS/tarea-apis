<?php
require_once 'libreria/motor.php';

plantilla::inicio();

$n1 = 8;
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

function obtenerImagen($keyword) {
    $url = 'https://picsum.photos/1600/900?random=' . rand();
    return $url;
}

$imagen_url = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['keyword'])) {
    $keyword = trim($_POST['keyword']);
    $imagen_url = obtenerImagen($keyword);
}
?>

<section class="section">
    <div class="container">
        <h1 class="title"><?php echo $ejercicio->nombre; ?></h1>
        <p class="subtitle"><?php echo $ejercicio->descripcion; ?></p>

        <!-- Formulario de búsqueda -->
        <form method="post" class="box">
            <div class="field">
                <label class="label">Ingrese una palabra clave:</label>
                <div class="control">
                    <input class="input" type="text" name="keyword" placeholder="Ejemplo: gato, perro, paisaje" required>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button class="button is-primary" type="submit">Buscar Imagen</button>
                </div>
            </div>
        </form>

        <?php if ($imagen_url): ?>
            <div class="box has-text-centered">
                <h2 class="title is-4">Imagen aleatoria</h2>
                <figure class="image is-3by2">
                    <img src="<?php echo $imagen_url; ?>" alt="Imagen aleatoria">
                </figure>
            </div>
        <?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
            <div class="notification is-danger">
                <p>No se encontró imagen para "<strong><?php echo htmlspecialchars($keyword); ?></strong>".</p>
            </div>
        <?php endif; ?>
    </div>
</section>
