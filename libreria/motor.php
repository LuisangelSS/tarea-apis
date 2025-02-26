<?php
require("plantilla.php");

function get_ejercicio($numero){
    $ejercicios = get_lista_ejercicios();
    return $ejercicios[$numero];
}

function get_lista_ejercicios(){
    $ejercicios = array(
            1=>array(
                "nombre" => "Ejercicio 1",
                "descripcion" => "Predicción de género 👦👧",
                "url" => "/eje1.php",
                "api" => "https://api.genderize.io/?name=irma",
                "descripcion_api" => "Ingresar un nombre en un formulario y predecir si es masculino o femenino. Si es masculino, mostrar algo en azul 💙; si es femenino, en rosa 💖. Formulario: Entrada de texto para el nombre."
            ),
            2=>array(
                "nombre" => "Ejercicio 2",
                "descripcion" => "Predicción de edad 🎂",
                "url" => "/eje2.php",
                "api" => "https://api.agify.io/?name=meelad",
                "descripcion_api" => "Ingresar un nombre y determinar la edad estimada de la persona. Mostrar un mensaje indicando si es joven (👶), adulto (🧑) o anciano (👴). Agregar una imagen relativa a cada categoría. Formulario: Entrada de texto para el nombre."
            ),
            3=>array(
                "nombre" => "Ejercicio 3",
                "descripcion" => "Universidades de un país 🎓",
                "url" => "/eje3.php",
                "api" => "http://universities.hipolabs.com/search?country=Dominican+Republic",
                "descripcion_api" => "Permitir ingresar el nombre de un país en inglés y mostrar una lista de universidades. Mostrar el nombre, dominio y un link a la página web de cada universidad. Formulario: Entrada de texto para el nombre del país."
            ),
            4=>array(
                "nombre" => "Ejercicio 4",
                "descripcion" => "Clima en República Dominicana 🌦️",
                "url" => "/eje4.php",
                "api" => "http://api.weatherapi.com",
                "descripcion_api" => "Mostrar el clima actual en República Dominicana con iconos y temperatura. Adaptar el diseño a las condiciones climáticas (sol ☀️, lluvia 🌧️, nublado ☁️). Formulario: Entrada para buscar clima en una ciudad específica."
            ),
            5=>array(
                "nombre" => "Ejercicio 5",
                "descripcion" => "Información de un Pokémon ⚡",
                "url" => "/eje5.php",
                "api" => "https://pokeapi.co/api/v2/pokemon/pikachu",
                "descripcion_api" => "Ingresar el nombre de un Pokémon y mostrar su foto, experiencia base y habilidades. Usar un diseño acorde al universo Pokémon 🎮. Formulario: Entrada de texto para el nombre del Pokémon."
            ),
            6=>array(
                "nombre" => "Ejercicio 6",
                "descripcion" => "Noticias desde WordPress 📰",
                "url" => "/eje6.php",
                "api" => "https://public-api.wordpress.com/wp/v2/sites/tusitio.wordpress.com/posts",
                "descripcion_api" => "Obtener las últimas 3 noticias de una página hecha con WordPress. Mostrar el logo de la página, los titulares, resúmenes y enlaces. Formulario: Selección de una página de noticias para extraer los datos."
            ),
            7=>array(
                "nombre" => "Ejercicio 7",
                "descripcion" => "Conversión de Monedas 💰",
                "url" => "/eje7.php",
                "api" => "https://api.exchangerate-api.com/v4/latest/USD",
                "descripcion_api" => "Ingresar una cantidad en dólares (USD) y convertirla a pesos dominicanos (DOP) y otras monedas. Mostrar los valores de forma clara con iconos de monedas. Formulario: Entrada de cantidad en USD."
            ),
            8=>array(
                "nombre" => "Ejercicio 8",
                "descripcion" => "Generador de imágenes con IA 🖼️",
                "url" => "/eje8.php",
                "api" => "https://api.dynapictures.com/designs/{UID}",
                "descripcion_api" => "Ingresar una palabra clave y mostrar una imagen generada basada en la búsqueda. Formulario: Entrada de texto para la palabra clave."
            ),
            9=>array(
                "nombre" => "Ejercicio 9",
                "descripcion" => "Datos de un país 🌍",
                "url" => "/eje9.php",
                "api" => "https://restcountries.com/v3.1/name/dominican",
                "descripcion_api" => "Ingresar el nombre de un país y mostrar su bandera, capital, población y moneda. Formulario: Entrada de texto para el nombre del país."
            ),
            10=>array(
                "nombre" => "Ejercicio 10",
                "descripcion" => "Generador de chistes 🤣",
                "url" => "/eje10.php",
                "api" => "https://official-joke-api.appspot.com/random_joke",
                "descripcion_api" => "Mostrar un chiste aleatorio cada vez que el usuario visite la página. No necesita formulario."
            ),
    );
    return $ejercicios; 
}
?>
