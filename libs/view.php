<?php
   // require_once 'controllers/error.php';
   //view base
class view{

    function __construct(){
        
    }

    function render($nombre){
        require_once 'view/'.$nombre.'.php';
    }
    

}
