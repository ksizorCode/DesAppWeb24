    <?php
    include_once '_functions.php';
    $titulo='Reset';
    include '_header.php';?>
    <p>Este apartado reiniciará la base de datos, borrando el contenido actual y creandolo de nuevo en base a los parámetros iniciales que se llevaron a cabo durante la instalación.</p>
    <p>Si no estás seguro de este paso no pulses el siguiente botón:</p>

    <?php

    if(isset($_POST['reset'])){

    // Borrar Tablas
    $sql = "DROP TABLE IF EXISTS restaurantes, categorias, restaurantes_categorias;";
    consulta($sql, 0);
    debug('Tabla Borrada Correctamente');
    debug($sql, 'sql');

    // Crear Tabla
    $sql = "CREATE TABLE restaurantes (
            id INT PRIMARY KEY AUTO_INCREMENT,
            nombre VARCHAR(50),
            direccion VARCHAR(100),
            lat VARCHAR(30),
            lon VARCHAR(30),
            foto VARCHAR(255),
            telefono VARCHAR(20),
            web VARCHAR(255),
            email VARCHAR(64),
            descripcion TEXT, #MAX 16777215 Texto largo
            extracto VARCHAR(255), # Texto corto para mostrar en la lista de restaurantes
            slug VARCHAR(255),
            activo TINYINT(1) NOT NULL DEFAULT 1 CHECK(activo IN (0,1))
        );
    ";
    consulta($sql, 0);
    debug('Tabla Restaurnates creada correctamente',);
    debug($sql, 'sql');


    // Insertar Datos
    $sql="# Insertar información de ejemplo en la tabla
    INSERT INTO restaurantes (nombre, direccion, foto, telefono, lat, lon, slug, extracto)
    VALUES 
        ('El Crespo',   'Periodista Adeflor 3, 33205 Gijón',                         '001.jpg',  '123-456-789',  '43.53782',     '-5.66230',     'el-crespo', 'Restaurante de comida tradicional asturiana.'),
        ('El Cencerro', 'Decano Prendes Pando 24, 33208 Gijón',                      '002.jpg',  '987-654-321',  '43.53512',     '-5.66580',     'el-cencerro', 'Especialidad en carnes a la brasa y platos caseros.'),
        ('Casa Baizán', 'Calle Corrida 4, 33206 Gijón',                              '003.jpg',  '456-789-012',  '43.54266',     '-5.66150',     'casa-baizan', 'Ambiente familiar y cocina asturiana de calidad.'),
        ('Le Menhir',   'Marqués de Urquijo 27, 33203 Gijón',                        '004.jpg',  '456-789-012',  '43.53930',     '-5.64640',     'le-menhir', 'Cocina francesa auténtica en un entorno acogedor.'),
        ('L Esbardu',   'El Puente, 45, 33114 Proaza',                               '005.jpg',  '789-012-345',  '43.24954',     '-6.01860',     'l-esbardu', 'Saborea platos tradicionales asturianos con vistas al río.'),
        ('La Chabola',  'La Pl., 33111 San Martín, Teberga',                         '006.jpg',  '789-012-345',  '43.15830',     '-6.10280',     'la-chabola', 'Rincones con encanto y cocina casera en plena naturaleza.'),
        ('Casa Jamallo','Lugar Barzana de Quirós, 62, 33117 Bárzana',                '007.jpg',  '789-012-345',  '43.15805',     '-5.97341',     'casa-jamallo', 'Auténtica comida casera asturiana en un entorno rural.'),
        ('La Vaca Asustada',   'San Bernardo, 79, Centro, 33201 Gijón',              '008.jpg',  '123-456-789',  '43.53862',     '-5.66012',     'la-vaca-asustada', 'Restaurante de comida tradicional asturiana.'),
        ('La Cacharrería',  'Uría, 9, Centro, 33202 Gijón',                          '009.jpg',  '987-654-321',  '43.53935',     '-5.65653',     'la-cacharreria', 'Especialidad en carnes a la brasa y platos caseros.'),
        ('Wabisabi ',   'Valladolid, 1, Centro, 33201 Gijón',                        '010.jpg',  '456-789-012',  '43.54461',     '-5.66286',     'wabisabi-ramen-bar', 'Bar de Ramen y especialidades japonesas, niponas y orientales.'),
        ('Le Menhir',   'Carretera D 321',                                           '011.jpg',  '789-012-345',  '43.53530',     '-5.66150',     'le-menhir', 'Cocina francesa auténtica en un entorno acogedor.'),
        ('Flow Food',   'Av. de Portugal 12 Bis, 33207 Gijón',                       '012.jpg',  '789-012-345',  '43.53923',     '-5.66833',     'flow-food', 'Comida ecológica y natural de km 0'),
        ('Crettino',    'de las Cruces, 11, Centro, 33201 Gijón',                    '013.jpg',  '789-012-345',  '43.54618',     '-5.66246',     'crettino', 'Pizzería Ristorante italiano'),
        ('Las Calacas',   'María Bandujo, 5, Centro, 33201 Gijón',                   '014.jpg',  '123-456-789',  '43.54655',     '-5.66160',     'las-calacas', 'Taquería Mejicana'),
        ('Casa Adela',  'Las Escuelas, s/n, 33934 Lada',                             '015.jpg',  '987-654-321',  '43.30100',     '-5.70577',     'casa-adela', 'Especialidad en carnes a la brasa y platos caseros.'),
        ('El Círculo Espacio Gastronómico', 'Calle la Ferrería, 10, 33402 Avilés',   '016.jpg',  '456-789-012',  '43.55604',     '-5.92145',     'el-circulo-espacio-gastronomico', 'Ambiente familiar y cocina asturiana de calidad.'),
        ('El Pandora',   'Calle de San Bernardo, 6 Bajo, 33402 Avilés',              '017.jpg',  '985569460',    '43.55686',     '-5.92323',     'el-pandora', 'Cocina francesa auténtica en un entorno acogedor.'),
        ('L Esbardu',   'El Puente, 45, 33114 Proaza, Asturias',                '018.jpg',  '789-012-345',  '43.5353',      '-5.6615',      'l-esbardu', 'Saborea platos tradicionales asturianos con vistas al río.'),
        ('La Chabola',  'La Pl., 33111 San Martín, Teberga, Asturias',          '019.jpg',  '789-012-345',  '43.5353',      '-5.6615',      'la-chabola', 'Rincones con encanto y cocina casera en plena naturaleza.'),
        ('El Crespo',   'Periodista Adeflor 3, 33205 Gijón, Asturias',          '020.jpg',  '123-456-789',  '43.5353',      '-5.6615',      'el-crespo', 'Restaurante de comida tradicional asturiana.'),
        ('El Cencerro', 'Decano Prendes Pando 24, 33208 Gijón, Asturias',       '021.jpg',  '987-654-321',  '43.5353',      '-5.6615',      'el-cencerro', 'Especialidad en carnes a la brasa y platos caseros.'),
        ('Casa Baizán', 'Calle Corrida 4, 33206 Gijón, Asturias',               '022.jpg',  '456-789-012',  '43.5353',      '-5.6615',      'casa-baizan', 'Ambiente familiar y cocina asturiana de calidad.'),
        ('Le Menhir',   'Carretera D 321',                                      '023.jpg',  '789-012-345',  '43.5353',      '-5.6615',      'le-menhir', 'Cocina francesa auténtica en un entorno acogedor.'),
        ('L Esbardu',   'El Puente, 45, 33114 Proaza, Asturias',                '024.jpg',  '789-012-345',  '43.5353',      '-5.6615',      'l-esbardu', 'Saborea platos tradicionales asturianos con vistas al río.');";



        
    consulta($sql, 0);
    debug('Datos Insertados en la tabla correctamente','code');
    debug($sql, 'sql');


    // Crear Tabla Categorías

    $sql = "CREATE TABLE categorias (
        id INT PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(50) NOT NULL,
        icono VARCHAR(255) NOT NULL,
        descripcion  TEXT,
        palabrasClave TEXT
        );";

    consulta($sql, 0);
    debug('Tabla Categoría creada correctamente','code');
    debug($sql, 'sql');


    // Insertar datos en Categorías

    $sql = "INSERT INTO categorias (nombre, icono, descripcion, palabrasClave)
    VALUES 
    ('Crepes',          'icono1.png', 'Las crêpe son tortas de harina. Pueden ser dulces o saladas.', 'gallete, frisuelos, crepes, panqueque, tortas, frances, parís'),
        ('Bretón',      'icono2.png', 'Comida típica de la región Francesa de Bretaña',' francia, francésa, parís'),
        ('Carnes',      'icono3.png', 'Especialidad en carnes','ternera, pollo, carne, carnona'),
        ('Italiano',    'icono4.png', 'Especialidad en comida italiana', 'pizza, spaguetti, pasta, fetuchini'),
        ('Vegano',      'icono5.png', 'Platos Veganos','vegetarianos, bio'),
        ('No Vegano',   'icono6.png', 'En este lugar no existen comida para veganos','carnes, animales muertos'),
        ('Tradicional', 'icono7.png', 'Cocina tradicional','casa, abuela, saludable'),
        ('Asiático',    'icono8.png', 'Cocina Asiática','tailandia, tailandés, asia, asiática, china, chinos, chino, japonés, japón'),
        ('Sushi',       'icono9.png', 'Sushi Japonés','niguiris, japonés, japón, japonesa, comida japonesa'),
        ('Wok',         'icono9.png', 'Cocina al Wok', 'wok'),
        ('Ramen',       'icono10.png', 'Sopa tipo Ramen','ramen, rammen, asiático, japonés'),
        ('Mexicano',    'icono11.png', 'Cocina mexicana','picante, méxijo, mejico, lindo'),
        ('Sidrería',    'icono12.png', 'Sidrería Asturiana', 'asturiana, sidra, asturies, fabada');
    ";

    consulta($sql, 0);
    debug('Datos en tabla Categoría añadidos correctamente','code');
    debug($sql, 'sql');



    // Crear tabla de relaciones para relacionar los restaurantes con las categorías


    $sql = "CREATE TABLE restaurantes_categorias  (
        id INT PRIMARY KEY AUTO_INCREMENT,
        restaurante_id INT NOT NULL,
        categoria_id INT NOT NULL,
        FOREIGN KEY (restaurante_id) REFERENCES restaurantes(id),
        FOREIGN KEY (categoria_id) REFERENCES categorias(id)
        );";


    consulta($sql, 0);
    debug('Datos en tabla Categoría añadidos correctamente','code');
    debug($sql, 'sql');


    // Insertar datos en la TABLA DE RELACIONES
    $sql ="INSERT INTO restaurantes_categorias (restaurante_id, categoria_id)
    VALUES 
        (1, 1),
        (1, 2), 
        (2, 2),
        (3, 3); ";

    consulta($sql, 0);
    debug('Datos en tabla Categoría añadidos correctamente','code');
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