<?php

namespace App;

/**
 * Provee el comportamiento necesario para el correcto direccionamiento de la aplicacion
 *
 * @package App
 */
interface Dispatcher {

    /**
     * redirecciona a la ruta especificada mediante la url, dependiendo del controlador
     * especificado y el metodo
     *
     * @return mixed
     */
    public function dispatch();
}