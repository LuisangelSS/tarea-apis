
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <title>Portal de APIs</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 20px;
        }
        .pokemon-container {
            display: inline-block;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .pokemon-photo {
            width: 200px;
            height: 200px;
        }
        .button {
            background-color: #3b4cca; 
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #2a3795; 
        }
        .input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 200px;
        }
    </style>
</head>
<body>
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
  <a class="navbar-item" href="/" style="font-size: 1.8em;">
      🚀 Tarea 5 - APIs
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="./">
        Inicio
      </a>

      <a class="navbar-item" href="./about.php">
        Acerca de
      </a>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Ejercicios
        </a>
        <div class="navbar-dropdown">
            <?php
            $ejercicios = get_lista_ejercicios();
            foreach ($ejercicios as $ejercicio) {
                echo '<a class="navbar-item" href="' . $ejercicio["url"] . '">' . $ejercicio["nombre"] . '</a>';
            }
            ?>
        </div>
      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a>
            <strong> Desarrollado por Luis Sanchez</strong>
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>

<section class="section">
    <div class="container"></div>