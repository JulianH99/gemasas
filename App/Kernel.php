<?php

namespace App;


/**
 * Inicializa la aplicacion, definiendo la configuracion e incluyendo el dispatcher de la aplicacion
 *
 * @package App
 * @version 1.0.0
 */
class Kernel {

    /**
     * Contiene el dispatcher proveido en el archivo index.php
     * @var Dispatcher
     * @see \App\Dispatcher
     */
    protected $dispatcher;

    public function __construct() {

        $GLOBALS['config'] = [
            "DB" => [
                "HOST" => "localhost",
                "NAME" => "pjerrejerre",
                "USER" => "root",
                "PASSWORD" => "sabertooth99",
                "TYPE" => "mysql"
            ],
            "APP" => [
                "NAME" => "GEMA SAS",
                "URL" => "http://localhost/proyectoJerreJerre/",
                "PATH" => __DIR__,
                "PUBLIC_PATH" => __DIR__ . '/../public/'
            ]
        ];
    }

    public function setDispatcher(Dispatcher $dispatcher) {
        $this->dispatcher = $dispatcher;
    }

    public function dispatch() {
        $this->dispatcher->dispatch();
    }

}