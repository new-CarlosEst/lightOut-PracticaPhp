<?php
    //TODO Hacerme todo el php para enviarme el formulario e ir a juego.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/resources/iconoPagina.png" type="image/png">
    <link rel="stylesheet" href="/css/menu.css">
    <!-- Le meto bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <title>Menu_LightsOut</title>
</head>
<body>
    <header><h2>Bienvenido al juego Lights Out !!!</h2></header>

    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <button type="submit"class="" name="jugar">Comenzar juego</button>
            <button class="" name="instrucciones">Instrucciones</button>
            <!--Hacerme un selector de filas y columnas con un input number/text como ya vea, ponerle required -->
        </form>
    </div>
</body>
</html>