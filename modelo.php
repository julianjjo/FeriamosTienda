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

function convert_num ($num)
{
    $num=strrev(substr(chunk_split(strrev($num), 3, '.'), 0, -1));
    return $num;
}

function set_publicacion_vendo(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){    
        session_start();
        $conexion = abrir_conexion_basededatos();        
        $id_vendedor= $_SESSION["id_usuario"];
        $fecha_actual = date("Y-m-d");
        $nombre = $_POST["nombre"];
        $marca = $_POST["marca"];
        $categoria = $_POST["categoria"];
        $sector = $_POST["sector"];
        $modelo = $_POST["modelo"];
        $anio_fabricacion = $_POST["anio_fabricacion"];
        $estado = $_POST["estado"];
        $otra_informacion = $_POST["otra_informacion"];
        $unidades = $_POST["unidades"];
        $precio = $_POST["precio"];
        $departamento = $_POST["departamento"];
        $ciudad = $_POST["ciudad"];
        $dirreccion = $_POST["dirreccion"];
        $fecha_actual = date("Y-m-d");
        $nueva_publicacion_vendo="INSERT INTO producto VALUES ('','$categoria','$sector','$id_vendedor','$nombre','$precio','$unidades','$modelo','$marca','Colombia','$departamento','$ciudad','$dirreccion','$otra_informacion','$estado','$anio_fabricacion','$fecha_actual','1')";
        mysql_query($nueva_publicacion_vendo,$conexion);
        $id_producto=mysql_insert_id();
        $contador = 0;
        if($_FILES["foto1"]["error"]=="0"){
            if($_FILES["foto1"]["type"]=="image/jpeg"||$_FILES["foto1"]["type"]=="image/png"){                
                $foto = $_FILES["foto1"]["tmp_name"];
                $nombre = $_FILES["foto1"]["name"];
                $partes_nombre=explode('.', $nombre);
                $tipo_de_foto=$partes_nombre[1];
                $nombre=md5(uniqid(time())).".".$tipo_de_foto;      
                $destino ="fotos/".$nombre;
                move_uploaded_file($foto, $destino);
                $consulta_foto1 = "INSERT INTO Foto VALUES ('','$id_producto','$destino')";
                mysql_query($consulta_foto1,$conexion);
            }            
            else{
                echo "El formato no es correcto";
            }   
            $contador++;
        }  
        if($_FILES["foto2"]["error"]=="0"){
            if($_FILES["foto2"]["type"]=="image/jpeg"||$_FILES["foto2"]["type"]=="image/png"){
                $foto = $_FILES["foto2"]["tmp_name"];
                $nombre = $_FILES["foto2"]["name"];
                $partes_nombre=explode('.', $nombre);
                $tipo_de_foto=$partes_nombre[1];
                $nombre=md5(uniqid(time())).".".$tipo_de_foto;      
                $destino ="fotos/".$nombre;
                move_uploaded_file($foto, $destino);
                $consulta_foto2 = "INSERT INTO Foto VALUES ('','$id_producto','$destino')";
                mysql_query($consulta_foto2,$conexion);                
            }
            else{
                echo "El formato no es correcto";
            }
            $contador++;
        }
        if($_FILES["foto3"]["error"]=="0"){
            if($_FILES["foto3"]["type"]=="image/jpeg"||$_FILES["foto3"]["type"]=="image/png"){
                $foto = $_FILES["foto3"]["tmp_name"];
                $nombre = $_FILES["foto3"]["name"];
                $partes_nombre=explode('.', $nombre);
                $tipo_de_foto=$partes_nombre[1];
                $nombre=md5(uniqid(time())).".".$tipo_de_foto;
                $destino ="fotos/".$nombre;
                move_uploaded_file($foto, $destino);
                $consulta_foto3 = "INSERT INTO Foto VALUES ('','$id_producto','$destino')";
                mysql_query($consulta_foto3,$conexion);
            }
            else{
                echo "El formato no es correcto";
            }
            $contador++;
        }
        if($contador==0){
            $nofoto="fotos/foto-no-disponible.jpg";
            $consulta_foto3 = "INSERT INTO Foto VALUES ('','$id_producto','$nofoto')";
            mysql_query($consulta_foto3,$conexion);
        }
        cerrar_conexion_basededatos($conexion);
    }
}

function get_anios(){
    $anio_actual=date("Y");
    $posicion = 0;
    $contador=$anio_actual;
    for($contador;$contador>=($anio_actual-100);$contador--){
         $anios[$posicion]=$contador;
         $posicion++;
    }
    return $anios;
}
 
