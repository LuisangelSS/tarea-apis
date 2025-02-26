<?php
require_once 'libreria/motor.php';

// Función para obtener tasas de cambio desde la API
function obtenerTasasDeCambio($api_url) {
    $response = file_get_contents($api_url);
    $data = json_decode($response, true);
    return $data['rates'];
}

// Función para mostrar el formulario y los resultados de la conversión
function mostrarFormularioYResultados($tasas) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cantidad_usd = floatval($_POST['cantidad_usd']);
        $usd_a_dop = $cantidad_usd * $tasas['DOP'];
        $usd_a_eur = $cantidad_usd * $tasas['EUR'];
        $usd_a_gbp = $cantidad_usd * $tasas['GBP'];

        echo '<div class="box">';
        echo '<h2 class="title is-4">Resultados de la Conversión</h2>';
        echo '<p><strong>USD a DOP:</strong> ' . $usd_a_dop . '</p>';
        echo '<p><strong>USD a EUR:</strong> ' . $usd_a_eur . '</p>';
        echo '<p><strong>USD a GBP:</strong> ' . $usd_a_gbp . '</p>';
        echo '</div>';
    }
    echo '<form method="post" action="" class="box">';
    echo '<div class="field">';
    echo '<label class="label" for="cantidad_usd">Cantidad en USD:</label>';
    echo '<div class="control">';
    echo '<input class="input" type="text" name="cantidad_usd" id="cantidad_usd" required>';
    echo '</div>';
    echo '</div>';
    echo '<div class="control">';
    echo '<button class="button is-primary" type="submit">Convertir</button>';
    echo '</div>';
    echo '</form>';
}

plantilla::inicio();

$n1 = 7;
$ejercicio = get_ejercicio($n1);
if (!$ejercicio){
    echo '<h1 class="title">El ejercicio no encontrado</h1>
    <p class="subtitle">El ejercicio solicitado no existe.</p>
    <a href="./">Volver al inicio</a>';
    exit();
}

$ejercicio = (object)$ejercicio;

?>

<h1 class="title"><?php echo $ejercicio->nombre; ?></h1>
<p class="subtitle"><?php echo $ejercicio->descripcion; ?></p>

<?php
// URL de la API de conversión de monedas
$api_url = 'https://api.exchangerate-api.com/v4/latest/USD';

// Obtenemos las tasas de cambio
$tasas = obtenerTasasDeCambio($api_url);

// Mostramos el formulario y los resultados
mostrarFormularioYResultados($tasas);
