<?php

ini_set('display_errors', 'On');
ini_set('html_errors',0);

$numeros = array(1,2,5,7,5,8,9,2,6,3);


function buscarLaPosicion($numero, $arrayNumeros){
    $contador = count($arrayNumeros);
    $i = 0;

    while($i < $contador){
        if($arrayNumeros[$i] == $numero){
            return $i;
        }else{
            $i++;
        }
    }
};

$resultado = buscarLaPosicion(4, $numeros);



if($resultado != -1){
    echo "La posicion es: ".$resultado;
}else{
    echo "No se encuentran resultados";
}

?>