<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Peliculas</title>
    <link href="https://fonts.cdnfonts.com/css/harry-potter" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Denk+One&display=swap" rel="stylesheet">
    <?php

    if($_GET["cat"] == "terror" ){
        echo '<link rel="stylesheet" href="terror.css">';
    } elseif($_GET["cat"] == "harryPotter" ){
        echo '<link rel="stylesheet" href="harryPotter.css">';
    }
?>
</head>
<body>
    <?php
    require("peliculas.php");
    $categoria = 1;
    $pelicula1 = new Peliculas();
    $pelicula1->ObtenerLosDatos($categoria);
    $pelicula1->pintarPelicula();
    ?>
</body>
</html>