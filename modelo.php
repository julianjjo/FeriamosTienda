<?php
// model.php
 
function abrir_conexion_basededatos()
{
    $conexion = mysql_connect('localhost', 'root', 'poloji');
    mysql_select_db('Feriamos', $conexion);
 
    return $conexion;
}
 
function cerrar_conexion_basededatos($conexion)
{
    mysql_close($conexion);
}

function set_publicacion_vendo(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){    
        $conexion = abrir_conexion_basededatos();        
        $fecha_actual = date("Y-m-d");
        $nueva_publicacion_vendo="INSERT INTO usuario VALUES ('','$nombre','$apellidos','$email','$salt','$contrasena','$telefono','$direccion','1')";
        if($_FILES["foto1"]["error"]=="0"){
            foreach ($_FILES["foto1"] as $clave => $valor) {
                echo "Propiedad: $clave -- Valor: $valor"."<br>";
            }
        }  
        if($_FILES["foto2"]["error"]=="0"){
            foreach ($_FILES["foto2"] as $clave => $valor) {
                echo "Propiedad: $clave -- Valor: $valor"."<br>";
            }
        }
        if($_FILES["foto3"]["error"]=="0"){
            foreach ($_FILES["foto3"] as $clave => $valor) {
                echo "Propiedad: $clave -- Valor: $valor"."<br>";
            }
        }
    }
}

function get_anios(){
    $anio_actual=date("Y");
    $pocision = 0;
    $contador=$anio_actual;
    for($contador;$contador>=($anio_actual-100);$contador--){
         $anios[$pocision]=$contador;
         $pocision++;
    }
    return $anios;
}
 
function get_todas_categorias()
{
    $conexion = abrir_conexion_basededatos();
 
    $todas_las_categorias = mysql_query('SELECT  nombre_categoria FROM  categoria', $conexion);
    $categorias = array();
    while ($row = mysql_fetch_assoc($todas_las_categorias)) {
        $categorias[] = $row;
    }
    cerrar_conexion_basededatos($conexion);
 
    return $categorias;
}

function get_todos_sectores()
{
    $conexion = abrir_conexion_basededatos();

    $todos_los_tipos = mysql_query('SELECT  nombre_tipo FROM  tipo', $conexion);
    $tipos = array();
    while ($row = mysql_fetch_assoc($todos_los_tipos)) {
        $tipos[] = $row;
    }
    cerrar_conexion_basededatos($conexion);
 
    return $tipos;
}

function get_post_by_id($id)
{
    $conexion = abrir_conexion_basededatos();
 
    $id = mysql_real_escape_string($id);
    $query = 'SELECT date, title, body FROM post WHERE id = '.$id;
    $result = mysql_query($query);
    $row = mysql_fetch_assoc($result);
 
    cerrar_conexion_basededatos($conexion);
 
    return $row;
}

function set_usuario(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){        
        $conexion = abrir_conexion_basededatos();
        $contra=$_POST['password'];
        $salt = md5(uniqid(time(), true));
        $contrasena = hash("sha512", $contra.$salt);
        $email = $_POST['email'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $nuevo_usuario = "INSERT INTO usuario VALUES ('','$nombre','$apellidos','$email','$salt','$contrasena','$telefono','$direccion','1')";        
        mysql_query($nuevo_usuario);
        cerrar_conexion_basededatos($conexion);
        header( 'Location: ./registrado' );
    }    
}

function usuario_login(){    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        session_start();
        $conexion = abrir_conexion_basededatos();
        $email=$_POST['email'];    
        $contra=$_POST['password'];
        $consulta_usuario = "SELECT * FROM usuario WHERE email = '$email'";
        $resultado_consulta = mysql_query($consulta_usuario,$conexion);
        $usuario = mysql_fetch_array($resultado_consulta);
        if(hash("sha512", $contra.$usuario['salt'])==$usuario['password']){
            $_SESSION['id_usuario']=$usuario['id_usuario'];
            $_SESSION['email']=$usuario['email'];            
           header("Location: ./");
        } else {
            header("Location: ./paginalogin");
        }
        cerrar_conexion_basededatos($conexion);
    }
}
function ingreso_usuario(){
    session_start();
    if(isset($_SESSION['id_usuario'])&&isset($_SESSION['email'])){
        return true;
    }
    return false;
}
function cerrar_sesion_usuario(){
     session_start();
     session_unset();
     session_destroy();
     header("Location: ./");
}
?>
