<?php
//Esta es la pagina de header que se va a mostrar solo en el login
class banner{
    public static function header($title){
        print('
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>'.$title.'</title>
            <link rel="stylesheet" href="../../resources/css/normalize.css">
            <link rel="stylesheet" href="../../resources/css/materialize.min.css">
            <link rel="stylesheet" href="../../resources/css/Iconos.css">
            <link rel="stylesheet" href="../../resources/css/estilos.css">
        </head>
        <body>
        <header>
            <nav class="barra">
                <div class="nav-wrapper">
                </div>
            </nav>
        </header>
        <main>

        ');

    }
}
?>
