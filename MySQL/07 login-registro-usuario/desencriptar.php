<?php require '_functions.php';?>
<?php include '_header.php';?>

<h1>Encriptar y desencriptar</h1>


<form action="">
    <input type="text" name="texto">
</form>



<?php
    $texto = isset($_GET['texto']) ? $_GET['texto'] : null;
    if(isset($texto)){
        echo "<p><b>Texto original: </b>" .$texto."</p>";
        echo "<p>Codificado: ".$codificado = codificar($texto)."</p>";
        echo "<p>Decodificar: ".$codificado."</p>";
        echo "<p>Decodificado: ".$decoficado = decodificar($codificado)."</p>";
    }
    else{
        echo "Inserte datos";
    }


?>