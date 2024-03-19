<?php
    $titulo="Reset";
    require '__functions.php';
    cargar('header');
?>
<p>En la base de datos <strong>guia_restaurantes</strong> se van a crear la tabla restaurantes</p>
<?php
// BORRAR TABLA RESTAURANTES
    $sql="#Borrar tabla restaurantes

    DROP TABLE IF EXISTS restaurantes;";
    consulta($sql,0);


// CREAT TABLA

    $sql="#Crear tabla restaurantes

        CREATE TABLE IF NOT EXISTS `restaurantes` (
        `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `nombre` varchar(255) NOT NULL,
        `tipo` int(5) NULL,
        `descripcion` text NULL,
        `direccion` varchar(255) NULL,
        `foto` varchar(255) NULL,
        `url` varchar(255) NULL,
        `precio` int(3) NULL,
        `redes_sociales` text NULL,
        `galeria` text(255) NULL,
        `url_carta` varchar(255) NULL,
        `url_reserva` varchar(255) NULL,
        `telefono` int(12) NULL,
        `whatsapp` int(12) NULL,
        `puntuacion` int(2) NOT NULL
    );";

    consulta($sql,0);

// INSERTAR DATOS EN LA TABLA

    $sql ="#Inserta datos en la tabla

        INSERT INTO `restaurantes` (
        `nombre`, `tipo`, `descripcion`, `direccion`, `foto`, `url`, `precio`,
        `redes_sociales`, `galeria`, `url_carta`, `url_reserva`, `telefono`,
        `whatsapp`, `puntuacion`)
        VALUES(
            'El Crespo', 2, 'Descripción del Restaurante Uno',
            'Calle Uno, 123', 'foto1.jpg', 'http://www.restauranteuno.com', 25,
            '`Facebook`=>`https://facebook.com/elCrepso-gijon`,
            `Instagram`=>`https://instagram.com/elcrespogijon`',
            'imagen1.jpg, imagen2.jpg', 'http://www.restauranteuno.com/carta',
            'http://www.restauranteuno.com/reserva', 111222333, 444555666, 4
            ),
            (
            'Casa Baizan', 3, 'Descripción del Restaurante Dos',
            'Calle Dos, 456', 'foto2.jpg', 'http://www.restaurantedos.com', 40,
            'Twitter, LinkedIn', 'imagen3.jpg, imagen4.jpg', 'http://www.restaurantedos.com/carta',
            'http://www.restaurantedos.com/reserva', 777888999, 123456789, 5
            ),
            (
            'Ronda Catorce', 1, 'Descripción del Restaurante Tres',
            'Calle Tres, 789', 'foto3.jpg', 'http://www.restaurantetres.com', 35,
            'Instagram, WhatsApp', 'imagen5.jpg, imagen6.jpg',
            'http://www.restaurantetres.com/carta',
            'http://www.restaurantetres.com/reserva', 987654321, 654321987, 3
            );";

    consulta($sql,0);



?>


<? cargar('footer');?>