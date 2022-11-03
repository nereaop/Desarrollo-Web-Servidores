<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos_cuadrado_magico.css">
    <title>Practica</title>
</head>
<body>
    <?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require("guardarResultados.php");

    $matriz = array(
    array(4,9,2),
    array(3,5,7),
    array(8,1,6)
    );

  

function sumaFila($matriz){

    $arrayResultado = [];

    $contador = count($matriz);
    for ($i=0; $i < $contador ; $i++) { 

       $resultadoFilas = $max_filas_columnas = array_sum($matriz[$i]);
       array_push($arrayResultado,$resultadoFilas);
    }
    return $arrayResultado;
};

function sumaColumna($matriz){

    $arrayResultado = [];

    $contador = count($matriz);
   
    for ($i=0; $i < $contador ; $i++) { 
        $resultadoColumna = 0;
        for ($j=0; $j < $contador ; $j++) { 
       $resultadoColumna = $matriz[$j][$i] + $resultadoColumna;
        }
        array_push($arrayResultado,$resultadoColumna);
    }
    
    return $arrayResultado;
};

function sumaDiagonales($matriz){

    $arrayResultado = [];

    $resultado_diagonal_izq = 0;
    $resultado_diagonal_der = 0;
    $contador = (count($matriz) - 1);

    for($i = 0; $contador >= $i; $i++){
       $resultado_diagonal_izq = $resultado_diagonal_izq + $matriz[$i][$i];
    }
    for($i = 0; $contador >= $i; $i++){
       $resultado_diagonal_der = $resultado_diagonal_der + $matriz[$i][$contador - $i];
    }
    array_push($arrayResultado,$resultado_diagonal_izq);
    array_push($arrayResultado,$resultado_diagonal_der);
    return $arrayResultado;
};


function analizarCuadradoMagico($matriz){
  $filas= sumaFila($matriz);
  $contador = count($filas);

 for($i= 0; $i < $contador; $i++){
   $filas[$i];
  };

  $columnas= sumaColumna($matriz);
  $contador = count($columnas);

 for($i= 0; $i < $contador; $i++){
     $columnas[$i];
  };

  $diagonales = sumaDiagonales($matriz);
  $contador = count($diagonales);

for($i= 0; $i < $contador; $i++){
     $diagonales[$i];
 };

 $contador= count($matriz);

$primerResultado = 0;

 for($i= 0; $i < $contador; $i++){
    $primerResultado = $primerResultado + $matriz[0][$i];
 }


$esCuadradoMagico = true;

$contador = count($filas);

for($i = 0; $i < $contador; $i++){
    if($filas[$i] != $primerResultado){
        $esCuadradoMagico = false;
    }
    if($columnas[$i] != $primerResultado){
        $esCuadradoMagico = false;
    }
};

$contador = count($diagonales);

for($i= 0; $i < $contador; $i++){
    if($diagonales[$i] != $primerResultado){
    $esCuadradoMagico = false;
    }
}
$guardarResultados = new Guardar_Resultados($matriz,$filas,$columnas,$diagonales,$primerResultado,$esCuadradoMagico);
return $guardarResultados;
};

function pintarCuadradoMagico($guardarResultados){
    
    echo "<h1> CUADRADO MAGICO </h1>";

    echo "<table>";
    foreach($guardarResultados->matriz as $fila){
        echo "<tr>";
        foreach($fila as $columna){
            echo "<td>".$columna."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

   

    if($guardarResultados->esCuadradoMagico){
        echo "<div class='centrado'>";
            echo "<h3 class='verdadero'> &#9989; ES UN CUADRADO MAGICO </h3>";
            echo "</div>";
        } else{
            echo "<div class='centradoError'><h3 class='falso'> &#10060; NO ES UN CUADRADO MAGICO </h3></div>";
            echo "<div class='centradoError'>";
            echo "<p>Respecto a la suma de la primera fila que es ".$guardarResultados->primerResultado."</p>";
            echo "<p> Las filas diferentes a ".$guardarResultados->primerResultado." son: </p>";
            for($i = 0; $i < count($guardarResultados->filas); $i++){
                if($guardarResultados->filas[$i] != $guardarResultados->primerResultado){
                    echo "<p> Fila: ".($i+1)."</p>";
                }
            }
            echo "<p> Las columnas diferentes a ".$guardarResultados->primerResultado." son: </p>";
            for($i = 0; $i < count($guardarResultados->columnas); $i++){
                if($guardarResultados->columnas[$i] != $guardarResultados->primerResultado){
                    echo "<p> Columna: ".($i+1)."</p>";
                }
            }
            if($guardarResultados->diagonales[0] != $guardarResultados->primerResultado && $guardarResultados->diagonales[1] != $guardarResultados->primerResultado){
                echo "<p> Las diagonales diferente a ".$guardarResultados->primerResultado." son: </p>";
                echo "<p> Primera y segunda diagonal</p>";
            }elseif($guardarResultados->diagonales[0] != $guardarResultados->primerResultado){
                echo "<p> La diagonal diferente a ".$guardarResultados->primerResultado." es: </p>";
                    echo "<p> Primera diagonal</p>";
                }elseif($guardarResultados->diagonales[1] != $guardarResultados->primerResultado){
                    echo "<p> Las diagonal diferente a ".$guardarResultados->primerResultado." es: </p>";
                    echo "<p> Segunda diagonal</p>";
                }
               
            }
           echo "</div>";
        }
        
// $resultados = analizarCuadradoMagico($matriz);
// pintarCuadradoMagico($resultados);

    ?>
</body>
</html>