<?php require '_functions.php';?>
<?php include '_header.php';?>

<h1>Registro de Usuarios</h1>
<i class="fa-regular fa-bell"></i>

<?php

$usuario= $_POST['usuario'];
$pass1= $_POST['pass1'];
$pass2= $_POST["pass2"];
$email= $_POST['email']; 


echo  "<br>Usuario: ".$usuario;
echo  "<br>Contraseña 1:".$pass1;
echo  "<br>Confirmación de contraseña:".$pass2;
echo  "<br>Correo electrónico: ". $email ;

if ($pass1 != $pass2) {
    alerta('Las contraseñas no coinciden');
} else{
    if (empty($usuario) || $usuario=='') {
        alerta('El usuario debe ser obligatorio');
    }elseif(strlen($usuario)>30){
        alerta('El nombre de usuario solo puede contener hasta 30 caracteres');
    }elseif(!validar_username($usuario)){
        alerta('Nombre de usuario inválido, solo se permiten letras y números');
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {    
        alerta('Email Inválido');  
    }
     //Comprobar si el usuario ya está registrado
     elseif(yaexiste('usuario',$usuario)){
        alerta('Este usuario ya está registrado en el sistema');
    }
    //Comprobar si el email ya está registrado
    elseif(yaexiste('email',$email)){
        alerta('Este email ya está registrado en el sistema');
    }
    else{
        //registramos en la base de datos
        //codificar contraseña
        $pass1 = codificar($pass1);
       
    

        $sql="INSERT INTO usuarios (usuario, pass, email)
        VALUES ('{$usuario}', '{$pass1}', '{$email}');";

        //echo $sql;
        $resultado=consultaSQL($sql);
        alerta("usuario registrado correctamente");
    }
}


