<?php
    function control($control){
        $aux = array_values($control);
        for ($i=0; $i < count($aux) ; $i++) { 
            if ((strlen(stristr($aux[$i],'"'))>0) || (strlen(stristr($aux[$i],'<'))>0) || (strlen(stristr($aux[$i],'/'))>0) ||
                (strlen(stristr($aux[$i],'>'))>0) || (strlen(stristr($aux[$i],"'"))>0) || (strlen(stristr($aux[$i],";"))>0)  ) {
                $control = null;
            }
        }
        
        return $control;
    }

    function strComillas($clave){
        $array='';
        for ($i=0; $i < count($clave); $i++) {
            $array .= "'$clave[$i]',";            
        }
        return trim($array,', ');
    }
    function strSinComillas($clave){
        $array='';
        for ($i=0; $i < count($clave); $i++) {
            $array .= $clave[$i].', ';            
        }
        return trim($array,', ');
    }

    ?>