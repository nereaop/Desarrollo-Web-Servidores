<?php
Class Peliculas{
    function init($id,$titulo, $sinopsis,$duracion,$año,$votos,$imagen){
        $this-> id = $id;
        $this->titulo = $titulo;
        $this-> sinopsis = $sinopsis;
        $this-> duracion = $duracion;
        $this-> año = $año;
        $this-> votos = $votos;
        $this-> imagen = $imagen;
    }
    function __construct(){

    }
    
    
function ObtenerLosDatos($categoria){
$arrayPeliculas = [];

$conexion = mysqli_connect('localhost','root','1234');
if(mysqli_connect_errno()){
    echo "Error al conectar a MySQL".mysqli_connect_error();
}
mysqli_select_db($conexion, 'cartelera');
$id_categoria = $_POST['id_categoria'];
$sanitized_categoria_id = mysqli_real_escape_string($conexion,$id_categoria);
$consulta = "SELECT id,titulo,duracion,año,sinopsis,votos,imagen FROM t_peliculas WHERE idCategoria = $categoria";

$resultado = mysqli_query($conexion,$consulta);

if(!$resultado){
    $mensaje = 'Consulta inválida: '.mysqli_error($conexion). "\n";
    $mensaje = 'Consulta inválida: '.$consulta;
    die($mensaje);
}else{
    if(($resultado->num_rows) > 0){
        
$contador = 0;

   while($registro = mysqli_fetch_assoc($resultado)){
      $arrayPeliculas[$contador] = new Peliculas($registro["id"],$registro["titulo"],$registro["duracion"],$registro["año"],$registro["sinopsis"],$registro["votos"],$registro["imagen"]);
   }
} else{
    echo "No hay resultados";
}
return $arrayPeliculas;
}
}

function pintarPelicula(){

    echo "<div class='contenedor'>
    <div class='navBar'>
    </div>
    <div class='segunda_caja'>
       <div class='primera_columna'>
        <div class='contenedorImagen'>
        <h1>$this->titulo</h1>
        <img src=$this->imagen alt='Harry Potter Y La Piedra Filosofal' class='imagen'>
       </div>
</div>
       <div class='segunda_columna'>
        <div class='contenedorInformacion1'>
        <h1>Sinopsis:</h1>
        <p>$this->sinopsis</p>
        <a href='ficha.php'>Ver ficha</a>
        <p>$this->votos</p>
        </div>
       </div>
    </div>
<div>";
}
}


