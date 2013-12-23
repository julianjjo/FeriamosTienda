<?php
function publicar_producto_vendo_action()
{
    $ingreso=ingreso_usuario();
    if($ingreso==true){
        set_publicacion_vendo();
        require 'templates/sessionusuario.php';
        $anios=get_anios();
        $categorias = get_todas_categorias();
        $sectores = get_todos_sectores();
        require 'templates/publicarvendo.php';
    }
    else{
        header("Location: ./loginregistro");
    }
}

function login_action()
{   
	usuario_login();
}

function paginalogin_action()
{   
    require 'templates/paginalogueo.php';
}

function paginaloginregistro_action()
{   
    require 'templates/logueomasregistrese.php';
}

function home_action()
{
    $ingreso=ingreso_usuario();
    if($ingreso==true){
        require 'templates/sessionusuario.php';
    }
    else{
        require 'templates/cajalogueo.php';
    }
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
    require 'templates/registro.php';
}

function show_action($id)
{
    $post = get_post_by_id($id);
    require 'templates/show.php';
}

function usuario_registrado_action(){	
	require 'templates/usuarioregistrado.php';
}

function vendo_action(){
     $ingreso=ingreso_usuario();
    if($ingreso==true){
        require 'templates/sessionusuario.php';
    }
    else{
        require 'templates/cajalogueo.php';
    }
    $categorias = get_todas_categorias();
    $publicaciones=get_ultimas_publicaciones_vendo();
    require 'templates/vender.php';
}

function publicaciones_por_id_categoria_action($id1,$id2){
    $ingreso=ingreso_usuario();
    if($ingreso==true){
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
        require 'templates/sessionusuario.php';
    }
    else{
        require 'templates/cajalogueo.php';
    }
    $fotos = get_fotos_por_id_producto($id);
    $publicacion = get_producto_por_id($id);
    $publicacion['precio_producto'] = convert_num($publicacion['precio_producto']);
    require 'templates/publicacion_producto_vendo.php';
}

function buscar_action($busqueda,$id){
    $ingreso=ingreso_usuario();
    if($ingreso==true){
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
        set_demanda();
        require 'templates/sessionusuario.php';
        $categorias = get_todas_categorias();
        require 'templates/publicardemanda.php';
    }
    else{
        header("Location: ./loginregistro");
    }
    
}

function busco_action(){
     $ingreso=ingreso_usuario();
    if($ingreso==true){
        require 'templates/sessionusuario.php';
    }
    else{
        require 'templates/cajalogueo.php';
    }
    $categorias = get_todas_categorias();
    $publicaciones=get_ultimas_publicaciones_busco();
    require 'templates/busco.php';
}

function busco_id_categoria_action($id1,$id2){
    $ingreso=ingreso_usuario();
    if($ingreso==true){
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
        require 'templates/sessionusuario.php';
    }
    else{
        require 'templates/cajalogueo.php';
    }
    $publicacion = get_producto_por_id($id);
    $publicacion['precio_producto'] = convert_num($publicacion['precio_producto']);
    require 'templates/publicacion_busco.php';
}

?>
