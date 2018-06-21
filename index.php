<?php

/**
 * Punto inicial de la aplicacion
 */

include "./vendor/autoload.php";


$kernel = new \App\Kernel();


$kernel->setDispatcher(new \App\AppDispatcher());


$kernel->dispatch();