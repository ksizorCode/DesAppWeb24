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
            activo INT(1) NOT NULL DEFAULT 1 CHECK(activo IN (0,1)),
            icono VARCHAR(255)
        );
    ";
    consulta($sql, 0);
    debug('Tabla Restaurnates creada correctamente',);
    debug($sql, 'sql');


    // Insertar Datos
    $sql="# Insertar información de ejemplo en la tabla
    INSERT INTO restaurantes (nombre, direccion, foto, telefono, lat, lon, slug, extracto, icono)
    VALUES 
    ('El Crespo',           'Periodista Adeflor 3, 33205 Gijón',                                '001.jpg',  '123-456-789',  '43.53782',     '-5.66230',     'el-crespo', 'Restaurante de comida tradicional asturiana.', 'restaurante'),
    ('El Cencerro',         'Decano Prendes Pando 24, 33208 Gijón',                             '002.jpg',  '987-654-321',  '43.53512',     '-5.66580',     'el-cencerro', 'Especialidad en carnes a la brasa y platos caseros.', 'restaurante'),
    ('Casa Baizán',         'Calle Corrida 4, 33206 Gijón',                                     '003.jpg',  '985172745',    '43.54320',     '-5.66432',     'casa-baizan', 'Ambiente familiar y cocina asturiana de calidad.', 'restaurante'),
    ('Le Menhir',           'Marqués de Urquijo 27, 33203 Gijón',                               '004.jpg',  '456-789-012',  '43.53930',     '-5.64640',     'le-menhir', 'Cocina francesa auténtica en un entorno acogedor.', 'restaurante'),
    ('L Esbardu',           'El Puente, 45, 33114 Proaza',                                      '005.jpg',  '789-012-345',  '43.24954',     '-6.01860',     'l-esbardu', 'Saborea platos tradicionales asturianos con vistas al río.', 'restaurante'),
    ('La Chabola',          'La Pl., 33111 San Martín, Teverga',                                '006.jpg',  '789-012-345',  '43.15830',     '-6.10280',     'la-chabola', 'Rincones con encanto y cocina casera en plena naturaleza.', 'restaurante'),
    ('Casa Jamallo',        'Lugar Barzana de Quirós, 62, 33117 Bárzana',                       '007.jpg',  '789-012-345',  '43.15805',     '-5.97341',     'casa-jamallo', 'Auténtica comida casera asturiana en un entorno rural.', 'restaurante'),
    ('La Vaca Asustada',    'San Bernardo, 79, Centro, 33201 Gijón',                            '008.jpg',  '123-456-789',  '43.53862',     '-5.66012',     'la-vaca-asustada', 'Restaurante de comida tradicional asturiana.', 'restaurante'),
    ('La Cacharrería',      'Uría, 9, Centro, 33202 Gijón',                                     '009.jpg',  '987-654-321',  '43.53935',     '-5.65653',     'la-cacharreria', 'Especialidad en carnes a la brasa y platos caseros.', 'restaurante'),
    ('Wabisabi ',           'Valladolid, 1, Centro, 33201 Gijón',                               '010.jpg',  '456-789-012',  '43.54461',     '-5.66286',     'wabisabi-ramen-bar', 'Bar de Ramen y especialidades japonesas, niponas y orientales.', 'restaurante'),
    ('Flow Food',           'Av. de Portugal 12 Bis, 33207 Gijón',                              '012.jpg',  '789-012-345',  '43.53923',     '-5.66833',     'flow-food', 'Comida ecológica y natural de km 0', 'bio'),
    ('Crettino',            'de las Cruces, 11, Centro, 33201 Gijón',                           '013.jpg',  '789-012-345',  '43.54618',     '-5.66246',     'crettino', 'Pizzería Ristorante italiano', 'italiano'),
    ('Las Calacas',         'María Bandujo, 5, Centro, 33201 Gijón',                            '014.jpg',  '123-456-789',  '43.54655',     '-5.66160',     'las-calacas', 'Taquería Mejicana', 'restaurante'),
    ('Casa Adela',          'Las Escuelas, s/n, 33934 Lada',                                    '015.jpg',  '987-654-321',  '43.30100',     '-5.70577',     'casa-adela', 'Especialidad en carnes a la brasa y platos caseros.', 'restaurante'),
    ('El Círculo Espacio Gastronómico', 'Calle la Ferrería, 10, 33402 Avilés',                  '016.jpg',  '456-789-012',  '43.55604',     '-5.92145',     'el-circulo-espacio-gastronomico', 'Ambiente familiar y cocina asturiana de calidad.', 'restaurante'),
    ('El Pandora',          'Calle de San Bernardo, 6 Bajo, 33402 Avilés',                      '017.jpg',  '985569460',    '43.55686',     '-5.92323',     'el-pandora', 'Cocina francesa auténtica en un entorno acogedor.', 'restaurante'),
    ('La Vizcaina',         'El Paseo 27, 33174 Las Caldas',                                    '020.jpg',  '985798439',    '43.33153',     '-5.9248',      'la-vizcaina-caldas', 'Restaurante de comida tradicional asturiana.', 'restaurante'),
    ('La Dársena',          'Calle El Muelle 23, 39340, Suances',                               '018.jpg',  '942844489',    '43.43231',     '-4.03659',     'la-darsena-de-suances', 'Saborea platos tradicionales asturianos con vistas al río.', 'restaurante'),
    ('Pizzería Bitinia',    'Plaza del Rey 3, 39330 Santillada del Mar',                        '019.jpg',  '622323424',    '43.38746',     '-4.10893',     'pizzeria-bitinia', 'Pizzería con planos innovadores', 'italiano'),
    ('Casa Marco',          'Rúa de García Barbón 123, Santiago de Vigo 36201 Vigo',            '021.jpg',  '986225110',    '42.23820',     '-8.71058',     'casa-marco', 'Tradicional con un toque innovador', 'restaurante'),
    ('Punto Caramelo',      'Caridad 9, 33202 Gijón',                                           '022.jpg',  '984296618',    '43.54018',     '-5.65521',     'punto-caramelo', 'Pastelería Argentina', 'pasteleria'),
    ('Cervecería Vor',      'Decano Prendes Pando 29, 33207 Gijón',                             '023.jpg',  '984290882',    '43.53526',     '-5.66571',     'cerveceria-vor', 'Cervecería con especialidades en hamburguesas', 'copas'),
    ('Dulce Herencia',      'Begoña 48, 33201 Gijón',                                           '024.jpg',  '684634565',    '43.54060',     '-5.66230',     'dulce-herencia', 'Confitería Argentina', 'pasteleria'),
    ('Zabala',              'Mateo Benigno de Moraza Kalea, 9, 01001 Vitoria-Gasteiz, Álava',   '011.jpg',  '945230009',    '42.84701',     '-2.67246',     'asador-zabala', 'Cocina vasca en un restaurante asador con una cueva de 1787', 'restaurante'),
    ('La Casa Pompeyana',   'Nava, 5, Centro, 33207 Gijón',                                     '011.jpg',  '945230009',    '43.53837',     '-5.67111',     'casa-pompeyana', 'Restaurante Italiano especializado en pastas', 'italiano'),
    ('Rib Beef & Wine',     'Praça Ribeira 1, 4050-553 Porto, Portugal',                        '011.jpg',  '+351966273822','41.14036',     '-8.61363',     'rib-beer-oporto', 'Restaurante especializado en carnes y reinterpretación de platos tradicionales', 'restaurante'),
    ('Varsobia',            'C. Cabrales, 18, Centro, 33201 Gijón',                             '011.jpg',  '984196842',    '43.54349',     '-5.66158',     'varsovia-gijon', 'Mojito de manzana y otros cócteles en local con paredes de piedra y sillones Chester, en edificio modernista.', 'copas'),
    ('Chuchu',              'El Parque, s/n, 33610 Turón, Asturias',                            '011.jpg',  '985430226',    '43.20963',     '-5.74202',     'casa-chuchu',    'Reinterpretación de cocina tradicional', 'restaurante');
    ";

        
    consulta($sql, 0);
    debug('Datos Insertados en la tabla correctamente','code');
    debug($sql, 'sql');


    // Crear Tabla Categorías

    $sql = "CREATE TABLE categorias (
        id INT PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(50) NOT NULL,
        icono VARCHAR(255) NOT NULL,
        descripcion  TEXT
        );";

    consulta($sql, 0);
    debug('Tabla Categoría creada correctamente','code');
    debug($sql, 'sql');


    // Insertar datos en Categorías

    $sql = "INSERT INTO categorias (nombre, icono, descripcion)
    VALUES 
        ('Galletería Crepería',     'icono1.png', 'Una selección tentadora de galletas artesanales y crepes exquisitos, perfectos para cualquier ocasión'),
        ('Bretón',                  'icono2.png', 'Sumérgete en los sabores auténticos de la región de Bretaña con nuestra variedad de platos tradicionales y delicias culinarias'),
        ('Carnes',                  'icono3.png', 'Cortes de carne de primera calidad cocinados a la perfección y acompañados de guarniciones frescas y salsas irresistibles'),
        ('Italiano',                'icono4.png', 'Disfruta de la auténtica experiencia italiana con nuestras deliciosas pizzas, pastas al dente y ensaladas frescas preparadas con ingredientes de calidad'),
        ('Vegano',                  'icono5.png', 'Explora una variedad emocionante de platos veganos creativos y nutritivos, elaborados con ingredientes frescos y sabrosos'),
        ('No Vegano',               'icono6.png', 'Nuestra carta ofrece una amplia selección de platos clásicos que van desde suculentas carnes hasta exquisitos mariscos, satisfaciendo todos los paladares'),
        ('Tradicional',             'icono7.png', 'Revive la nostalgia de los sabores caseros con nuestra cocina tradicional, donde cada plato está lleno de amor y tradición'),
        ('Asiático',                'icono8.png', 'Embárcate en un viaje culinario por Asia con nuestra emocionante variedad de sabores y platos tradicionales de la región'),
        ('Sushi',                   'icono9.png', 'Sumérgete en el arte del sushi con nuestra fresca selección de rolls y nigiris, preparados por expertos chefs con ingredientes de primera calidad'),
        ('Ramen',                   'icono10.png', 'Deléitate con la calidez reconfortante de nuestros tazones de ramen, llenos de sabor y autenticidad en cada bocado'),
        ('Mexicano',                'icono11.png', 'Experimenta la explosión de sabores de México con nuestros auténticos tacos, burritos y nachos, preparados con ingredientes frescos y salsas picantes'),
        ('Sidrería',                'icono12.png', 'Descubre la auténtica cocina de sidrería con nuestros platos tradicionales acompañados de una selección de sidras regionales y platos de wok');
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