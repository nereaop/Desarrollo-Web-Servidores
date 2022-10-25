<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Desarrollo de aplicaciones web en entorno servidor</title> 
</head>
<body>
<div> Curso de PHP - Práctica: canción infantil.</div>
<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 0);
    $palabras = ["el", "sapo", "no", "se","lava","el","pie."];
    $vocales = ["a", "e", "i", "o","u"];
?>


<?php
    function escribir($word,$vocal)
    {
        $length = strlen($word);
        for ($i=0; $i<$length;$i++)
            if (in_array($word[$i], array("a", "e", "i", "o","u")))
                echo $vocal;
            else
                echo $word[$i];
    }
?>

<?php
    echo "<div>";
    foreach ($palabras as $p)
        echo $p." ";
    echo "</div>";

    foreach ($vocales as $v)
    {   echo "<div>";
        foreach ($palabras as $p)
            echo escribir($p,$v)." ";
        echo "</div>";
    }
?>
</body>
</html>