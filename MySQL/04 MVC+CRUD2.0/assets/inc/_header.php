<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? e($titulo) ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?echo RUTA['css']?>style.css">
</head>
<body>


<header>
    <a href="index.php" class="main logo"><? echo DATOS['titulo']?></a>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="reset.php">Reset</a></li>
            <li><a href="form.php">Añadir</a></li>
            <li><a href="#">Item</a></li>
        </ul>
    </nav>
</header>
<main>
    <? tag('h1',$titulo) ?>
