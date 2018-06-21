<?php

namespace App;

use App\Controllers\IndexController;


/**
 * Se encarga de redireccionar segun el controllador y el metodo elegido
 *
 * @version 1.0.0
 * @package App
 */
class AppDispatcher implements Dispatcher {

    private $config;

    public function __construct(){
        $this->config = $GLOBALS['config']['APP'];
    }


    /**
     *
     * @see \App\Dispatcher::dispatch()
     * @return \Exception|mixed|void
     * @throws \Exception
     */
    public function dispatch() {

        $controller = isset($_REQUEST['c']) ? $_REQUEST['c'] : '';
        $method = isset($_REQUEST['m']) ? $_REQUEST['m']: '';

        if(!empty($controller)) {
            $controllerFullName = ucfirst($controller) . 'Controller';


            if(file_exists($this->config['PATH']
                    . '/Controllers/'. $controllerFullName . '.php')) {
                $controllerInsName = "\App\Controllers\\$controllerFullName";
                
                $controllerIns = new $controllerInsName();

                if(!empty($method)){
                    if(method_exists($controllerIns, $method))
                        return $controllerIns->$method();
                    else
                        throw new \Exception("Metodo $method no encontrado en controlador $controller");
                }
                else{
                    return $controllerIns->index();
                }
            }
            else {
                throw new \Exception("Controllador $controller no encontrado");
            }

        }
        else {
            return (new IndexController())->index();
        }

    }
}