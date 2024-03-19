<?php inicioCompresion()?>

<!DOCTYPE html>
<html lang="<?php echo LANG;?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo?> | <?php echo TITULO?></title>

    <?php
    if(PLUGINS['fontawesome']){
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">';
    }
    ?>

    <link rel="stylesheet" href="<?php echo RUTA;?>/style.css?v?=<?php echo time()?>">
</head>
<body <?php idBody($titulo);?>>

<header>
    <a href="inicio" id="headerlogo" class="logo"><?echo  TITULO;?></a>
    <?php menuBuilder();?>
</header>
<main>
    <h1 class="main-title"><?php echo $titulo ?></h1>