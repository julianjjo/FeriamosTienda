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
        header("Location: ./");
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
    $posicion_publicacion = get_posicion_publicacion_por_categoria($id1);
    $categoria_id = get_categoria_por_id($id2);
    $categorias = get_todas_categorias();
    $publicaciones=get_publicaciones_vendo_por_id_categoria($id2);
    require 'templates/vender_id_categoria.php';
}

?>