function get_todas_categorias()
{
    $conexion = abrir_conexion_basededatos();

    $todas_las_categorias = mysql_query('SELECT * FROM  categoria', $conexion);
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

    $todos_los_tipos = mysql_query('SELECT  *  FROM  tipo', $conexion);
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

function get_ultimas_publicaciones_vendo(){
    $conexion = abrir_conexion_basededatos();

    $ultimas_publicaciones_vendo = mysql_query("SELECT pf.*, f.* FROM vista_producto_vendo_por_fecha pf INNER JOIN vista_una_foto AS f ON pf.id_producto=f.id_producto AND siVendo='1' LIMIT 8",$conexion);

    $publicaciones = array();
    while ($row = mysql_fetch_assoc($ultimas_publicaciones_vendo)) {
        $publicaciones[] = $row;
    }
    cerrar_conexion_basededatos($conexion);
 
    return $publicaciones;
}

function get_categoria_por_id($id){
    $conexion = abrir_conexion_basededatos();

    $categoria_por_id = mysql_query("SELECT * FROM categoria WHERE id_categoria= '$id'",$conexion);

    $categoria = mysql_fetch_array($categoria_por_id);

    cerrar_conexion_basededatos($conexion);
 
    return $categoria;
}

function get_cantidad_productos_categoria($id_categoria){
    $conexion = abrir_conexion_basededatos();

    $categoria_por_id = mysql_query("SELECT count(*) as cantidad FROM producto WHERE id_categoria='$id_categoria'",$conexion);

    $categoria = mysql_fetch_array($categoria_por_id);

    $cantidad=$categoria["cantidad"];
    cerrar_conexion_basededatos($conexion);
 
    return $cantidad;
}

function get_producto_por_id($id_producto){
    $conexion = abrir_conexion_basededatos();

    $producto_por_id = mysql_query("SELECT * FROM producto WHERE id_producto='$id_producto'",$conexion);
    $producto = mysql_fetch_array($producto_por_id);

    cerrar_conexion_basededatos($conexion);
 
    return $producto;
}

function get_fotos_por_id_producto($id_producto){
    $conexion = abrir_conexion_basededatos();

    $fotos_por_id_producto = mysql_query("SELECT * FROM Foto WHERE id_producto='$id_producto'",$conexion);
    
    $fotos = array();
    while ($row = mysql_fetch_assoc($fotos_por_id_producto)) {
        $fotos[] = $row;
    }
    cerrar_conexion_basededatos($conexion);
 
    return $fotos;
}

function get_cantidad_de_posiciones($cantidad){
    $cantidad_posiciones = $cantidad/10; 
    if($cantidad_posiciones%10>=0){
        $cantidad_posiciones = (int)$cantidad_posiciones+1;
    }
    return $cantidad_posiciones;
}

function cantidad_por_publicacion($cantidad,$cantidad_por_poscicion){
    $cantidad_por_poscicion = $cantidad_por_poscicion+10;
    $cantidad = $cantidad - $cantidad_por_poscicion; 
    if($cantidad<0){
        $cantidad_por_poscicion=$cantidad_por_poscicion+$cantidad;
    }
    return $cantidad_por_poscicion;
}

function cantidad_anterior_por_publicacion($cantidad,$cantidad_por_poscicion){
    $cantidad = $cantidad - $cantidad_por_poscicion; 
    if($cantidad<0){
        $cantidad_por_poscicion=$cantidad_por_poscicion+$cantidad;
    }
    $cantidad_por_poscicion++;
    return $cantidad_por_poscicion;
}

function get_posicion_publicacion_por_categoria($id_posicion){
    $cantidad_poscicion = $id_posicion * 10;

    return $cantidad_poscicion;
}

function get_publicaciones_vendo_por_id_categoria($id_categoria,$posicion){
    $conexion = abrir_conexion_basededatos();
    $publicaciones_por_id_categoria = mysql_query("SELECT pf.*, f.* FROM vista_producto_vendo_por_fecha AS pf INNER JOIN vista_una_foto AS f ON pf.id_producto=f.id_producto AND id_categoria='$id_categoria' AND siVendo='1' LIMIT $posicion,10",$conexion);

    $publicaciones = array();
    while ($row = mysql_fetch_assoc($publicaciones_por_id_categoria)) {
        $publicaciones[] = $row;
    }

    cerrar_conexion_basededatos($conexion);

    return $publicaciones;
}

function consulta_buscar($busqueda){
    $consulta = "SELECT * FROM vista_publicacion_producto WHERE otra_informacion_producto LIKE '%$busqueda%' OR nombre_producto LIKE '%$busqueda%' OR marca LIKE '%$busqueda%' OR modelo_producto LIKE '%$busqueda%' ";
    $palabrasclave = explode(" ",$busqueda);
    foreach ($palabrasclave as $palabraclave) {
        $consulta .="OR otra_informacion_producto LIKE '%$palabraclave%' OR nombre_producto LIKE '%$palabraclave%' OR marca LIKE '%$palabraclave%' OR modelo_producto LIKE '%$palabraclave%'";
    }
    return $consulta;
}

function contador_consulta_buscar($busqueda){
    $conexion = abrir_conexion_basededatos();

    $consulta = "SELECT count(*) AS contador FROM vista_publicacion_producto WHERE otra_informacion_producto LIKE '%$busqueda%' OR nombre_producto LIKE '%$busqueda%' OR marca LIKE '%$busqueda%' OR modelo_producto LIKE '%$busqueda%' ";
    $palabrasclave = explode(" ",$busqueda);
    foreach ($palabrasclave as $palabraclave) {
        $consulta .="OR otra_informacion_producto LIKE '%$palabraclave%' OR nombre_producto LIKE '%$palabraclave%' OR marca LIKE '%$palabraclave%' OR modelo_producto LIKE '%$palabraclave%'";
    }

    $contador= mysql_query($consulta,$conexion);

    $cantidad_de_posiciones = mysql_fetch_array($contador);

    return $publicaciones;
}


function busqueda($consulta){
    $conexion = abrir_conexion_basededatos();
    $publicaciones_busqueda= mysql_query($consulta,$conexion);

    $publicaciones = array();
    while ($row = mysql_fetch_assoc($publicaciones_busqueda)) {
        $publicaciones[] = $row;
    }

    cerrar_conexion_basededatos($conexion);

    return $publicaciones;
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
