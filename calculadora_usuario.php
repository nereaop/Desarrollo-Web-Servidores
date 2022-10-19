<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <?php
    require("calculadora.php");
    $calculadora1 = new Calculadora;
    
    $numero = 5;
    $resultado = $calculadora1->factoriales($numero);
    echo "<p> El factorial de $numero es: ".$resultado."</p>";

    $n = 7;
    $k = 5;

    $resultado2 = $calculadora1->coeficienteBinomial($n,$k);

    echo "<br> <p> El coeficinete Binominal de $n y $k es: ".$resultado2."</p>";
   
    $cadena =[1,0,0]; 

    $potencia = $calculadora1->convierteBinarioDecimal($cadena);

    echo "<br>".$potencia;

   ?>
</body>
</html>