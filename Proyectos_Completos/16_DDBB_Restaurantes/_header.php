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

    <!-- Incluye Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Asegúrate de incluir Leaflet JS antes de tu script personalizado -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- style.css -->
    <link rel="stylesheet" href="<?php echo RUTA;?>/style.css?v?=<?php echo time()?>">


<!-- Web App Capabilities -->
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo RUTA;?>assets/icon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo RUTA;?>assets/icon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo RUTA;?>assets/icon/favicon-16x16.png">
<link rel="manifest" href="<?php echo RUTA;?>assets/icon/site.webmanifest">
<meta name="msapplication-TileColor" content="#FFFFFF">
<meta name="theme-color" content="#FF0C49">







</head>
<body <?php idBody($titulo);?>>

<header>
    <a href="inicio" id="logoPrincipal" class="logoPrincipal"><?php echo colorearLogo(TITULO);?></a>
    <?php menuBuilder();?>
</header>
<main>

<?php
    if(isset($mapaHeader) && $mapaHeader === true){
    echo '<div id="mapa" style="height:40vh"></div>';
    }
?>

<h1 class="main-title"><?php echo $titulo ?></h1>