<?php
class Tablero{
    private $filas;
    private $columnas;
    private $array;

    public function __construct(int $filas = 1, int $columnas = 1) {
        $this-> filas = $filas;
        $this-> columnas = $columnas;
        //Para llamar a una funcion privada hay que hacer un $this-> 
        $this-> array = $this->inicializarTablero();
    }

    public function getFilas(){
        return $this-> filas;
    }

    public function getColumnas (){
        return $this-> columnas;
    }

    public function getArray (){
        return $this-> array;
    }

    /**
     * Funcion que inicializa el tablero y le pone celdas encendidas o apagadas
     * Recorre un array bidimensianal y le va a asignando o 1 o 0 a cada posicion (1 apagado, 2 encendido)
     */
    private function inicializarTablero (){
        //Para inicializar un array bidimensional con php hay que primero hacerlo un array normal
        $tablero = [];
        for ($i = 0; $i< $this->filas; $i++){
            $tablero[$i] = []; //Y aqui inicalizarlo otra vez la posicion en ese momento como otro array
            for ($j = 0; $j < $this->columnas; $j++){
                $tablero[$i][$j] = rand(0,1); //Esto devuelve un numero entre 0 y 1
            }
        }

        return $tablero;
    }

    /**
     * Funcion para probar si el tablero se ha rellenado bien
     */
    public function imprimirTablero(){
        for ($i = 0; $i< $this->filas; $i++){
            for ($j = 0; $j < $this->columnas; $j++){
                echo $this->array[$i][$j] . " ";
            }
            echo "<br/>";
        }
    }

    /**
     * Recibe $x que es la fila y $y que es la columna y te la apaga (Apagado = 0)
     */
    public function apagar($x, $y){
        $this->array[$x][$y] = 0;
    }

    /**
     * Recibe $x que es la fila y $y que es la columna y te lo enciende (Encendido = 0)
     */
    public function encender($x, $y){
        $this->array[$x][$y] = 1;
    }
}
?>