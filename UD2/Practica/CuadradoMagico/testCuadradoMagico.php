<?php
require("cuadrado_magico.php");



function test_sumaFilas_Erroneo(){

    $prueba1 = array(
        array(4,9,2),
        array(9,5,7),
        array(8,1,6)
    );


    $resultado_que_espero =[15,21,15];
    
    $resultadoObtenido = sumaFila($prueba1);

    return($resultadoObtenido == $resultado_que_espero);
 };

function test_sumaColumnas_Correcto(){
    
    $prueba2 = array(
        array(4,9,2),
        array(3,5,7),
        array(8,1,6)
        );
    
        $resultado_que_espero =[15,15,15];
    
        $resultadoObtenido = sumaColumna($prueba2);
    
        return($resultadoObtenido == $resultado_que_espero);
}

function test_sumaDiagonales_Correcto(){
    
    $prueba3 = array(
        array(4,9,2),
        array(3,5,7),
        array(8,1,6)
        );

        
        $resultado_que_espero =[15,15];
    
        $resultadoObtenido = sumaDiagonales($prueba3);
    
        return($resultadoObtenido == $resultado_que_espero);
}


function test_CuadradoMagico_Erroneo(){

    $prueba4 = array(
        array(4,9,2),
        array(3,9,7),
        array(8,1,6)
        );

        $resultados_que_espero = new Guardar_Resultados($prueba4,[15,19,15],[15,19,15],[19,19],15,false);

        $resultadoObtenido = analizarCuadradoMagico($prueba4);
        
        $pintar = pintarCuadradoMagico($resultados_que_espero);
        return($resultadoObtenido == $resultados_que_espero);
        

}
function test_CuadradoMagico_Correcto(){

    $prueba5 = array(
        array(4,9,2),
        array(3,5,7),
        array(8,1,6)
        );

        $resultados_que_espero = new Guardar_Resultados($prueba5,[15,15,15],[15,15,15],[15,15],15,true);

        $resultadoObtenido = analizarCuadradoMagico($prueba5);
        
        $pintar = pintarCuadradoMagico($resultados_que_espero);
        return($resultadoObtenido == $resultados_que_espero);
        

}

function test($testEjecutar){
    try 
    {
        echo "<br>";
        $resultadoTest = $testEjecutar();
        $mensaje = 'El test: '.$testEjecutar.' es: ';
        $mensajeResultado = $resultadoTest ? 'OK' : 'KO';
        echo $mensaje.$mensajeResultado;

    }
    catch(Exception $e)
    {
        echo "<br>"."Se ha producido una excepción al ejecutar:".$testEjecutar."<br>";

    } 
};
echo "Test sumar filas: ";
test("test_sumaFilas_Erroneo");
echo "<br>";
echo "<br>Test sumar columnas: ";
test("test_sumaColumnas_Correcto");
echo "<br>";
echo "<br>Test sumar diagonales: ";
test("test_sumaDiagonales_Correcto");
echo "<br>";
echo "<br>Test cuadrado magico erroneo:";
test("test_CuadradoMagico_Erroneo");
echo "<br><br><br><br><br><br><br><br><br><br><br>";
echo "<br>Test cuadrado magico valido:";
test("test_CuadradoMagico_Correcto");