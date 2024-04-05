<?php
$destinatario = "destinatario@example.com";
$asunto = "¡Hola!";
$mensaje = "Este es un ejemplo de correo electrónico enviado desde PHP.";

// Cabeceras
$cabeceras = "MIME-Version: 1.0" . "\r\n";
$cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$cabeceras .= 'From: tu_email@example.com' . "\r\n";

// Envía el correo electrónico
if(mail($destinatario,$asunto,$mensaje,$cabeceras)){
    echo "El correo se ha enviado correctamente.";
} else{
    echo "Hubo un error al enviar el correo.";
}
?>
