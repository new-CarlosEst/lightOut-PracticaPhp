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
     * Funcion para imrimir el tablero
     */
    public function imprimirTablero(){
        //Imprimo el tablero aqui pq si lo imprimo en juego por alguna razon no me funciona la tabla
        echo '<table border="1" style="border-collapse: collapse;">';
        //Saco el array
        $fil = $this->getFilas();
        $colum = $this->getColumnas();
        $miArray = $this->getArray();
        //TODO Se me imprime la tabla en una misma fila todas las celdas arreglarlo
        for ($i = 0; $i< $fil ; $i++){
            echo "<tr>";
            for ($j = 0; $j < $colum; $j++){
                $color = ($miArray[$i][$j] == 1) ? "#fcfcfc" : "#e9f23a";
                echo '<td>';
                echo '<button class="celda" type="submit" name="celda" value="'. $i . ";" . $j . '" style="background-color:' . $color . ';"></button></td>';
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    /**
     * Recibe $x que es la fila y $y que es la columna y te la apaga (Apagado = 0)
     */
    private function apagar($x, $y){
        $this->array[$x][$y] = 0;
    }

    /**
     * Recibe $x que es la fila y $y que es la columna y te lo enciende (Encendido = 0)
     */
    private function encender($x, $y){
        $this->array[$x][$y] = 1;
    }

    /**
     * Funcion que te cambia si esta encendida o apagada una fila
     */
    public function posicionTocada ($x , $y){
        //!Tengo que contorlar que no este en las esquinas ya que si no el array me saldra
        
        

        //recorro vertical
        for ($i = $x -1; $i< $x+2; $i++){
            //Compruebo que no se salga de los limites 
            if ($i >= 0 && $i < ($this->filas-1)){
                if ($this->array[$i][$y] == 0){ //Comrpuebo si esa encendida o apagada
                    $this->encender($i, $y);
                }
                else {
                    $this->apagar($i, $y);
                }
            }
            
        }

        //Recorro horizontal
        for ($i = $y -1; $i< $y+2; $i++){
            //Hago lo mismo, compruebo que no se salga de los limites
            if ($i >= 0 && $i < ($this->columnas-1)){
                if ($this->array[$x][$i] == 0){
                    $this->encender($x, $i);
                }
                else {
                    $this->apagar($x, $i);
                }
            }
        }
    }
}
?>