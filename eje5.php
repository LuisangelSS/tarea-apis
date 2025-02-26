<?php
require_once 'libreria/motor.php';

plantilla::inicio();

$n1 = 5;
$ejercicio = get_ejercicio($n1);
if (!$ejercicio) {
    echo '<h1 class="title has-text-danger">El ejercicio no encontrado</h1>
    <p class="subtitle">El ejercicio solicitado no existe.</p>
    <a href="./">Volver al inicio</a>';
    exit();
}

$ejercicio = (object)$ejercicio;
?>

<h1 class="title" style="color: black;"><?php echo $ejercicio->nombre; ?></h1>
<p class="subtitle" style="color: black;"><?php echo $ejercicio->descripcion; ?></p>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pokemon_name'])) {
    $pokemon_name = htmlspecialchars($_POST['pokemon_name']);
    $api_url = "https://pokeapi.co/api/v2/pokemon/" . strtolower($pokemon_name);

    $response = @file_get_contents($api_url);
    if ($response === FALSE) {
        $error = "No se encontró el Pokémon solicitado.";
    } else {
        $pokemon_data = json_decode($response, true);
        if (!$pokemon_data) {
            $error = "No se encontró el Pokémon solicitado.";
        } else {
            $photo = $pokemon_data['sprites']['front_default'];
            $base_experience = $pokemon_data['base_experience'];
            $abilities = array_map(function ($ability) {
                return $ability['ability']['name'];
            }, $pokemon_data['abilities']);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Información de un Pokémon</title>
    <style>
        .error {
            background-color: red;
            color: white;
            padding: 20px;
            border-radius: 5px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 style="color: black;">Información de un Pokémon ⚡</h1>
    <form method="POST" action="">
        <input class="input" type="text" name="pokemon_name" placeholder="Nombre del Pokémon" required>
        <button class="button" type="submit">Buscar</button>
    </form>

    <?php if (isset($pokemon_data)): ?>
        <div class="pokemon-container">
            <h2 style="color: black;"><?php echo ucfirst($pokemon_name); ?></h2>
            <img class="pokemon-photo" src="<?php echo $photo; ?>" alt="<?php echo ucfirst($pokemon_name); ?>">
            <p style="color: black;"><strong>Experiencia Base:</strong> <?php echo $base_experience; ?></p>
            <p style="color: black;"><strong>Habilidades:</strong> <?php echo implode(', ', $abilities); ?></p>
        </div>
    <?php elseif (isset($error)): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>
</body>
</html>
