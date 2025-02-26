<?php
require_once 'libreria/motor.php';

plantilla::inicio();

$n1 = 9;
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

$ejercicio = (object) $ejercicio;
?>

<section class="section">
    <div class="container">
        <h1 class="title"><?php echo htmlspecialchars($ejercicio->nombre, ENT_QUOTES, 'UTF-8'); ?></h1>
        <p class="subtitle"><?php echo htmlspecialchars($ejercicio->descripcion, ENT_QUOTES, 'UTF-8'); ?></p>

        <!-- Formulario para buscar el país -->
        <div class="box">
            <form method="get" action="">
                <div class="field">
                    <label class="label" for="country">Nombre del país:</label>
                    <div class="control">
                        <input class="input" type="text" name="country" id="country" placeholder="Ejemplo: España, México, Argentina" required>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <button class="button is-primary" type="submit">Buscar</button>
                    </div>
                </div>
            </form>
        </div>

        <?php
        if (isset($_GET['country'])) {
            $country_name = htmlspecialchars($_GET['country'], ENT_QUOTES, 'UTF-8');
            $api_url = "https://restcountries.com/v3.1/name/" . urlencode($country_name);
            $country_data = @file_get_contents($api_url);
            if ($country_data === FALSE) {
                echo '<div class="notification is-danger">Error al conectar con la API.</div>';
            } else {
                $country_info = json_decode($country_data, true);
                if ($country_info && isset($country_info[0])) {
                    $country = $country_info[0];
                    ?>
                    <div class="box has-text-centered">
                        <h2 class="title is-4">Información del país: <?php echo htmlspecialchars($country_name, ENT_QUOTES, 'UTF-8'); ?></h2>
                        <figure class="image is-128x128 is-inline-block">
                            <img src="<?php echo htmlspecialchars($country['flags']['svg'], ENT_QUOTES, 'UTF-8'); ?>" alt="Bandera de <?php echo htmlspecialchars($country_name, ENT_QUOTES, 'UTF-8'); ?>">
                        </figure>
                        <p><strong>Capital:</strong> <?php echo htmlspecialchars($country['capital'][0], ENT_QUOTES, 'UTF-8'); ?></p>
                        <p><strong>Población:</strong> <?php echo number_format($country['population']); ?> habitantes</p>
                        <p><strong>Moneda:</strong> <?php echo implode(", ", array_column($country['currencies'], 'name')); ?></p>
                    </div>
                    <?php
                } else {
                    echo '<div class="notification is-warning">No se encontró información para el país "<strong>' . htmlspecialchars($country_name, ENT_QUOTES, 'UTF-8') . '</strong>".</div>';
                }
            }
        }
        ?>
    </div>
</section>
