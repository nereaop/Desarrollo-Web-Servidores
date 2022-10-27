<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos_cuadrado_magico.css">
    <title>Practica</title>
</head>
<body>
    <?php
    $matriz = array(
    array(4,9,2),
    array(3,5,7),
    array(8,1,6)
    );

    echo "<h1> CUADRADO MAGICO </h1>";

    echo "<table>";
    foreach($matriz as $fila){
        echo "<tr>";
        foreach($fila as $columna){
            echo "<td>".$columna."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

   function sumaFila($matriz){
    $contador = count($matriz);
    for ($i=0; $i < $contador ; $i++) { 

        $max_filas_columnas = array_sum($matriz[$i]);
        echo "<p>".$max_filas_columnas."</p>";
    }
} 


//sumaFila($matriz);
    ?>
</body>
</html>