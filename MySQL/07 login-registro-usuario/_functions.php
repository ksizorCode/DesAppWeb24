<?php

// LLAMADA A BASE DE DATOS
// requiere consulta en $sql
function consultaSQL($sql){
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "empresa001";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $result = $conn->query($sql);
    return $result;
    $conn->close();
}


//REVISA datos usuario
function validar_username($username) {
    $patron = "/^[a-zA-Z0-9]+$/";
    return preg_match($patron, $username);
} 


const BUCLES =5;
//CODIFICAR 
function codificar($t){
    for($i=0; $i<BUCLES; $i++){
    return base64_encode($t);
    }
}

//DECODIFICAR
function decodificar($t){
    for($i=0; $i<BUCLES; $i++){
    return base64_decode($t);
    }
}


//YA EXISTE 
function yaexiste($que, $valor){
    // Consulta SQL
    $sql = "SELECT * FROM usuarios WHERE $que = '$valor'";
    $result = consultaSQL($sql);

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        return true; //el usuario existe
    } else {
        return false; //el usuario no existe
    }
}


function alerta($t){
    echo '<div class="alerta">';
    echo '<i class="fa-regular fa-bell"></i>';
    echo '<p>'.$t.'.</p>';
    echo '</div>';
}


?>
