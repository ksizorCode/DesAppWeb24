<?php

const LANG ='es-ES';
const TITULO='KuchillodePalo';
const DESCRIPCION= '';

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