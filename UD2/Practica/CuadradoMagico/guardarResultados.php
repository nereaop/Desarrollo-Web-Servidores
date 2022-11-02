<?php
Class Guardar_Resultados{
    function __construct($matriz,$filas,$columnas,$diagonales,$primerResultado,$esCuadradoMagico){
        $this->matriz = $matriz;
        $this->filas = $filas;
        $this->columnas = $columnas;
        $this->diagonales = $diagonales;
        $this->primerResultado = $primerResultado;
        $this->esCuadradoMagico = $esCuadradoMagico;
    }
}
