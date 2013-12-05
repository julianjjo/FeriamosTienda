<?php
function publicar_producto_action()
{
    $ingreso=ingreso_usuario();
    if($ingreso==true){
        require 'templates/sessionusuario.php';
         $categorias = get_todas_categorias();
        $tipos = get_todos_tipos();
        require 'templates/guardarproducto.php';
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

?>
