<?php
class Tablero{
    private $filas;
    private $columnas;
    private $array;

    public function __construct(int $filas = 1, int $columnas = 1) {
        $this-> filas = $filas;
        $this-> columnas = $columnas;
        //TODO Mirar como hacer un array bidimensional
        $this-> array = ["a"]["3"];
    }

    public function getFilas(){
        return $this-> filas;
    }

    public function getColumnas (){
        return $this-> columnas;
    }
}
?>