<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="votos.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Voto</title>
</head>
<body>
<?php
Class Voto{
    function init($idPelicula){
    $this-> idPelicula = $idPelicula;
    }
     function __construct(){
 
     }

function ObtenerVoto(){
    $conexion = mysqli_connect('localhost','root','1234');
    if(mysqli_connect_errno()){
        echo "Error al conectar a MySQL".mysqli_connect_error();
    }
    
    mysqli_select_db($conexion, 'cartelera');
    $id_pelicula= $_POST["votar"];
    $sanitized_categoria_id = mysqli_real_escape_string($conexion,$id_pelicula);
    $consulta = "UPDATE t_peliculas set votos = votos + 1  where id = $id_pelicula";

    $resultado = mysqli_query($conexion,$consulta);

    if(!$resultado){
      echo "<div class='contenedor'>";
      echo "<h1>¡A OCURRIDO UN ERROR! La pelicula no ha podido ser votada :(</h1> <br>";
      echo "<a href='categoria.php'>Volver a categorias</a>";
      echo "</div>";
    }else{
        echo "<div class='contenedor'>";
        echo "<h1>¡La pelicula ha sido votada con exito! <br> Gracias por votar :) </h1>";
        echo "<img src='imagenes/patito.gif' alt ='patito'> <br>";
        echo "<a href='categoria.php'>Volver a categorias</a>";
        echo "</div>";
    } 
}
}



$voto = new Voto();
$votos = $voto->ObtenerVoto();

?>
</body>
</html>