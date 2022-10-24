<html>
<head>
    <title>Inicio</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="contenedor">
        <div class="primera_caja">
            <a href="index.php">INICIO &nbsp</a>
            <a href="pagina1.html">Primera pagina &nbsp</a>
            <a href="pagina2.html">Segunda pagina &nbsp</a>
        </div>
        <div class="segunda_caja">
           <div class="primera_columna">
            <h1>Indice</h1>
            <br>
            <a href="index.php">Inicio</a>
            <br>
            <a href="vocales.php">Primer Ejercicio</a>
            <br>
            <a href="segundoejercicio.html">Segundo Ejercicio</a>
            <br>
            <a href="tercerejercicio.html">Tercer Ejercicio</a>
           </div>
           <div class="segunda_columna">
           <a href="holamundo.php">Hola mundo</a>
           <div>Curso de PHP- Bucles y arrays</div>
            <?php
                $personas = ["Carlos", "Oscar", "Jose"];

            ?>
            <ul>
                <?php
                    foreach ($personas as $persona){
                        echo "<li> $persona</li>";
                    }

                    $contador = count($personas);

                    for ($i = 0; $i < $contador; $i++) 
                    {
                        echo "<li>".$personas[$i]."</li>";
                    }

                    echo "<br>";
                    $i = 1;

                    while($i <= 10){
                        echo $i++;
                    }

                    define("MAX_VALUE", 10);

                    echo "<br>El valor de la constante de MAX_VALUE es: " .MAX_VALUE."<br>";

                    const MIN_VALUE = 1 ;

                    echo "El valor de la constante MIN_VALUE es: ".MIN_VALUE."<br>";
                ?>
            </ul>
           </div>
           <div class="tercera_columna">
            <?php
            $numero_entero = 5;
            $numero_flotante = 6.5;
            $cadena = "Hi";

            echo gettype($numero_entero)." ".$numero_entero . "<br>";
            echo gettype($numero_flotante)." ".$numero_flotante ."<br>";
            echo gettype($cadena)." ".$cadena . "<br>";
            ?>
           </div>
        </div>
        <div class="tercera_caja">
            <?php
            function obtenerInformacion($variable){
                $cadena ='[ ';
                foreach($variable as $key=>$val){
                    $cadena.=$key.'=>'.$val.",<br>";
                }
                $cadena.=']';
                return $cadena;
            }
            ?>
        </div>
    <div>
</body>
</html>

