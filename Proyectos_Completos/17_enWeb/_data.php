<?php


//Ruta principal
// const RUTA ='http://localhost:10053/';
const RUTA ='https://miguelesteban.net/testeo/restaurantes/';
// const RUTA ='https://miguelesteban.net/testeo/restaurantes/';


/* Datos base de datos */
const SERVERNAME = "localhost";
const USERNAME = "mymigueles";
const PASSWORD = "g1juiHoq";
const DBNAME = "restaurantesme";
const TABLE ="restaurantes";




//Debug Mode
const DEBUG = 1;

// Modo compresión
const COMPRESS = 0;



// · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · · 

const LANG ='es-ES';
const TITULO='Kuchillo de Palo';
const CLAIM= 'Sabores únicos en lugares diferenetes para paladares exigentes'; //Subtitulo tipo Claim
const DESCRIPCION= 'Lugares con sabor para disfrutar del paladar a cuchillo'; //SERP
const DESCRIPCIONLARGA= 'Lugares con sabor para disfrutar del paladar y cortar la rutina.';

const TITULO2= 'Matrices de multiplicación';

const MENU=[
    // texto                    url         title                  target      class
    ['nombre'=>'Inicio',      'url'=>'inicio',   'title'=>'Página de inicio',     'target'=> 0,     'class'=>'home' ],
    ['nombre'=>'Buscar',      'url'=>'buscar',   'title'=>'Buscar restaurantes',  'target'=> 0,     'class'=>'buscar' ],
    //['nombre'=>'Reset',       'url'=>'reset',    'title'=>'Reseteo',              'target'=> 0,     'class'=>'' ],
    ['nombre'=>'Insertar',    'url'=>'insertar', 'title'=>'Página de inicio',     'target'=> 0,     'class'=>'' ],
    // ['nombre'=>'Acceder',    'url'=>'login', 'title'=>'Aceder con usuario y contrseña',     'target'=> 0,     'class'=>'login' ]
];



//CONFIG:

const CONFIG=[
    ['lang' => 'es-ES'],                    // Idioma del sitio web. Valores posibles: es-ES (español), en-US (inglés)
    ['titulo'=>'Restaurantes Asturias'],    // Titulo principal y secundario para las páginas que no tienen título específico.

];


const PLUGINS=[
    'fontawesome'=> true
];