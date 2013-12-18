<?php
// index.php
 
// carga e inicia algunas librerías globales
require_once 'modelo.php';
require_once 'controlador.php';
// encamina la petición internamente
$uri = $_SERVER['REQUEST_URI'];
$urls = explode('?', $uri);
$uri = $urls[0];
if ($uri == '/') {
    home_action();
} 
elseif ($uri == '/vender' && isset($_GET['id2']) && isset($_GET['id2'])) {	
    publicaciones_por_id_categoria_action($_GET['id1'],$_GET['id2']);
} 
elseif($uri == '/publicacionvendo' && isset($_GET['id'])){
	publicacion_por_id_producto($_GET['id']);
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
elseif($uri == '/vender'){
	vendo_action();
}
elseif($uri == '/buscar' && isset($_GET['buscar'])){
	buscar_action($_GET['buscar']);
}
else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}
?>
