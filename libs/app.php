<?php
    require_once 'controllers/Errores.php';
class app{

    function __construct(){

        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url,'/');
        $url = explode('/',$url);

        //inicio por defecto
        if (empty($url[0])) {
    
            $archivoController = 'controllers/loguin.php';
            require_once $archivoController;
            $controller = new loguin();
            $controller->loadModel('loguin');
            $controller->render();
            return false;

        }

        else {
            
            $archivoController = 'controllers/'.$url[0].'.php';
    
            if (file_exists($archivoController)) {
                require_once $archivoController;
                //url[0] llama al controlador que se maneja a travez de la url
                $controller = new $url[0];
                
                $controller->loadModel($url[0]);
                //url[1] llama al metodo del controlador si es que hay
                
                //defino la cantidad de elementos que tiene mi array, desde el trecero son variables
                $numElementos = sizeof($url);
                //echo $url[2];
                
                if ($numElementos >1) {  
                    if ($numElementos >2){
                        $parametros = [];
                        for ($i=2; $i<$numElementos ; $i++) { 
                            array_push($parametros,$url[$i]);
                        }
                        $controller->{$url[1]}($parametros);
                    }
                    else {
                        $controller->{$url[1]}();
                    }
                }
                else {
                    $controller->render();
                }
    
            }
            else {
                $controller = new Errores();
            }
        }

        
    }
    

}


?>