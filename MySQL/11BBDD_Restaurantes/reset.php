<?php
include_once '_functions.php';
$titulo='Reset';
include '_header.php';?>
<p>Este apartado reiniciará la base de datos, borrando el contenido actual y creandolo de nuevo en base a los parámetros iniciales que se llevaron a cabo durante la instalación.</p>
<p>Si no estás seguro de este paso no pulses el siguiente botón:</p>


<?php

if(isset($_POST['reset'])){

// Borrar Tabla
$sql = "DROP TABLE IF EXISTS restaurantes;";
consulta($sql, 0);
debug('Tabla Borrada Correctamente');
debug($sql, 'sql');

// Crear Tabla
$sql = "CREATE TABLE restaurantes (
        id INT PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(50),
        direccion VARCHAR(100),
        foto VARCHAR(255),
        telefono VARCHAR(15),
        web VARCHAR(255),
        email VARCHAR(64),
        descripcion TEXT, #MAX 16777215 Texto largo
        extracto VARCHAR(255), # Texto corto para mostrar en la lista de restaurantes
        slug VARCHAR(255),
        activo INT(1) NOT NULL DEFAULT 1 CHECK(activo IN (0,1))
    );
";
consulta($sql, 0);
debug('Tabla Restaurnates creada correctamente',);
debug($sql, 'sql');


// Insertar Datos
$sql="# Insertar información de ejemplo en la tabla
INSERT INTO restaurantes (nombre, direccion, foto, telefono, slug, extracto)
VALUES 
    ('El Crespo',   'Periodista Adeflor 3, 33205 Gijón, Asturias',          '001.jpg', '123-456-789', 'el-crespo', 'Restaurante de comida tradicional asturiana.'),
    ('El Cencerro', 'Decano Prendes Pando 24, 33208 Gijón, Asturias',       '002.jpg', '987-654-321','el-cencerro', 'Especialidad en carnes a la brasa y platos caseros.'),
    ('Casa Baizán', 'Calle Corrida 4, 33206 Gijón, Asturias',               '003.jpg', '456-789-012','casa-baizan', 'Ambiente familiar y cocina asturiana de calidad.'),
    ('Le Menhir',   'Carretera D 321',                                      '004.jpg', '789-012-345','le-menhir', 'Cocina francesa auténtica en un entorno acogedor.'),
    ('L Esbardu',   'El Puente, 45, 33114 Proaza, Asturias',                '005.jpg', '789-012-345','l-esbardu', 'Saborea platos tradicionales asturianos con vistas al río.'),
    ('La Chabola',  'La Pl., 33111 San Martín, Teberga, Asturias',          '006.jpg', '789-012-345','la-chabola', 'Rincones con encanto y cocina casera en plena naturaleza.'),
    ('Casa Jamallo','Lugar Barzana de Quirós, 62, 33117 Bárzana, Asturias', '007.jpg', '789-012-345','casa-jamallo', 'Auténtica comida casera asturiana en un entorno rural.'),
    ('El Crespo',   'Periodista Adeflor 3, 33205 Gijón, Asturias',          '008.jpg', '123-456-789', 'el-crespo', 'Restaurante de comida tradicional asturiana.'),
    ('El Cencerro', 'Decano Prendes Pando 24, 33208 Gijón, Asturias',       '009.jpg', '987-654-321','el-cencerro', 'Especialidad en carnes a la brasa y platos caseros.'),
    ('Casa Baizán', 'Calle Corrida 4, 33206 Gijón, Asturias',               '010.jpg', '456-789-012','casa-baizan', 'Ambiente familiar y cocina asturiana de calidad.'),
    ('Le Menhir',   'Carretera D 321',                                      '011.jpg', '789-012-345','le-menhir', 'Cocina francesa auténtica en un entorno acogedor.'),
    ('L Esbardu',   'El Puente, 45, 33114 Proaza, Asturias',                '012.jpg', '789-012-345','l-esbardu', 'Saborea platos tradicionales asturianos con vistas al río.'),
    ('La Chabola',  'La Pl., 33111 San Martín, Teberga, Asturias',          '013.jpg', '789-012-345','la-chabola', 'Rincones con encanto y cocina casera en plena naturaleza.'),
    ('El Crespo',   'Periodista Adeflor 3, 33205 Gijón, Asturias',          '014.jpg', '123-456-789', 'el-crespo', 'Restaurante de comida tradicional asturiana.'),
    ('El Cencerro', 'Decano Prendes Pando 24, 33208 Gijón, Asturias',       '015.jpg', '987-654-321','el-cencerro', 'Especialidad en carnes a la brasa y platos caseros.'),
    ('Casa Baizán', 'Calle Corrida 4, 33206 Gijón, Asturias',               '016.jpg', '456-789-012','casa-baizan', 'Ambiente familiar y cocina asturiana de calidad.'),
    ('Le Menhir',   'Carretera D 321',                                      '017.jpg', '789-012-345','le-menhir', 'Cocina francesa auténtica en un entorno acogedor.'),
    ('L Esbardu',   'El Puente, 45, 33114 Proaza, Asturias',                '018.jpg', '789-012-345','l-esbardu', 'Saborea platos tradicionales asturianos con vistas al río.'),
    ('La Chabola',  'La Pl., 33111 San Martín, Teberga, Asturias',          '019.jpg', '789-012-345','la-chabola', 'Rincones con encanto y cocina casera en plena naturaleza.'),
    ('El Crespo',   'Periodista Adeflor 3, 33205 Gijón, Asturias',          '020.jpg', '123-456-789', 'el-crespo', 'Restaurante de comida tradicional asturiana.'),
    ('El Cencerro', 'Decano Prendes Pando 24, 33208 Gijón, Asturias',       '021.jpg', '987-654-321','el-cencerro', 'Especialidad en carnes a la brasa y platos caseros.'),
    ('Casa Baizán', 'Calle Corrida 4, 33206 Gijón, Asturias',               '022.jpg', '456-789-012','casa-baizan', 'Ambiente familiar y cocina asturiana de calidad.'),
    ('Le Menhir',   'Carretera D 321',                                      '023.jpg', '789-012-345','le-menhir', 'Cocina francesa auténtica en un entorno acogedor.'),
    ('L Esbardu',   'El Puente, 45, 33114 Proaza, Asturias',                '024.jpg', '789-012-345','l-esbardu', 'Saborea platos tradicionales asturianos con vistas al río.');";


consulta($sql, 0);
debug('Datos Insertados en la tabla correctamente','code');
debug($sql, 'sql');

}

else{
    ?>


<form method="post" action="">
    <input type="hidden" name="reset">
    <input type="submit" value="Resetear">
</form>

<?php 
} //fin else
?>

<?php include '_footer.php';?>