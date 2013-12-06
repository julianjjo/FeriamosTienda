<?php
// index.php
 
// carga e inicia algunas librerías globales
require_once 'modelo.php';
require_once 'controlador.php';
// encamina la petición internamente
$uri = $_SERVER['REQUEST_URI'];
if ($uri == '/') {
    home_action();
} 
elseif ($uri == '/show' && isset($_GET['id'])) {
    show_action($_GET['id']);
} 
elseif($uri == '/publicacionvendo'){
	publicar_producto_vendo_action();
}
elseif($uri == '/login'){
	login_action();
}
elseif($uri == '/paginalogin'){
	paginalogin_action();
}
elseif($uri == '/registro'){
	registrar_usuario_action();
}
elseif($uri == '/registrado'){
	usuario_registrado_action();
}
elseif($uri == '/cerrarsesion'){
	cerrar_sesion_action();
}
else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}
?>
