<?php

/* 
Plugin Name: funciones escuela UPN
Plugin URI:
Description: este plugin esta echo para cubrir las nesesidades de la escuela upn
Version: 1.0.0
Author:Treck

*/

// Registrar profesores

include 'rutas.php';

function AdministracionCarrera(){

    add_menu_page( 
        'Carrera',
        'Carrera',
        'manage_options',
        __FILE__,
        'carrera',
        'dashicons-welcome-learn-more'
    );
}

function carrera(){
    //include_once ABSPATH.'wp-content\plugins\Upn/php/controlador/modeloCarrera.php';

    //echo ABSPATH.'wp-content\plugins\Upn/php/controlador/modeloCarrera.php';
    
    include_once URL. '/php/controlador/ControladorCarrera.php'; 
}

include_once  dirname( __FILE__ ) . '/css/bootstrapUPn.php'; 

add_action( 'admin_menu', 'AdministracionCarrera', 10, 0 );


?>