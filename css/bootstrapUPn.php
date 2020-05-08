<?php

/*Estilos incluidos atraves de un CDNS */

/*Estilos para el paginas publicadas */
function bootstrap_css() {
	wp_enqueue_style( 'bootstrap_css', 
  					'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', 
  					array(), 
  					'4.4.1'
  					); 
}
add_action( 'wp_enqueue_scripts', 'bootstrap_css');


// Incluir Bootstrap JS y dependencia popper
function bootstrap_js() {
	wp_enqueue_script( 'popper_js', 
  					'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', 
  					array(), 
  					'1.16.0', 
  					true); 
	wp_enqueue_script( 'bootstrap_js', 
  					'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', 
  					array('jquery','popper_js'), 
  					'4.4.1', 
  					true); 
}
add_action( 'wp_enqueue_scripts', 'bootstrap_js');

/*Estilo para el centro de administracion */

function AdminBoostrap_css(){

	//Damos una identificador a nuestra url
	wp_enqueue_style(
		'boostrap_css', 
		'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', 
		array(),
		'4.4.1');
}
//Realizamos un hook para guardar en codigo fuente
add_action( 'admin_menu', 'AdminBoostrap_css' );

//Js y dependencia popper para la dministracion
function AdminBoostrap_js(){

	//Creamos la referencia del CDNS a JS
	wp_enqueue_script( 'popper_js', 
  					'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', 
  					array(), 
  					'1.16.0', 
					  true); 
					  
	wp_enqueue_script( 'bootstrap_js', 
  					'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', 
  					array('jquery','popper_js'), 
  					'4.4.1', 
  					true); 

}

//Realizamos hook para incluir el js
add_action( 'admin_menu', 'AdminBoostrap_js' );
?>