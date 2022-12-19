<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Peliculas</title>
    <link href="https://fonts.cdnfonts.com/css/harry-potter" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Denk+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hanalei+Fill&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="formulario.css">
    <?php

    if($_GET["cat"] == 1 ){
        echo '<link rel="stylesheet" href="terror.css">';
    } elseif($_GET["cat"] == 2 ){
        echo '<link rel="stylesheet" href="harryPotter.css">';
    }
?>
</head>
<body>
    <?php
    require("peliculas.php");
   
    $pelicula1 = new Peliculas();
    $peliculas = $pelicula1->ObtenerLosDatos();
    $pelicula1 = $pelicula1->pintarPelicula($peliculas);
    ?>
</body>
</html>