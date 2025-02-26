<?php
require_once 'libreria/motor.php';

plantilla::inicio();

$n1 = 1;
$ejercicio = get_ejercicio($n1);
if (!$ejercicio){
    echo '<h1 class="title">El ejercicio no encontrado</h1>
    <p class="subtitle">El ejercicio solicitado no existe.</p>
    <a href="./">Volver al inicio</a>';
    exit();
}

$ejercicio = (object)$ejercicio;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $ejercicio->nombre; ?></title>

</head>
<body>
    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-half">
                    <h1 class="title"><?php echo $ejercicio->nombre; ?></h1>
                    <p class="subtitle"><?php echo $ejercicio->descripcion; ?></p>

                    <?php
                    // Función para predecir el género basado en el nombre
                    function predecir_genero($nombre) {
                        $api_url = "https://api.genderize.io/?name=" . urlencode($nombre);
                        $response = file_get_contents($api_url);
                        $data = json_decode($response, true);

                        if (isset($data['gender']) && isset($data['probability'])) {
                            return array('gender' => $data['gender'], 'probability' => $data['probability']);
                        } else {
                            return null;
                        }
                    }

                    // Procesar la solicitud del formulario
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $nombre = htmlspecialchars($_POST["nombre"]);
                        $resultado = predecir_genero($nombre);

                        if ($resultado) {
                            $genero = $resultado['gender'];
                            $probabilidad = $resultado['probability'] * 100; // Convertir a porcentaje
                            $color = ($genero == "male") ? "💙" : (($genero == "female") ? "💖" : "🤷‍♂️");

                            echo "<p class='notification is-info'>El nombre '$nombre' es probablemente de género: $genero $color con una probabilidad de $probabilidad%</p>";
                        } else {
                            echo "<p class='notification is-warning'>No se pudo determinar el género para el nombre '$nombre'.</p>";
                        }
                    }
                    ?>

                    <form method="post">
                        <div class="field">
                            <label class="label" for="nombre">Nombre:</label>
                            <div class="control">
                                <input class="input" type="text" id="nombre" name="nombre" placeholder="Ingresa el nombre" required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <button class="button is-link" type="submit">Predecir género</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
