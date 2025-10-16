<?php
    session_start();
    //Me comienzo la sesion
    //!Importante La sesion no puede tener nada arriba el codigo php, tiene que estar en la primera linea
?>
<?php 
    //Codigo para cambiar el color
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Le meto estilos de bootstrap para despues -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/juego.css">
    <title>pantalla-juego</title>
</head>
<body>
    <header>Lights Out</header>
    
    <div class="container">
        
        <?php 
            //Me traigo el archivo tablero
            require_once "Tablero.php";

            //TODO Hacer el codigo de la sesion para recibir la columna y las filas con una sesion y meterlas en el objeto tablero
            
            //Para probr me hago el objeto tablero a mano y ya despues los sacare con una sesion
            $tablero = new Tablero(4,4);
            imprimirJuego($tablero);
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <table border="1" style="border-collapse: collapse;">
                <?php
                    function imprimirJuego($tablero){
                        //Saco el array
                        $fil = $tablero->getFilas();
                        $colum = $tablero->getColumnas();
                        $miArray = $tablero->getArray();
                        //TODO Se me imprime la tabla en una misma fila todas las celdas arreglarlo
                        for ($i = 0; $i< $fil ; $i++){
                            echo "<tr>";
                            for ($j = 0; $j < $colum; $j++){
                                $color = ($miArray[$i][$j] == 1) ? "#fcfcfc" : "#e9f23a";
                                echo '<td style="background-color: ' . $color . ';">';
                                echo '<button type="submit" name="celda" style="background-color:' . $color . ';"  "width:100%; height:100%; margin:0; padding:0;>hola</button></td>';
                            }
                            echo "</tr>";
                        }
                    }
                ?>
            </table>
        </form>
    </div>
</body>
</html>