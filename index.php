<?php
// index.php
 
// carga e inicia algunas librerias globales
require_once 'modelo.php';
require_once 'controlador.php';
// encamina la petici¨®n internamente
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
elseif($uri == '/cerrarsesion'){
	cerrar_sesion_action();
}
elseif($uri == '/vender'){
	vendo_action();
}
elseif($uri == '/buscar' && isset($_GET['buscar']) && isset($_GET['id'])){
	buscar_action($_GET['buscar'],$_GET['id']);
}
elseif($uri == '/buscar' && isset($_GET['buscar'])){
	buscar_action($_GET['buscar'],'0');
}
elseif ($uri == '/publicarbusco') {
	publicar_busco_action();
}
elseif($uri == '/busco' && isset($_GET['id1']) && isset($_GET['id2'])){
	busco_id_categoria_action($_GET['id1'],$_GET['id2']);
}
elseif ($uri == '/busco') {
	busco_action();
}
elseif ($uri == '/publicacionbusco' && isset($_GET['id'])) {
	publicacion_busco_action($_GET['id']);
}
elseif($uri == '/loginregistro'){
	paginaloginregistro_action();
}
elseif($uri == '/loginerror'){
	echo "error";
}
elseif ($uri == '/paneldeusuario') {
	panel_de_usuario_action();
}
elseif ($uri == '/cambiocorreo'){
	cambio_correo_action();
}
elseif ($uri == '/valcontra') {
	validar_contrasena_action();
}
elseif($uri == '/cambiarcontra'){
	cambiar_contrasena_action();
}
elseif ($uri == '/cambiotelefono') {
	cambiar_telefono_action();
}
elseif ($uri == '/cambiodireccion') {
	cambiar_direccion_action();
}
elseif ($uri == '/departamento' && isset($_GET['id'])) {
	departamento_id_action($_GET['id']);
}
elseif ($uri == '/eliminar_publicacion' && isset($_GET['id'])) {
	eliminar_publicacion_action($_GET['id']);
}
elseif ($uri == '/eliminar_categoria' && isset($_GET['id'])) {
	eliminar_categoria_action($_GET['id']);
}
elseif ($uri == '/paneldeadministrador') {
	panel_de_administrador_action();
}
elseif ($uri == '/modificarporid') {
	modificar_por_id_action();
}
elseif ($uri == '/modificarporidformulario' && isset($_GET['vendo']) && isset($_GET['id'])) {
	modificar_por_id_formulario_action($_GET['id'],$_GET['vendo']);
}
elseif ($uri == '/crear_categoria') {
	crear_categoria_action();
}
elseif ($uri == '/crear_empresa') {
	crear_empresa_action();
}
elseif ($uri == '/crear_publicidad') {
	crear_publicidad_action();
}
elseif ($uri == '/eliminarpublicidad' && isset($_GET['id'])) {
	eliminarpublicidad_action($_GET['id']);
}
else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}

?>