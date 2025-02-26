<?php

class Plantilla {
    static $instancia = null;

    public static function inicio() {
        if (self::$instancia == null) {
            self::$instancia = new Plantilla();
        }
        return self::$instancia;
    }

    public function __construct() {
        require('plantilla/cabeza.php');
    }

    public function __destruct() {
        require('plantilla/pie.php');
    }
}