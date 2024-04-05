<?php inicioCompresion()?>
<?php
// function isHome($v=false){
//     if($v){return true}
// }
 if(isset($isHome)){
     $title =TITULO." - ".CLAIM;
 }
 else{
    $title =  $titulo." | ". TITULO;
 }
?>
<!DOCTYPE html>
<html lang="<?php echo LANG;?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title><?php echo $title ?></title>

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
    <link rel="stylesheet" href="<?php echo RUTA?>style.css?v=<?php echo time()?>">
    <link rel="stylesheet" href="style.css?v=<?php echo time()?>">


    <!-- Favicons & Appicons -->
    <link rel="icon" type="image/png" href="<?php echo RUTA;?>assets/icon/icon_fork.png">
    <!-- -->
    <meta property="og:title" content="<?php echo TITULO;?>" />
    <meta property="og:description" content="<?php echo DESCRIPCION;?>">
    <meta property="og:image" content="<?php echo RUTA;?>assets/icon/icon_fork.png">
    <meta property="og:type" content="website">

    <meta name="description" content="<?php echo DESCRIPCION;?>">
    <meta name="author" content="miguelesteban.net">
    <meta name="language" content="spanish">
    <meta name="distribution" content="global">
    
    <base href="<?php echo RUTA;?>">
    <link rel="canonical" href="<?php echo RUTA;?>">

    <!-- Icons  -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo RUTA;?>assets/icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo RUTA;?>assets/icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo RUTA;?>assets/icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo RUTA;?>assets/icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo RUTA;?>assets/icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo RUTA;?>assets/icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo RUTA;?>assets/icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo RUTA;?>assets/icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo RUTA;?>assets/icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo RUTA;?>assets/icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo RUTA;?>assets/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo RUTA;?>assets/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo RUTA;?>assets/icon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo RUTA;?>assets/icon/manifest.json">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="theme-color" content="#FF0C49">
    <meta name="msapplication-TileImage" content="<?php echo RUTA;?>assets/icon/ms-icon-144x144.png">

    <!-- Mobile Web App capable -->
    <!-- ANDROID -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="<?php echo TITULO?>">
    <!-- iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="<?php echo TITULO?>">
    <meta name="apple-touch-startup-image" content="<?php echo RUTA;?>assets/icon/icon_fork.png">
    <meta name="apple-touch-fullscreen" content="yes">


</head>

<body <?php idBody($titulo);?>>

    <header>
        <a href="<?php echo RUTA ?>" id="logoPrincipal" class="logoPrincipal"><?php echo colorearLogo(str_replace(' ','',TITULO));?>
</a>
        <!-- colorearLogo-->
        <?php menuBuilder();?>
    </header>
    <main>

        <?php
    if(isset($mapaHeader) && $mapaHeader === true){
    echo '<div id="mapa" style="height:50vh"></div>';
    }
?>

<?php

//Si la variable h1 no existe igualala al título
if(!isset($h1)){
    $h1=$titulo;
}

?>


        <h1 class="main-title"><?php echo $h1 ?></h1>