<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="categoria.css">
    <link href="https://fonts.googleapis.com/css2?family=Alice&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <title>Categoria</title>
</head>
<body>
    <?php
    Class Categoria{
        function init($idCategoria,$nombreCategoria){
            $this-> idCategoria = $idCategoria;
            $this-> nombreCategoria = $nombreCategoria;
         }
         function __construct(){
     
         }
         
function ObtenerCategoria(){
    $arrayCategoria = [];

    $conexion = mysqli_connect('localhost','root','1234');
    if(mysqli_connect_errno()){
        echo "Error al conectar a MySQL".mysqli_connect_error();
    }
    mysqli_select_db($conexion, 'cartelera');
    $consulta = "SELECT id,nombre from t_categoria;";
    $resultado = mysqli_query($conexion,$consulta);

    if(!$resultado){
        $mensaje = 'Consulta inválida: '.mysqli_error($conexion). "\n";
        $mensaje = 'Consulta inválida: '.$consulta;
        die($mensaje);
    }else{
        if(($resultado->num_rows) > 0){
            
            $contador = 0;

    while($registro = mysqli_fetch_assoc($resultado)){
        $c= new Categoria();
        $c->init($registro["id"],$registro["nombre"]);
        $arrayCategoria[$contador] = $c;
        $contador++;
    }
    } else{
        echo "No hay resultados";
    }
}
    return $arrayCategoria;
}

function pintarCategoria($arrayCategoria){
    echo "<div class='contenedor'>";
    echo "<div class='navBar'>";
    echo "<h1> CATEGORIAS </h1>";
    echo "</div>";
    $categoria = count($arrayCategoria);
    for($i = 0; $i < $categoria ;$i++){
        echo "<div class='contenedorBoton'>";
        echo "<div class='glow-on-hover'>";
        echo "<a href='pelicula.php?cat= ";
        echo $arrayCategoria[$i]->idCategoria;
        echo "' target='_blank'>";
        echo "<h2>";
        echo $arrayCategoria[$i]->nombreCategoria; 
        echo "</h2>";
        echo "</a>";
        echo "</div>
            </div>
            </div>";
        }
    }
}
$categoria1 = new Categoria();
$categoria = $categoria1->ObtenerCategoria();
$categoria1= $categoria1->pintarCategoria($categoria);
?>
</body>
</html>