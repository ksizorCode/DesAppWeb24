<?php
// Verificar si se ha proporcionado un token en la URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    
    // Aquí deberías tener la lógica para validar el token, por ejemplo, verificar si existe en la base de datos y si aún es válido
    
    // Si el token es válido, mostrar el formulario para restablecer la contraseña
    // Si no, mostrar un mensaje de error
    
} else {
    // Si no se proporciona un token en la URL, redirigir a una página de error o mostrar un mensaje de error
    header("Location: error.php");
    exit();
}
?>


<?php
include_once '_functions.php';
$titulo='Resetear de contraseña';
include '_header.php';?>

    <form action="reset_password_process.php" method="post">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        
        <label for="password">Nueva Contraseña:</label>
        <input type="password" id="password" name="password" required>
        
        <label for="confirm_password">Confirmar Contraseña:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        
        <button type="submit">Restablecer Contraseña</button>
    </form>

<?php include '_footer.php';?>