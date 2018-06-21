<?php

namespace App\Models;


/**
 * Representa el modelo Usuario, junto con los datos necesarios para el funcionamiento
 * de la aplicacion
 *
 * @version 1.0.0
 * @package App\Models
 */
class User extends BaseModel {

    private $id;
    private $email;
    private $name;
    private $lastname;
    private $state;

    public function __construct(){
        parent::__construct();
    }

    /**
     * Guarda un usuario en la base de datos
     *
     * @return bool
     */
    public function save() {

        $sql = "insert into usuarios(nombre, apellido, email, estado)"
                . " values (:nombre, :apellido, :email, :estado)";


        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':nombre', $this->name);
        $stmt->bindParam(':apellido', $this->lastname);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':estado', $this->state);

        return $stmt->execute()? true : false;

    }

    /**
     * Obtiene los usuarios de la base de datos a partir del estado ($state) pasado como parametro.
     * Si el estado no es proveeido, es decir, tiene un valor de cero, devuelve todos los usuarios
     *
     * @param int $state
     * @return array
     */
    public function read($state = 0) {
        $sql = "select * from usuarios";

        if($state !== 0)
            $sql .= " where estado = :state";

        $stmt = $this->db->prepare($sql);

        if($state !== 0)
            $stmt->bindParam(':state', $state);

        $stmt->execute();

        $users = [];

        while($row = $stmt->fetch(\PDO::FETCH_OBJ))
            $users[] = $row;

        return $users;
    }

    /**
     * @param mixed $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param mixed $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param mixed $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param mixed $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @param mixed $state
     * @return User
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }





}