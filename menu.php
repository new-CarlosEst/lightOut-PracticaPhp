<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        if (isset($_POST["jugar"])){
            include_once "Tablero.php";
            $tablero = new Tablero ((int)($_POST["fila"]), (int)($_POST["columna"]));
            $_SESSION["tablero"] =  serialize($tablero); //Lo serializo para que me guarde el tipo de objeto 
            header("location: juego.php");
        }
        else if (isset($_POST["instrucciones"])){
            header("location: instrucciones.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/resources/iconoPagina.png" type="image/png">
    <link rel="stylesheet" href="css/menu.css">
    <!-- Le meto bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <title>Menu_LightsOut</title>
</head>
<body>
    <header><h2>Bienvenido al juego Lights Out !!!</h2></header>

    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label for="fila">Numero de casillas verticales</label>
            <input type="number" name="fila" required>

            <label for="columna">Numero de casillas horizontales</label>
            <input type="number" name="columna" required>
            <br/>
            <button class="" name="jugar">Comenzar juego</button>
            <!--Hacerme un selector de filas y columnas con un input number/text como ya vea, ponerle required -->
        </form>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <button class="" name="instrucciones">Instrucciones</button>
        </form>
    </div>
</body>
</html>