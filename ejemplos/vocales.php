<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Vocales</title>
</head>
<body>
<?php
      function obtenerParametro($parametro)
      {
        $result = "";
        if (!empty($_GET[$parametro]))
          $result = $_GET[$parametro];

        return $result;
 
      }
    ?>


    <?php
      ini_set('display_errors', 'On');
      ini_set('html_errors', 0);
          
      $variable_letra = obtenerParametro("letra");

      if ($variable_letra=="")
      {
        echo "Parámetro vacio";
      }
      else
      {
        require("funciones_y_condiciones.php"); 

        $mensaje = '<p>La letra: '.$variable_letra.'</p>';
        $mensaje_es_vocal = esVocal($variable_letra) ? '<p>Es una vocal</p>' : '<p>No es una vocal</p>';
        echo $mensaje.$mensaje_es_vocal;
      }
    ?>
</body>
</html>