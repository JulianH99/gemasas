<?php

/**
 * Punto inicial de la aplicacion
 */

include "./vendor/autoload.php";


error_reporting( E_ALL );
ini_set( "display_errors", 1 );

$kernel = new \App\Kernel();


$kernel->setDispatcher(new \App\AppDispatcher());


$kernel->dispatch();