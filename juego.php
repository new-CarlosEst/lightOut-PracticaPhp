<?php
    session_start();
    //Me comienzo la sesion
    //!Importante La sesion no puede tener nada arriba el codigo php, tiene que estar en la primera linea
?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        //TODO Mirar si te lo reconoce asi
        if (isset($_POST["celda"])){
            $valores = explode(";", $_POST["celda"]);
            require_once "Tablero.php";
            $objetoTablero = unserialize($_SESSION["tablero"]);
            $objetoTablero->posicionTocada((int)$valores[0], (int)$valores[1]);
        }
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
    <header <h1>Lights Out</h1> </header>

    <div class="container">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <?php
                //Me traigo el archivo tablero
                require_once "Tablero.php";

                //Saco la sesion y la paso a un objeto
                //Hay que pasar el objeto al objeto tablero usando unserialize y serialize pq te lo de como objeto generico
                $tablero = unserialize($_SESSION["tablero"]);
                // $tablero = new Tablero(5,5);
                $tablero->imprimirTablero();
            ?>
            <button name ="resetear" class="">Reiniciar</button>
        </form>
    </div>
</body>
</html>