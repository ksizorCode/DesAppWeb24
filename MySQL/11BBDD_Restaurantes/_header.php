<?php inicioCompresion()?>

<!DOCTYPE html>
<html lang="<?php echo LANG;?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo?> | <?php echo TITULO?></title>
    <link rel="stylesheet" href="style.css?v?=<?php echo time()?>">
</head>
<body>

<header>
    <?php menuBuilder();?>
</header>
<main>
    <h1 class="main-title"><?php echo $titulo ?></h1>
