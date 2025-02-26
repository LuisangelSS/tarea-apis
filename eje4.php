<?php 
require_once 'libreria/motor.php'; 
plantilla::inicio(); 

$n1 = 4; 
$ejercicio = get_ejercicio($n1); 

if (!$ejercicio) { 
    echo '<h1 class="title">El ejercicio no encontrado</h1> 
          <p class="subtitle">El ejercicio solicitado no existe.</p> 
          <a href="./">Volver al inicio</a>'; 
    exit(); 
} 

$ejercicio = (object)$ejercicio; 
?>

<div class="container">
    <h1 class="title has-text-centered"><?php echo $ejercicio->nombre; ?></h1> 
    <p class="subtitle has-text-centered"><?php echo $ejercicio->descripcion; ?></p>

    <!-- Formulario de búsqueda -->
    <div class="box">
        <form method="POST">
            <div class="field">
                <label class="label" for="ciudad">Ingrese una ciudad:</label>
                <div class="control">
                    <input class="input" type="text" name="ciudad" id="ciudad" placeholder="Ejemplo: Santo Domingo" required>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button class="button is-primary is-fullwidth">Buscar Clima</button>
                </div>
            </div>
        </form>
    </div>

    <?php
    function obtenerDatosClima($ciudad) { 
        $apiKey = "bb05fab512284dd689f231800252402";
        $ciudad = urlencode($ciudad); 
        $url = "http://api.weatherapi.com/v1/current.json?key=$apiKey&q=$ciudad&aqi=no"; 

        $response = @file_get_contents($url); 

        if ($response === false) {
            return null; 
        }

        return json_decode($response, true); 
    } 

    // Ciudad por defecto 
    $ciudad = "Santo Domingo"; 

    if (!empty($_POST['ciudad'])) { 
        $ciudad = trim($_POST['ciudad']); 
    } 

    // Obtener datos del clima 
    $data = obtenerDatosClima($ciudad); 

    // Mostrar los datos del clima
    if ($data && isset($data['current'])) { 
        ?>
        <div class="box has-text-centered">
            <h2 class="title is-4">Clima en <?php echo htmlspecialchars($ciudad); ?>:</h2>
            <p class="subtitle is-5">🌡️ Temperatura: <strong><?php echo $data['current']['temp_c']; ?>°C</strong></p>
            <p class="subtitle is-5">🌤️ Condiciones: <strong><?php echo $data['current']['condition']['text']; ?></strong></p>
        </div>
        <?php
    } else { 
        echo '<div class="notification is-danger has-text-centered">
                <p>No se pudo obtener el clima para <strong>' . htmlspecialchars($ciudad) . '</strong>.</p>
              </div>';
    } 
    ?>
</div>
