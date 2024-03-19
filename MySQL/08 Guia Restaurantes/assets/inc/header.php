<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?e($titulo)?> - <?e(TITULOWEB)?></title>
    <?php
    if(DESARROLLO){
        echo '<!-- Librerias de desarrollo -->';
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/monokai.min.css">';
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>';
    }?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?echo RUTA['css']?>style.css?v=<?echo date('U')?>">
</head>
<body id="">
    <header role="header">
        <a href="index.php" class="main logo"><?e(TITULOWEB)?></a>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="reset.php">Reset</a></li>
                <li><a href="insertar.php">Insertar</a></li>
                <li><a href="crud.php">CRUD</a></li>
            </ul>
        </nav>
    </header>

<main role="main">
    <h1><?e($titulo)?></h1>