<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/resources/iconoPagina.png" type="image/png">
    <link rel="stylesheet" href="/css/menu.css">
    <title>Menu_LightsOut</title>
</head>
<body>
    <?php
        include_once "Tablero.php";

        $tab = new Tablero(4, 4);
        $tab->imprimirTablero();
    ?>
</body>
</html>