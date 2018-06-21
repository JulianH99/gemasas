<?php

namespace App\DB;


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