<?php
include_once '../_functions.php';
$titulo='Olvidé contraseña';
include '../_header.php';


// Verificar si se ha enviado el formulario

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha enviado un correo electrónico
    if (isset($_POST["email"])) {
        // Sanitizar y validar el correo electrónico
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Generar el enlace único de reseteo de contraseña
            $reset_link = "http://localhost:10053/reset_password.php?token=" . uniqid();
            
            // Enviar el correo electrónico
            $to = $email;
            $subject = "Resetear contraseña";
            $message = "Hola,\n\nHemos recibido una solicitud para resetear la contraseña de su cuenta. 
                        Para continuar con el proceso, haga clic en el siguiente enlace:\n\n$reset_link\n\n
                        Si no realizó esta solicitud, puede ignorar este mensaje.\n\nGracias,\nTu equipo de soporte";
            $headers = "From: tuemail@example.com" . "\r\n" .
                       "Reply-To: tuemail@example.com" . "\r\n" .
                       "X-Mailer: PHP/" . phpversion();
            
            if (mail($to, $subject, $message, $headers)) {
                $mensaje = '<div class="alert">Se ha enviado un enlace de reseteo de contraseña a su correo electrónico.</div>';
            } else {
                $mensaje = '<div class="alert">Error al enviar el correo electrónico. Por favor, inténtelo de nuevo más tarde.</div>';
            }
        } else {
            // El correo electrónico no es válido
            $mensaje = '<div class="alert">El correo electrónico ingresado no es válido.</div>';
        }
    } else {
        // El correo electrónico no se ha proporcionado
        $mensaje = "Por favor, ingrese su correo electrónico.";
    }
}
?>




<div class="box">
   <? img('gandalf.webp','No tengo recuerdos de este lugar');?>
   <h2>No tengo recuerdos de este lugar</h2>
   <p>Facilítanos tu correo y te enviaremos un enlace al mail para resetear la contraseña:</p>

   <?php if (isset($mensaje)) : ?>
        <p><?php echo $mensaje; ?></p>
    <?php endif; ?>

<form  method="post">
    <label><span>email</span>
        <input type="email" name="email">
    </label>

    <input type="submit" value="Enviadme email de reseteo de contraseña">
</form>

</div>

<?php include '../_footer.php';?>