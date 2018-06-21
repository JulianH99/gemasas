<?php

namespace App\DB;

/**
 * Provee una interfaz para la conexion con la base de datos a partir de las configuraciones
 * en el archivo Kernel.php
 *
 * @version 1.0.0
 * @package App\DB
 */
class DBConnection extends \PDO {

    private $dbConfig;

    public function __construct() {

        $this->dbConfig = $GLOBALS['config']['DB'];

        $connectionString = "";

        $connectionString .= $this->dbConfig['TYPE'];
        $connectionString .= ':host=' . $this->dbConfig['HOST'];
        $connectionString .= ';dbname=' . $this->dbConfig['NAME'];

        $pdoConfig = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_PERSISTENT => false,
            \PDO::ATTR_EMULATE_PREPARES => false
        ];

        parent::__construct($connectionString,
                            $this->dbConfig['USER'],
                            $this->dbConfig['PASSWORD'],
                            $pdoConfig);
    }
}