<?php
    session_start();
    //Me comienzo la sesion
    //!Importante La sesion no puede tener nada arriba el codigo php, tiene que estar en la primera linea
?>
<?php
    
    /**
     * funcion que imprime el tablero y te compruea si ha tocado los botones
     */
    function comprobar(){
        require_once "Tablero.php";
        $objetoTablero = unserialize($_SESSION["tablero"]);

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (isset($_POST["celda"])){
                $valores = explode(";", $_POST["celda"]);
                $objetoTablero->posicionTocada((int)$valores[0], (int)$valores[1]);
            }
            //TODO Arreglar el boton de reiniciar
            else if (isset($_POST["res"])){
                $objetoTablero->reiniciar();
            }
            //Compruebo si he ganado
            if($objetoTablero->ganar() === 0){
                echo "<script>window.location.href = 'menu.php';</script>"; //Me envio con js ya que con header da error
            }
        }
        $objetoTablero->imprimirTablero();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Le meto estilos de bootstrap para despues -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="juego.css">
    <title>pantalla-juego</title>
</head>
<body>
    <div class="container">
        <header <h1>Lights Out</h1> </header></br>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <?php
                //Me traigo el archivo tablero
                require_once "Tablero.php";

                //Saco la sesion y la paso a un objeto
                //Hay que pasar el objeto al objeto tablero usando unserialize y serialize pq te lo de como objeto generico
                $tablero = unserialize($_SESSION["tablero"]);
                comprobar();
            ?>
            <button class="">Reiniciar</button>
            
        </form>
        <button name ="menu" class=""><a href="menu.php">Volver al menu</a></button>
    </div>
</body>
</html>