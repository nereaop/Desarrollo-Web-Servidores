<?php
class Calculadora{
    function factoriales($numero){
        $num = 1;
        for ($i= 1; $i <= $numero ; $i++) { 
            $num = $num * $i;
        }
        return $num;
    }
  

    function coeficienteBinomial($n,$k){
        
        $diferencia = $n - $k;

        $factorialNum1 = $this->factoriales($n);
        $factorialNum2 = $this->factoriales($k);
        $factorialDiferencia = $this->factoriales($diferencia);

        $operacion = $factorialNum1/ ($factorialNum2 * $factorialDiferencia);
        
        return $operacion;
    }

    function convierteBinarioDecimal($cadena){

    $base = 2;
    $potencia= 0;
    $resultado = 0;

        for ($i=0; $i < count($cadena); $i++) { 

            if($cadena[$i] == 1){
               $potencia = $base**$i;
               echo $potencia;
            }

           $resultado = $resultado + $potencia; 
        

        }
    
        return $resultado;
    }

}