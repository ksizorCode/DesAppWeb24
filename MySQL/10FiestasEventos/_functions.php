<?php



function consulta($sql, $devolverDato=true){
    
    //Datos de conexión
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "eventon";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Chequear conexión
    if ($conn->connect_error) {   die("Connection failed: " . $conn->connect_error);}

    // Lanza la consulta
    $result = $conn->query($sql);

    // Devolver datos?
    if($devolverDato){
        // Si hay resultados...
    if ($result->num_rows > 0) {    
        // Crea un array para almacenar los registros encontrados
            $registros=[];
            
            while($row = $result->fetch_assoc()) {            
                // Agrega el registro a nuestro array
                $registros[]=$row;    
            }

            return $registros;
        }
        
            
    
    }

    //Cerramos conexión
    $conn->close();
}








function hoyhayalgo($fecha, $datos){
         //Revisar si hoy hay algún evento
        foreach($datos as $evento){
            if($evento['fechainicio']==$fecha){
            return "fiesta";
        }
    }
}