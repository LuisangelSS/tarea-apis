<?php
require_once 'libreria/motor.php';

plantilla::inicio();

$n1 = 3;
$ejercicio = get_ejercicio($n1);
if (!$ejercicio) {
    echo '<h1 class="title has-text-danger">El ejercicio no encontrado</h1>
    <p class="subtitle">El ejercicio solicitado no existe.</p>
    <a href="./">Volver al inicio</a>';
    exit();
}

$ejercicio = (object)$ejercicio;

function obtenerUniversidades($pais) {
    $url = "http://universities.hipolabs.com/search?country=" . urlencode($pais);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    if($output === FALSE) {
        return null;
    }
    curl_close($ch);
    return json_decode($output, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pais = $_POST['pais'];
    $universidades = obtenerUniversidades($pais);
    if (!$universidades) {
        $error = "Hubo un problema al comunicarse con la API. Por favor, inténtelo de nuevo más tarde.";
    } elseif (empty($universidades)) {
        $error = "No se encontraron universidades para el país indicado. Por favor, asegúrese de ingresar el nombre del país en inglés.";
    }
}
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
                    <h1 class="title" style="color: black;"><?php echo $ejercicio->nombre; ?></h1>
                    <p class="subtitle" style="color: black;"><?php echo $ejercicio->descripcion; ?></p>

                    <form method="post" action="">
                        <div class="field">
                            <label class="label" for="pais" style="color: black;">Ingrese el nombre del país en ingles:</label>
                            <div class="control">
                                <input class="input" type="text" id="pais" name="pais" required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <button class="button is-link" type="submit">Buscar Universidades</button>
                            </div>
                        </div>
                    </form>

                    <?php if (isset($error)) { ?>
                        <div class="notification is-danger"><?php echo $error; ?></div>
                    <?php } elseif (isset($universidades)) { ?>
                        <h2 style="color: black;">Universidades en <?php echo htmlspecialchars($pais); ?></h2>
                        <ul>
                            <?php foreach ($universidades as $uni) { ?>
                                <li>
                                    <strong style="color: black;"><?php echo htmlspecialchars($uni['name']); ?></strong><br>
                                    Dominio: <span style="color: black;"><?php echo htmlspecialchars($uni['domains'][0]); ?></span><br>
                                    <a href="<?php echo htmlspecialchars($uni['web_pages'][0]); ?>" target="_blank">Sitio web</a>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
