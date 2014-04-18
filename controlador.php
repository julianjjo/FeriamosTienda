<?php
function publicar_producto_vendo_action()
{
    $ingreso=ingreso_usuario();
    if($ingreso==true){        
        $usuario=get_usuario();
        set_publicacion_vendo();
        require 'templates/sessionusuario.php';
        $anios=get_anios();
        $categorias = get_todas_categorias();
        $sectores = get_todos_sectores();
        $departamentos = get_departamentos();
        require 'templates/publicarvendo.php';
    }
    else{
        header("Location: ./paginalogin");
    }
}

function login_action()
{   
	usuario_login();
}

function paginalogin_action()
{   
    $ingreso=ingreso_usuario();
    if($ingreso==true){        
        header("Location: ./");
    }
    else{
        require 'templates/cajalogueo.php';
        require 'templates/paginadelogueo.php';
    }    
}

function home_action()
{    
    /*$fecha = strtotime("now");
    $fecha1 = strtotime("+4 hours 2 seconds"); 
    $horainicial = date( "h:i:s" , $fecha );
    $horafinal = date( "h:i:s" , $fecha1);
    if($horafinal>$horainicial){
        echo "hora mayor".$horafinal;
    }
    else{
        echo "hora menor".$horainicial;
    }*/
    $ingreso=ingreso_usuario();
    if($ingreso==true){
        $usuario=get_usuario();
        require 'templates/sessionusuario.php';
    }
    else{
        require 'templates/cajalogueo.php';
    }
    $publicidades =  get_publicidad_aleatoria();
    $categorias_vendo=get_categorias_con_productos_vendo();
    $categorias_compro=get_categorias_con_productos_compro();
	require 'templates/home.php';
}

function cerrar_sesion_action()
{
    cerrar_sesion_usuario();
}

function registrar_usuario_action()
{        
    require 'templates/cajalogueo.php';    
	set_usuario();
    $departamentos = get_departamentos();
    require 'templates/registro.php';
}

function vendo_action(){
    $ingreso=ingreso_usuario();
    if($ingreso==true){
        $usuario=get_usuario();
        require 'templates/sessionusuario.php';
    }
    else{
        require 'templates/cajalogueo.php';
    }
    $publicidades =  get_publicidad_aleatoria();
    $categorias = get_todas_categorias();
    $publicaciones=get_ultimas_publicaciones_vendo();
    require 'templates/vender.php';
}

function publicaciones_por_id_categoria_action($id1,$id2){
    $ingreso=ingreso_usuario();
    if($ingreso==true){
        $usuario=get_usuario();
        require 'templates/sessionusuario.php';
    }
    else{
        require 'templates/cajalogueo.php';
    }
    $cantidad = get_cantidad_productos_categoria($id2);
    $catidad_posicion = get_cantidad_de_posiciones($cantidad);
    $cantidad_por_posicion = get_posicion_publicacion_por_categoria($id1);
    $cantidad_por_publicacion=cantidad_por_publicacion($cantidad,$cantidad_por_posicion);
    $cantidad_anterior_por_publicacion=cantidad_anterior_por_publicacion($cantidad,$cantidad_por_posicion);
    $categoria_id = get_categoria_por_id($id2);
    $categorias = get_todas_categorias();
    $publicaciones=get_publicaciones_vendo_por_id_categoria($id2,$cantidad_por_posicion);
    require 'templates/vender_id_categoria.php';
}

function publicacion_por_id_producto($id){
    $ingreso=ingreso_usuario();
    if($ingreso==true){
        $usuario=get_usuario();
        require 'templates/sessionusuario.php';
    }
    else{
        require 'templates/cajalogueo.php';
    }
    $fotos = get_fotos_por_id_producto($id);
    $publicacion = get_producto_por_id($id);
    $publicacion['precio_producto'];
    $departamento = get_departamento_id($publicacion["ID_DEPARTAMENTO"]);
    $ciudad = get_ciudad_id($publicacion["ID_CIUDAD"]);
    $usuario = get_usuario_por_id($publicacion['id_vendedor']);
    require 'templates/publicacion_producto_vendo.php';
}

function buscar_action($busqueda,$id){
    $ingreso=ingreso_usuario();
    if($ingreso==true){
        $usuario=get_usuario();
        require 'templates/sessionusuario.php';
    }
    else{
        require 'templates/cajalogueo.php';
    }
    $cantidad = contador_consulta_buscar($busqueda);    
    if($cantidad>0){
        $catidad_posicion = get_cantidad_de_posiciones($cantidad);
        $cantidad_por_posicion = get_posicion_publicacion_por_categoria($id);
        $cantidad_por_publicacion=cantidad_por_publicacion($cantidad,$cantidad_por_posicion);
        $cantidad_anterior_por_publicacion=cantidad_anterior_por_publicacion($cantidad,$cantidad_por_posicion);    
        $consulta = consulta_buscar($busqueda,$cantidad_por_posicion);
        $publicaciones = busqueda($consulta);
        require 'templates/buscar.php'; 
    }
    else{
        require 'templates/no_hay_resultado.php';
    }    
}

function publicar_busco_action(){
    $ingreso=ingreso_usuario();
    if($ingreso==true){
        $usuario=get_usuario();
        set_demanda();
        require 'templates/sessionusuario.php';
        $categorias = get_todas_categorias();
        require 'templates/publicardemanda.php';
    }
    else{
        header("Location: ./paginalogin");
    }
    
}

