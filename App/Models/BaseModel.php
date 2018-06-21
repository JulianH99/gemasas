<?php
/**
 * Created by PhpStorm.
 * User: julian
 * Date: 6/21/18
 * Time: 12:21 PM
 */

namespace App\Models;


use App\DB\DBConnection;

/**
 * Contiene las caracteristicas basicas de cualquier modelo
 *
 * @version 1.0.0
 * @package App\Models
 */
class BaseModel {

    protected $db;

    public function __construct(){
        $this->db = new DBConnection();
    }

}