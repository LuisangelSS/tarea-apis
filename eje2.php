<?php
require_once 'libreria/motor.php';

plantilla::inicio();

$n1 = 2;
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

                    <form method="GET">
                        <div class="field">
                            <label class="label" for="name">Nombre:</label>
                            <div class="control">
                                <input class="input" type="text" id="name" name="name" placeholder="Ingresa el nombre" required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <button class="button is-link" type="submit">Predecir edad</button>
                            </div>
                        </div>
                    </form>

                    <?php
                    if (isset($_GET['name'])) {
                        $name = htmlspecialchars($_GET['name']);
                        $url = "https://api.agify.io/?name=" . urlencode($name);
                        $response = file_get_contents($url);
                        $data = json_decode($response, true);

                        $age = $data['age'];

                        if ($age < 18) {
                            $category = 'joven';
                            $emoji = '👶';
                            $image = 'url_to_young_image.jpg';
                        } elseif ($age >= 18 && $age < 65) {
                            $category = 'adulto';
                            $emoji = '🧑';
                            $image = 'url_to_adult_image.jpg';
                        } else {
                            $category = 'anciano';
                            $emoji = '👴';
                            $image = 'url_to_elder_image.jpg';
                        }

                        echo "<p class='notification is-info'>El nombre '$name' tiene una edad estimada de $age años y es categorizado como $category. $emoji</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
