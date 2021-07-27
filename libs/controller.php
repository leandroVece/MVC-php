<?php
   // require_once 'controllers/error.php';
   //controlador base o controlador padre de los demas controladores
class controller{

    function __construct(){
        $this->view = new view();   
    }
    
    
    function loadModel($model){
        $url = 'models/'.$model.'Model.php';

        if(file_exists($url)){
            require $url;

            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }

}


?>