function busco_action(){
     $ingreso=ingreso_usuario();
    if($ingreso==true){
        $usuario=get_usuario();
        require 'templates/sessionusuario.php';
    }
    else{
        require 'templates/cajalogueo.php';
    }
    $publicidades =  get_publicidad_aleatoria();
    $categorias = get_todas_categorias();
    $publicaciones=get_ultimas_publicaciones_busco();
    require 'templates/busco.php';
}

function busco_id_categoria_action($id1,$id2){
    $ingreso=ingreso_usuario();
    if($ingreso==true){
        $usuario=get_usuario();
        require 'templates/sessionusuario.php';
    }
    else{
        require 'templates/cajalogueo.php';
    }
    $cantidad = get_cantidad_busco_categoria($id2);
    $catidad_posicion = get_cantidad_de_posiciones($cantidad);
    $cantidad_por_posicion = get_posicion_publicacion_por_categoria($id1);
    $cantidad_por_publicacion=cantidad_por_publicacion($cantidad,$cantidad_por_posicion);
    $cantidad_anterior_por_publicacion=cantidad_anterior_por_publicacion($cantidad,$cantidad_por_posicion);
    $categoria_id = get_categoria_por_id($id2);
    $categorias = get_todas_categorias();
    $publicaciones=get_busco_por_id_categoria($id2,$cantidad_por_posicion);
    require 'templates/busco_id_categoria.php';
}

function publicacion_busco_action($id){
    $ingreso=ingreso_usuario();
    if($ingreso==true){
        $usuario=get_usuario();
        require 'templates/sessionusuario.php';
    }
    else{
        require 'templates/cajalogueo.php';
    }
    $publicacion = get_producto_por_id($id);
    $publicacion['precio_producto'];
    $usuario = get_usuario_por_id($publicacion['id_vendedor']);
    require 'templates/publicacion_busco.php';
}

function panel_de_usuario_action(){
    $ingreso=ingreso_usuario();
    if($ingreso==true){
        $usuario=get_usuario();
        $rol = get_rol();
        if ($rol == "admin") {
            header("Location: ./paneldeadministrador");
        }
        elseif ($rol == "usuario") {
            $departamento = get_departamento_id($usuario["ID_DEPARTAMENTO"]);
            $ciudad = get_ciudad_id($usuario["ID_CIUDAD"]);        
            $departamentos = get_departamentos();
            $publicaciones = get_publiciones_vendo_id_usuario();
            require 'templates/sessionusuario.php';
            require "templates/paneldeusuario.php";
        }
    }
    else{
        require 'templates/cajalogueo.php';
        header("Location: ./loginregistro");
    }   

}

function cambio_correo_action(){
    set_email_usuario();
}

function validar_contrasena_action(){
    validar_contrasena();
}

function cambiar_contrasena_action(){
    set_contrasena_usuario();
}

function cambiar_telefono_action(){
    set_telefono_usuario();
}

function cambiar_direccion_action(){
    set_direccion_usuario();
}

function departamento_id_action($id){
    $ciudades = get_ciudades_id_departamento($id);
    header('Content-Type: text/html; charset=UTF-8');
    foreach ($ciudades as $ciudad) {
        echo '<option value="'.$ciudad["ID_CIUDAD"].'">'.utf8_encode($ciudad["NOMBRE"]).'</option>';
    }
}
function eliminar_publicacion_action($id_publicacion){
    eliminar_publicacion_por_id($id_publicacion);
}

function panel_de_administrador_action(){
    $ingreso=ingreso_usuario();
    if($ingreso==true){
        $usuario=get_usuario();        
        $categorias = get_todas_categorias();
        $publicaciones_meses = get_publicaciones_mas_de_tres_meses();
        $departamento = get_departamento_id($usuario["ID_DEPARTAMENTO"]);
        $ciudad = get_ciudad_id($usuario["ID_CIUDAD"]);        
        $departamentos = get_departamentos();
        $publicaciones = get_publiciones_vendo_id_usuario();
        require 'templates/sessionusuario.php';
        require "templates/paneldeadministrador.php";     
    }
    else{
        require 'templates/cajalogueo.php';
        header("Location: ./loginregistro");
    }   
}

function modificar_por_id_formulario_action($id,$vendo_o_compro){
    $publicacion = get_producto_por_id($id);
    $categorias = get_todas_categorias();
    $departamentos = get_departamentos();
    $anios=get_anios();
    if ($vendo_o_compro==0) {
        require 'templates/modificar_por_id_compro.php';
    }
    elseif ($vendo_o_compro==1) {
        require 'templates/modificar_por_id_vendo.php';
    }
    
}
function modificar_por_id_action(){
    $vendo_o_compro = get_ubicacion();
    //si es compro es igual a 0
    if ($vendo_o_compro==0) {
        set_update_publicacion_compro();
    }
    //si es vendo es igual a 1
    elseif ($vendo_o_compro==1) {
        set_update_publicacion_vendo();
    }    
}
function eliminar_categoria_action($id_categoria){
    eliminar_categoria_por_id($id_categoria);
}
function crear_categoria_action(){
    crear_categoria();
}
?>
