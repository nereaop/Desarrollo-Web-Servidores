<?php
Class Peliculas{
    function init($id,$titulo,$duracion,$año,$sinopsis,$votos,$imagen){
       $this-> id = $id;
        $this->titulo = $titulo;
        $this-> duracion = $duracion;
        $this-> año = $año;
        $this-> sinopsis = $sinopsis;
        $this-> votos = $votos;
        $this-> imagen = $imagen;
    }
    function __construct(){

    }
    
    
function ObtenerLosDatos(){
    $arrayPeliculas = [];

    $conexion = mysqli_connect('localhost','root','1234');
    if(mysqli_connect_errno()){
        echo "Error al conectar a MySQL".mysqli_connect_error();
    }
    
    mysqli_select_db($conexion, 'cartelera');
    $id_categoria= $_GET["cat"];
    $sanitized_categoria_id = mysqli_real_escape_string($conexion,$id_categoria);
    $consulta = "SELECT id,titulo,duracion,año,sinopsis,votos,imagen FROM t_peliculas WHERE idCategoria = $id_categoria ORDER BY votos DESC";

    $resultado = mysqli_query($conexion,$consulta);

    if(!$resultado){
        $mensaje = 'Consulta inválida: '.mysqli_error($conexion). "\n";
        $mensaje = 'Consulta inválida: '.$consulta;
        die($mensaje);
    }else{
        if(($resultado->num_rows) > 0){
            
    $contador = 0;

    while($registro = mysqli_fetch_assoc($resultado)){
        $p = new Peliculas();
        $p->init($registro["id"],$registro["titulo"],$registro["duracion"],$registro["año"],$registro["sinopsis"],$registro["votos"],$registro["imagen"]);
        $arrayPeliculas[$contador] = $p;
        $contador++;
    }
    } else{
        echo "No hay resultados";
    }
    return $arrayPeliculas;
}
}
function pintarPelicula($arrayPeliculas){
    //var_dump($arrayPeliculas);
    
$id_categoria= $_GET["cat"];
 $peliculas = count($arrayPeliculas);
 echo "<div class='contenedor'>";
     echo "<div class= 'navBar'>";
     echo "<h3> CARTELERA </h3>";
     echo "</div>";
     for ($i=0; $i < $peliculas; $i++) { 
    
     echo "<div class='segunda_caja'>";
     echo "<div class='primera_columna'>";
     echo "<div class='contenedorImagen'>";
     echo "<h1>";
     echo $arrayPeliculas[$i]->titulo;
     echo "</h1>";
     echo "<img src= ' ";
     echo $arrayPeliculas[$i]->imagen;
     echo "' alt='' class='imagen'>";
     echo "<p> Duracion: ";
     echo $arrayPeliculas[$i]->duracion;
     echo "</p>";
     echo "</div>";
     echo "</div>";
     echo "<div class='segunda_columna'>";
     echo "<div class='contenedorInformacion1'>";
     echo "<h2>Sinopsis:</h2>";
     echo "<p>";
     echo $arrayPeliculas[$i]->sinopsis;
     echo "</p>";
     echo "<a href='ficha.php?ficha= ";
     echo $arrayPeliculas[$i]->id;
     echo "'>Ver ficha</a>";
     echo "<p>Votos: ";
     echo $arrayPeliculas[$i]->votos;
     echo "</p>";
     echo "</div>";
     echo "</div>";
     echo "</div>";
     echo "</div>";
 }
}

}


