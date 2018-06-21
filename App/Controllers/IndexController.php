<?php

namespace App\Controllers;

use App\Models\User;

class IndexController extends BaseController {

    public function index() {
        $this->view->render('home');
    }

    /**
     * Carga el archivo dado por el usuario, validandolo, y guardando los usuarios
     * en la base de datos
     *
     * @throws \Exception
     */
    public function loadArchive() {


        if(isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['error'] !== 4
            && $_FILES['uploaded_file']['tmp_name'] !== '') {

            $file = $_FILES['uploaded_file'];

            $uploadOk = true;

            $openedFile = fopen($file['tmp_name'], 'r');

            $usersInfo = [];

            while($row = fgetcsv($openedFile, 1000, ',')) {
                $usersInfo[] = $row;
                if(count($row) !== 4 || !in_array($row[3], [1,2,3])) {
                    $uploadOk = false;
                }
            }

            if($uploadOk) {

                foreach ($usersInfo as $userInfo) {
                    $email = $userInfo[0];
                    $name = $userInfo[1];
                    $lastname = $userInfo[2];
                    $state = $userInfo[3];

                    $tmpUser = new User();

                    $tmpUser->setEmail($email)
                        ->setName($name)
                        ->setLastname($lastname)
                        ->setState($state);

                    $tmpUser->save();
                }

                $url = $GLOBALS['config']['APP']['URL'];

                header("location: $url?c=index&m=details");
            }
            else {
                $this->view->render('home', ['error' => 'El archivo ingresado no es valido']);
            }

        }
        else {
            $this->view->render('home', ['error' => 'El archivo es requerido']);
        }
    }

    /**
     * Obtiene los usuarios a partir del estado y los renderiza en la vista correspondiente
     *
     * @throws \Exception
     */
    public function details() {

        $tmpUser = new USer();

        $activeUsers =  $tmpUser->read(1);
        $inactiveUsers = $tmpUser->read(2);
        $awaitingUsers = $tmpUser->read(3);

        $this->view->render('details', [
            'activeusers' => $activeUsers,
            'inactiveusers' => $inactiveUsers,
            'awaitingusers' => $awaitingUsers
        ]);

    }
}