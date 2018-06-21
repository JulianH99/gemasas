<?php

namespace App\Utils;

/**
 * Maneja la redireccion y la renderizacion de las vistas, pasando a su vez variables
 * por medio de la sesion a estas
 * 
 * @version 1.0.0
 * @package App\Utils
 */
class View {

    protected $config;

    public function __construct() {
        $this->config = $GLOBALS['config']['APP'];
    }

    /**
     * Renderiza la vista, incluyendola, y pasando las variables asignadas
     *
     * @param string $viewname Nombre de la vista a incluir
     * @param array $variables variables a incluir en la visa
     * @return void
     * @throws \Exception
     */
    public function render(string $viewname, array $variables = []) {

        if(!empty($viewname)) {
            $publicPath = $this->config['PUBLIC_PATH'];



            $viewPath = $publicPath . 'views/' . $viewname . '.php';

            if(file_exists($viewPath)) {

                if(count($variables) !== 0) {
                    foreach($variables as $var => $val) {
                        $_SESSION[$var] = $val;
                    }
                }

                include $viewPath;
            }
            else {
                throw new \Exception("La vista $viewname no existe");
            }
        }

    }
}