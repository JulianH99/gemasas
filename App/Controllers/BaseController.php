<?php

namespace App\Controllers;

use App\DB\DBConnection;
use App\Utils\View;

/**
 * Clase base para todos los controladores de la aplicacion, contiene las definiciones 
 * basicas que estos pueden usar dentro de su flujo de trabajo
 * 
 * @version 1.0
 */
class BaseController {

    /**
     * @var View
     */
    protected $view;

    /**
     * Inicializa las variabes del controlador
     */
    public function __construct() {
        $this->view = new View();
    }


    /**
     * Punto inicial del controlador. Debe ser sobreescrito en los controladores
     * que hereden esta clase.
     *
     */
    public function index() {
        return new \Exception("El metodo no retorna ninguna vista. Contacte con el administrador");
    }

}