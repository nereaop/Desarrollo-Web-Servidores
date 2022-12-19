<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ficha</title>
</head>
<body>
    <?php
require("peliculas.php");
Class Ficha{
    function init($id,$titulo,$duracion,$año,$actores,$director,$sinopsis,$votos,$imagen){
        $this->id = $id;
        $this->titulo = $titulo;
        $this-> duracion = $duracion;
        $this-> año = $año;
        $this-> actores = $actores;
        $this-> director = $director;
        $this-> sinopsis = $sinopsis;
        $this-> votos = $votos;
        $this-> imagen = $imagen;
    }
    function __construct(){

    }
    function ObtenerLosDatosFicha(){
    

        $conexion = mysqli_connect('localhost','root','1234');
        if(mysqli_connect_errno()){
            echo "Error al conectar a MySQL".mysqli_connect_error();
        }
        mysqli_select_db($conexion, 'cartelera');
        $id_pelicula = $_GET["ficha"];
        $sanitized_categoria_id = mysqli_real_escape_string($conexion,$id_pelicula);
        $consulta = "SELECT t_peliculas.id,titulo, duracion, año, group_concat(t_actores.nombre,' ',t_actores.apellidos) Actores,concat_ws(' ', t_directores.nombre, t_directores.apellidos) Director, sinopsis, votos, imagen FROM t_peliculas inner join t_directores on idDirectores = t_directores.id inner join t_actor_pelicula on t_peliculas.id = t_actor_pelicula.id_pelicula inner join t_actores on t_actor_pelicula.id_actor = t_actores.id WHERE t_peliculas.id = $id_pelicula";
    
        $resultado = mysqli_query($conexion,$consulta);
    
        if(!$resultado){
            $mensaje = 'Consulta inválida: '.mysqli_error($conexion). "\n";
            $mensaje = 'Consulta inválida: '.$consulta;
            die($mensaje);
        }else{
            if(($resultado->num_rows) > 0){
                
        $contador = 0;
    
        while($registro = mysqli_fetch_assoc($resultado)){
            $ficha = new Ficha();
            $ficha->init($registro["id"],$registro["titulo"],$registro["duracion"],$registro["año"],$registro["Actores"],$registro["Director"],$registro["sinopsis"],$registro["votos"],$registro["imagen"]);
        }
        } else{
            echo "No hay resultados";
        }
        return  $ficha;
    }
    }
    
    
    function pintarFicha($ficha){
            //var_dump($ficha);
            
            //INCOMPLETO
     echo "<div class='contenedor'>
        <div class='primera_columna'>
         <div class='contenedorImagen'>";
        echo "<h1>";
        echo $ficha->titulo;
        echo"</h1>";
        echo"<img src='";
        echo $ficha->imagen;
        echo "' alt='SMILE' class='imagen'>";
        echo "<p>Duracion: ";
        echo $ficha->duracion;
        echo "</p>";
        echo "<p> Año:";
        echo $ficha-> año;
        echo "</div>
        </div>
        <div class='segunda_columna'>
         <div class='contenedorInformacion'>
             <h1>Sinopsis</h1> <br>";
        echo "<p> ";
        echo $ficha->sinopsis;
        echo "</p><br>";
        echo "<p>Reparto: ";
        echo $ficha->actores;
        echo "</p><br>"; 
        echo "<p> Director: ";
        echo $ficha->director;
        echo "</p><br>";
        echo "<p>Votos: ";
        echo $ficha->votos;
        echo "</p><br>";
        echo "<form action='votos.php' method='post'>";
        echo "<input class='button-50' id='votar' type='submit'  value='Votar'>";
        echo "<input id='votar' name ='votar' type='hidden'  value='$ficha->id'>";
        echo "</form>";
        echo "<br><a href='categoria.php'>Volver a categorias.";
        echo "</div>";
        echo "</div>";
        echo "</div>";
     }
}

if($_GET["ficha"] < 19 ){
    echo "<link rel='stylesheet' href='ficha.css'>";
};

$ficha1 = new Ficha();
$ficha = $ficha1->ObtenerLosDatosFicha();
$ficha1 = $ficha1->pintarFicha($ficha);
?>
</body>
</html>