<?php
// model.php
 
function abrir_conexion_basededatos()
{
    $conexion = mysql_connect('localhost', 'remins45_julian', 'polojilop87');
    mysql_select_db('remins45_feriamos', $conexion);
 
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
        $conexion = abrir_conexion_basededatos();        
        $id_vendedor= $_SESSION["id_usuario"];
        $fecha_actual = date("Y-m-d");
        $nombre = $_POST["nombre"];
        $marca = $_POST["marca"];
        $categoria = $_POST["categoria"];
        if (isset($_POST["modelo"])) {
            $modelo = $_POST["modelo"];
        } else {
            $modelo = "";
        }       
        if (isset($_POST["anio_fabricacion"])) {
            $anio_fabricacion = $_POST["anio_fabricacion"];
        } else {
            $anio_fabricacion = "";
        }
        $estado = $_POST["estado"];
        if (isset($_POST["otra_informacion"])) {
            $otra_informacion = $_POST["otra_informacion"];
        } else {
            $otra_informacion = "";
        }               
        if($_POST["unidades"] != null){
            $unidades = $_POST["unidades"];
        }
        else{            
            $unidades=1;
        }       
        $precio = $_POST["precio"];
        $departamento = $_POST["departamento"];
        $ciudad = $_POST["ciudad"];
        $fecha_actual = date("Y-m-d");
        $nueva_publicacion_vendo="INSERT INTO producto VALUES ('','$categoria','1','$id_vendedor','$nombre','$precio','$unidades','$modelo','$marca','Colombia','$otra_informacion','$estado','$anio_fabricacion','$fecha_actual','1','$departamento','$ciudad','0')";
        mysql_query($nueva_publicacion_vendo,$conexion);
        echo mysql_error();
        $id_producto=mysql_insert_id();
        $contador = 0;
        if($_FILES["foto1"]["error"]=="0"){         
            $foto = $_FILES["foto1"]["tmp_name"];
            $nombre = $_FILES["foto1"]["name"];         
            $imagen_tipo = $_FILES["foto1"]["type"];  
            $partes_nombre=explode('.', $nombre);
            $tipo_de_foto=$partes_nombre[1];
            $nombre=md5(uniqid(time())).".".$tipo_de_foto;      
            $destino ="fotos/".$nombre;
            move_uploaded_file($foto, $destino);
            list($width, $height) = getimagesize($destino);
            $maxdimension = 900;
            if($width>$height) {
                // es mas ancha que alta 
                if($width<$maxdimension) {
                    // es mas pequena de lo que queremos 
                    $percent = 1;
                } else {
                    // calculamos la proporcion 
                    $percent = $maxdimension / $width;
                }
            } 
            else {
                // es mas alta que ancha 
                if($height<$maxdimension) {
                    // es mas pequena de lo que queremos 
                    $percent = 1;
                } 
                else {
                    // calculamos la proporcion 
                    $percent = $maxdimension / $height;
                }
            }
            // calculamos las nuevas dimensiones
            $newwidth = $width * $percent;
            $newheight = $height * $percent;
            // Crear imagenreducida y cargar imagen fuente
            $reducida = imagecreatetruecolor($newwidth, $newheight);
            //tipo de imagen
            switch ( $imagen_tipo ){
              case "image/jpg":
              case "image/jpeg":
                $original = imagecreatefromjpeg( $destino );
                break;
              case "image/png":
                $original = imagecreatefrompng( $destino );
                break;
              case "image/gif":
                $original = imagecreatefromgif( $destino );
                break;
            }
            // copiar la original con nuevas dimensiones
            imagecopyresampled($reducida, $original, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            unlink($destino);
            switch ( $imagen_tipo ){
              case "image/jpg":
              case "image/jpeg":
                imagejpeg($reducida, $destino, 75 );
                break;
              case "image/png":
                imagepng($reducida, $destino, 75 );
                break;
              case "image/gif":
                imagegif($reducida, $destino, 75 );
                break;
            }            
            $consulta_foto1 = "INSERT INTO Foto VALUES ('','$id_producto','$destino')";
            mysql_query($consulta_foto1,$conexion);
            $contador++;
        }  
        if($_FILES["foto2"]["error"]=="0"){
            $foto = $_FILES["foto2"]["tmp_name"];
            $nombre = $_FILES["foto2"]["name"];
            $imagen_tipo = $_FILES["foto1"]["type"];  
            $partes_nombre=explode('.', $nombre);
            $tipo_de_foto=$partes_nombre[1];
            $nombre=md5(uniqid(time())).".".$tipo_de_foto;      
            $destino ="fotos/".$nombre;
            move_uploaded_file($foto, $destino);
            list($width, $height) = getimagesize($destino);
            $maxdimension = 900;
            if($width>$height) {
                // es mas ancha que alta 
                if($width<$maxdimension) {
                    // es mas pequena de lo que queremos 
                    $percent = 1;
                } else {
                    // calculamos la proporcion 
                    $percent = $maxdimension / $width;
                }
            } 
            else {
                // es mas alta que ancha 
                if($height<$maxdimension) {
                    // es mas pequena de lo que queremos 
                    $percent = 1;
                } 
                else {
                    // calculamos la proporcion 
                    $percent = $maxdimension / $height;
                }
            }
            // calculamos las nuevas dimensiones
            $newwidth = $width * $percent;
            $newheight = $height * $percent;
            // Crear imagenreducida y cargar imagen fuente
            $reducida = imagecreatetruecolor($newwidth, $newheight);
            //tipo de imagen
            switch ( $imagen_tipo ){
              case "image/jpg":
              case "image/jpeg":
                $original = imagecreatefromjpeg( $destino );
                break;
              case "image/png":
                $original = imagecreatefrompng( $destino );
                break;
              case "image/gif":
                $original = imagecreatefromgif( $destino );
                break;
            }
            // copiar la original con nuevas dimensiones
            imagecopyresampled($reducida, $original, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            unlink($destino);
            switch ( $imagen_tipo ){
              case "image/jpg":
              case "image/jpeg":
                imagejpeg($reducida, $destino, 75 );
                break;
              case "image/png":
                imagepng($reducida, $destino, 75 );
                break;
              case "image/gif":
                imagegif($reducida, $destino, 75 );
                break;
            } 
            $consulta_foto2 = "INSERT INTO Foto VALUES ('','$id_producto','$destino')";
            mysql_query($consulta_foto2,$conexion);    
            $contador++;
        }
        if($_FILES["foto3"]["error"]=="0"){
            $foto = $_FILES["foto3"]["tmp_name"];
            $nombre = $_FILES["foto3"]["name"];
            $imagen_tipo = $_FILES["foto1"]["type"];  
            $partes_nombre=explode('.', $nombre);
            $tipo_de_foto=$partes_nombre[1];
            $nombre=md5(uniqid(time())).".".$tipo_de_foto;
            $destino ="fotos/".$nombre;
            move_uploaded_file($foto, $destino);
            list($width, $height) = getimagesize($destino);
            $maxdimension = 900;
            if($width>$height) {
                // es mas ancha que alta 
                if($width<$maxdimension) {
                    // es mas pequena de lo que queremos 
                    $percent = 1;
                } else {
                    // calculamos la proporcion 
                    $percent = $maxdimension / $width;
                }
            } 
            else {
                // es mas alta que ancha 
                if($height<$maxdimension) {
                    // es mas pequena de lo que queremos 
                    $percent = 1;
                } 
                else {
                    // calculamos la proporcion 
                    $percent = $maxdimension / $height;
                }
            }
            // calculamos las nuevas dimensiones
            $newwidth = $width * $percent;
            $newheight = $height * $percent;
            // Crear imagenreducida y cargar imagen fuente
            $reducida = imagecreatetruecolor($newwidth, $newheight);
            //tipo de imagen
            switch ( $imagen_tipo ){
              case "image/jpg":
              case "image/jpeg":
                $original = imagecreatefromjpeg( $destino );
                break;
              case "image/png":
                $original = imagecreatefrompng( $destino );
                break;
              case "image/gif":
                $original = imagecreatefromgif( $destino );
                break;
            }
            // copiar la original con nuevas dimensiones
            imagecopyresampled($reducida, $original, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            unlink($destino);
            switch ( $imagen_tipo ){
              case "image/jpg":
              case "image/jpeg":
                imagejpeg($reducida, $destino, 75 );
                break;
              case "image/png":
                imagepng($reducida, $destino, 75 );
                break;
              case "image/gif":
                imagegif($reducida, $destino, 75 );
                break;
            } 
            $consulta_foto3 = "INSERT INTO Foto VALUES ('','$id_producto','$destino')";
            mysql_query($consulta_foto3,$conexion);       
            $contador++;
        }
        if($contador==0){
            $nofoto="fotos/foto-no-disponible.jpg";
            $consulta_foto3 = "INSERT INTO Foto VALUES ('','$id_producto','$nofoto')";
            mysql_query($consulta_foto3,$conexion);
        }
        cerrar_conexion_basededatos($conexion);
        header("Location: ./publicacionvendo?id=".$id_producto);
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

function get_ultimas_publicaciones_vendo(){
    $conexion = abrir_conexion_basededatos();

    $ultimas_publicaciones_vendo = mysql_query("SELECT pf.*, f.* FROM vista_producto_vendo_por_fecha pf INNER JOIN vista_una_foto AS f ON pf.id_producto=f.id_producto AND siVendo='1' AND activo='0' LIMIT 8",$conexion);

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

    $categoria_por_id = mysql_query("SELECT count(*) as cantidad FROM vista_producto_vendo_por_fecha WHERE id_categoria='$id_categoria'",$conexion);

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
    $publicaciones_por_id_categoria = mysql_query("SELECT pf.*, f.* FROM vista_producto_vendo_por_fecha AS pf INNER JOIN vista_una_foto AS f ON pf.id_producto=f.id_producto AND id_categoria='$id_categoria' AND siVendo='1' AND activo='0' LIMIT $posicion,10",$conexion);

    $publicaciones = array();
    while ($row = mysql_fetch_assoc($publicaciones_por_id_categoria)) {
        $publicaciones[] = $row;
    }

    cerrar_conexion_basededatos($conexion);

    return $publicaciones;
}

function consulta_buscar($busqueda,$posicion){
    $consulta = "SELECT * FROM vista_publicacion_producto WHERE otra_informacion_producto LIKE '%$busqueda%' OR nombre_producto LIKE '%$busqueda%' OR marca LIKE '%$busqueda%' OR modelo_producto LIKE '%$busqueda%' ";
    $palabrasclave = explode(" ",$busqueda);
    foreach ($palabrasclave as $palabraclave) {
        $consulta .="OR otra_informacion_producto LIKE '%$palabraclave%' OR nombre_producto LIKE '%$palabraclave%' OR marca LIKE '%$palabraclave%' OR modelo_producto LIKE '%$palabraclave%' ";
    }
    $consulta.="LIMIT $posicion,10";
    return $consulta;
}

function contador_consulta_buscar($busqueda){
    $conexion = abrir_conexion_basededatos();

    $consulta = "SELECT count(*) AS contador FROM vista_publicacion_producto WHERE otra_informacion_producto LIKE '%$busqueda%' OR nombre_producto LIKE '%$busqueda%' OR marca LIKE '%$busqueda%' OR modelo_producto LIKE '%$busqueda%' ";
    $palabrasclave = explode(" ",$busqueda);
    foreach ($palabrasclave as $palabraclave) {
        $consulta .="OR otra_informacion_producto LIKE '%$palabraclave%' OR nombre_producto LIKE '%$palabraclave%' OR marca LIKE '%$palabraclave%' OR modelo_producto LIKE '%$palabraclave%' ";
    }    
    $contador= mysql_query($consulta,$conexion);
    $cantidad_de_posiciones = mysql_fetch_array($contador);
    $cantidad = $cantidad_de_posiciones['contador'];
    return $cantidad;
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
        session_start();      
        $conexion = abrir_conexion_basededatos();
        $contra=$_POST['password'];
        $salt = md5(uniqid(time(), true));
        $contrasena = hash("sha512", $contra.$salt);
        $email = $_POST['email'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $ciudad = $_POST['ciudad'];
        $departamento = $_POST['departamento'];
        $nuevo_usuario = "INSERT INTO usuario VALUES ('','$nombre','$apellidos','$email','$salt','$contrasena','$telefono','$direccion','1','$departamento','$ciudad','usuario')";               
        mysql_query($nuevo_usuario);
        $_SESSION['id_usuario']=mysql_insert_id();
        $_SESSION['email']=$email;  
        echo mysql_error(); 
        cerrar_conexion_basededatos($conexion);        
        header( 'Location: ./paneldeusuario' );
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
           echo "ingreso";
        } else {
           echo "noingreso";
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

function get_rol_usuario(){

}

function cerrar_sesion_usuario(){
     session_start();
     session_unset();
     session_destroy();
     header("Location: ./");
}

function set_demanda(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $conexion = abrir_conexion_basededatos();
        $nombre = $_POST['nombre'];
        if (isset($_POST['marca'])) {
            $marca = $_POST['marca'];
        } else {
            $marca = "";
        }        
        $categoria = $_POST['categoria'];
        if ($_POST['unidades']!=null) {
            $unidades = $_POST['unidades'];
        } else {
            $unidades = 1;
        }
        
        
        $precio = $_POST['precio'];
        if (isset($_POST['otra_informacion'])) {
            $otra_informacion = $_POST['otra_informacion'];
        } else {
            $otra_informacion = "";
        }        
        $id_comprador = $_SESSION['id_usuario'];
        $fecha_actual = date("Y-m-d");      
        $consulta = "INSERT INTO producto (id_producto,nombre_producto,marca,id_vendedor,id_categoria,unidades_producto,precio_producto,otra_informacion_producto,fecha_publicacion_producto,siVendo) VALUES ('','$nombre','$marca','$id_comprador','$categoria','$unidades','$precio','$otra_informacion','$fecha_actual','0')";
        mysql_query($consulta,$conexion);
        $id_producto=mysql_insert_id();
        echo mysql_error();
        cerrar_conexion_basededatos($conexion);
        header("Location: ./publicacionbusco?id=".$id_producto);
    }
}

function get_ultimas_publicaciones_busco(){
    $conexion = abrir_conexion_basededatos();
    $ultimas_publicaciones_busco = mysql_query("SELECT * FROM vista_publicacion_busco LIMIT 8",$conexion);

    $publicaciones = array();
    while ($row = mysql_fetch_assoc($ultimas_publicaciones_busco)) {     
        $publicaciones[] = $row;
    }
    cerrar_conexion_basededatos($conexion);
 
    return $publicaciones;
}

function get_cantidad_busco_categoria($id_categoria){
    $conexion = abrir_conexion_basededatos();
    $cantidad_busco_categoria = mysql_query("SELECT count(*) as contador FROM vista_publicacion_busco WHERE id_categoria='$id_categoria' LIMIT 8",$conexion);

    $row = mysql_fetch_array($cantidad_busco_categoria);

    $cantidad = $row['contador'];

    cerrar_conexion_basededatos($conexion);
 
    return $cantidad;
}

function get_busco_por_id_categoria($id_categoria,$cantidad_por_posicion){
    $conexion = abrir_conexion_basededatos();
    $busco_por_id_categoria = mysql_query("SELECT * FROM vista_publicacion_busco WHERE id_categoria='$id_categoria' LIMIT $cantidad_por_posicion,10",$conexion);

    $publicaciones = array();
    while ($row = mysql_fetch_assoc($busco_por_id_categoria)) {     
        $publicaciones[] = $row;
    }
    cerrar_conexion_basededatos($conexion);
 
    return $publicaciones;
}

function get_usuario(){
    $conexion = abrir_conexion_basededatos();
    $id_usuario = $_SESSION['id_usuario'];
    $usuario_por_id = mysql_query("SELECT * FROM usuario WHERE id_usuario='$id_usuario'",$conexion);

    $usuario = mysql_fetch_array($usuario_por_id);
    cerrar_conexion_basededatos($conexion);

    return $usuario;
}

function set_email_usuario(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $conexion = abrir_conexion_basededatos();
        session_start();
        $emailanterio = $_SESSION['email'];
        $id_usuario = $_SESSION['id_usuario'];
        session_unset(); 
        $email=$_POST['email'];
        $set_email = "UPDATE usuario SET email='$email' WHERE email='$emailanterio'";
        mysql_query($set_email,$conexion);
        $_SESSION['email']=$email;
        $_SESSION['id_usuario']=$id_usuario;
        cerrar_conexion_basededatos($conexion);
    }
}

function validar_contrasena(){
    header('Content-Type: text/html; charset=UTF-8'); 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $conexion = abrir_conexion_basededatos();
        $contrasena = $_POST["contrasena"];
        session_start();
        $id_usuario = $_SESSION['id_usuario'];
        $consulta_usuario = mysql_query("SELECT * FROM usuario WHERE id_usuario='$id_usuario'",$conexion);
        $usuario = mysql_fetch_array($consulta_usuario); 
        if(hash("sha512", $contrasena.$usuario['salt'])==$usuario['password']){
            echo "correcto";
        }
        else{
            echo "error";
        }    
        cerrar_conexion_basededatos($conexion);    
    }    
}

function set_contrasena_usuario(){
     if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $conexion = abrir_conexion_basededatos();
        $contra = $_POST["password"];
        session_start();
        $id_usuario = $_SESSION['id_usuario'];
        $salt = md5(uniqid(time(), true));
        $contrasena = hash("sha512", $contra.$salt);
        $set_contrasena = mysql_query("UPDATE usuario SET salt='$salt', password='$contrasena'  WHERE id_usuario='$id_usuario'",$conexion);
        cerrar_conexion_basededatos($conexion);
    }
}

function set_telefono_usuario(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $conexion = abrir_conexion_basededatos();
        $telefono = $_POST["telefono"];
        session_start();
        $id_usuario = $_SESSION['id_usuario'];
        $set_telefono = mysql_query("UPDATE usuario SET telefono='$telefono' WHERE id_usuario='$id_usuario'",$conexion);
        cerrar_conexion_basededatos($conexion);
    }
}

function set_direccion_usuario(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $conexion = abrir_conexion_basededatos();
        $direccion = $_POST["direccion"];
        $id_departamento = $_POST['departamento'];
        $id_ciudad = $_POST['ciudad'];
        session_start();
        $id_usuario = $_SESSION['id_usuario'];
        $set_direccion = mysql_query("UPDATE usuario SET direccion='$direccion', ID_DEPARTAMENTO = '$id_departamento', ID_CIUDAD = '$id_ciudad' WHERE id_usuario='$id_usuario'",$conexion);
        cerrar_conexion_basededatos($conexion);
    }
}

function get_publiciones_vendo_id_usuario(){
    $conexion = abrir_conexion_basededatos();
    $id_usuario = $_SESSION['id_usuario'];
    $publiciones_vendo_id_usuario = mysql_query("SELECT * FROM producto WHERE id_vendedor='$id_usuario' AND activo='0'",$conexion);

    $publicaciones = array();

    while ($row = mysql_fetch_assoc($publiciones_vendo_id_usuario)) {     
        $publicaciones[] = $row;
    }

    cerrar_conexion_basededatos($conexion);
    return $publicaciones;
}

function get_departamentos(){
    $conexion = abrir_conexion_basededatos();
    $consulta_departamentos = mysql_query("SELECT * FROM departamentos",$conexion);
    $departamentos = array();

    while ($row = mysql_fetch_assoc($consulta_departamentos)) {     
        $departamentos[] = $row;
    }

    cerrar_conexion_basededatos($conexion);
    return $departamentos;    
}

function get_ciudades_id_departamento($id_departamento){
    $conexion = abrir_conexion_basededatos();
    $consulta_ciudades = mysql_query("SELECT * FROM ciudades WHERE ID_DEPARTAMENTO = '$id_departamento'",$conexion);
    $ciudades = array();

    while ($row = mysql_fetch_assoc($consulta_ciudades)) {     
        $ciudades[] = $row;
    }

    cerrar_conexion_basededatos($conexion);
    return $ciudades;    
}
function get_departamento_id($id_departamento){
    $conexion = abrir_conexion_basededatos();
    $consulta_departamento = mysql_query("SELECT * FROM departamentos WHERE ID_DEPARTAMENTO = '$id_departamento'",$conexion);
    $departamento = mysql_fetch_array($consulta_departamento);
    cerrar_conexion_basededatos($conexion);
    return $departamento;  
}
function get_ciudad_id($id_ciudad){
    $conexion = abrir_conexion_basededatos();
    $consulta_ciudad = mysql_query("SELECT * FROM ciudades WHERE ID_CIUDAD = '$id_ciudad'",$conexion);
    $ciudad = mysql_fetch_array($consulta_ciudad);
    cerrar_conexion_basededatos($conexion);
    return $ciudad;  
}
function get_usuario_por_id($id_usuario){
    $conexion = abrir_conexion_basededatos();
    $usuario_por_id = mysql_query("SELECT * FROM usuario WHERE id_usuario='$id_usuario'",$conexion);

    $usuario = mysql_fetch_array($usuario_por_id);
    cerrar_conexion_basededatos($conexion);

    return $usuario;
}
function eliminar_publicacion_por_id($id_publicacion){
    $conexion = abrir_conexion_basededatos();
    $usuario_por_id = mysql_query("UPDATE producto SET activo='1' WHERE id_producto='$id_publicacion'");
    cerrar_conexion_basededatos($conexion);
}

function get_rol(){
    $conexion = abrir_conexion_basededatos();
    $id_usuario = $_SESSION['id_usuario'];
    $get_rol_por_id_usuario = mysql_query("SELECT rol FROM usuario WHERE id_usuario = '$id_usuario'");
    $usuario = mysql_fetch_array($get_rol_por_id_usuario);
    $rol = $usuario['rol'];
    cerrar_conexion_basededatos($conexion);

    return $rol;
}
function get_publicidad_aleatoria(){
    $conexion = abrir_conexion_basededatos();
    $consulta_publicidad_aleatoria = mysql_query("SELECT * FROM publicidad ORDER BY rand()");
    $publicidad_aleatoria = array();
    while ($row = mysql_fetch_assoc($consulta_publicidad_aleatoria)) {
       $publicidad_aleatoria[]=$row;
    }

    
    cerrar_conexion_basededatos($conexion);

    return $publicidad_aleatoria;
}

function get_publicaciones_mas_de_tres_meses(){
    $conexion = abrir_conexion_basededatos();
    $consulta_publicaciones_mas_de_tres_meses = mysql_query("SELECT *, if(year(curdate())>year(fecha_publicacion_producto),(month(curdate())+12)-month(fecha_publicacion_producto),month(curdate())-month(fecha_publicacion_producto)) AS meses FROM producto WHERE if(year(curdate())>year(fecha_publicacion_producto),(month(curdate())+12)-month(fecha_publicacion_producto),month(curdate())-month(fecha_publicacion_producto)) >='3' AND activo='0'");
    $publicaciones_mas_de_tres_meses=array();
    while ($row= mysql_fetch_assoc($consulta_publicaciones_mas_de_tres_meses)) {
        $publicaciones_mas_de_tres_meses[]=$row;
    }
    cerrar_conexion_basededatos($conexion);

    return $publicaciones_mas_de_tres_meses;
}

function get_ubicacion(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $ubicacion = $_POST['ubicacion'];
    }
    
    return $ubicacion;
}

function set_update_publicacion_vendo(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $conexion = abrir_conexion_basededatos();
        $id = $_POST['id'];
        $nombre=$_POST['nombre'];
        $marca = $_POST['marca'];
        $categoria = $_POST['categoria'];
        $modelo = $_POST['modelo'];
        $a_o_fabricacion = $_POST['anio_fabricacion'];
        $estado = $_POST['estado'];
        $otra_informacion = $_POST['otra_informacion'];
        $unidades = $_POST['unidades'];
        $precio = $_POST['precio'];
        $departamento = $_POST['departamento'];
        $ciudad = $_POST['ciudad'];
        $direccion = $_POST['dirreccion'];
        $consulta_update_publicacion_vendo=mysql_query("UPDATE producto SET nombre_producto='$nombre', precio_producto='$precio',unidades_producto='$unidades',modelo_producto='$modelo',marca='$marca',direccion_producto='$direccion',otra_informacion_producto='$otra_informacion',estado_del_producto='estado',a_o_de_fabricacion ='$a_o_fabricacion',ID_DEPARTAMENTO='$departamento',ID_CIUDAD='$ciudad' WHERE id_producto='$id'" ); 
        cerrar_conexion_basededatos($conexion);
    }
}
function set_update_publicacion_compro(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $conexion = abrir_conexion_basededatos();
        $id = $_POST['id'];
        $nombre=$_POST['nombre'];
        $marca = $_POST['marca'];
        $categoria = $_POST['categoria'];
        //$modelo = $_POST['modelo'];
        $estado = $_POST['estado'];
        $otra_informacion = $_POST['otra_informacion'];
        $unidades = $_POST['unidades'];
        $precio = $_POST['precio'];
        $consulta_update_publicacion_vendo=mysql_query("UPDATE producto SET nombre_producto='$nombre', precio_producto='$precio',unidades_producto='$unidades',marca='$marca',otra_informacion_producto='$otra_informacion',estado_del_producto='estado' WHERE id_producto='$id'" ); 
        cerrar_conexion_basededatos($conexion);
    }
}
function get_categorias_con_productos_vendo(){
    $conexion = abrir_conexion_basededatos();
    $consulta_categorias_con_productos_vendo = mysql_query("SELECT c.* FROM categoria as c inner join producto as p on c.id_categoria=p.id_categoria and siVendo='1' GROUP BY c.id_categoria");
    $categorias_con_productos_vendo=array();
    while ($row= mysql_fetch_assoc($consulta_categorias_con_productos_vendo)) {
        $categorias_con_productos_vendo[]=$row;
    }
    cerrar_conexion_basededatos($conexion);

    return $categorias_con_productos_vendo;
}
function get_categorias_con_productos_compro(){
    $conexion = abrir_conexion_basededatos();
    $consulta_categorias_con_productos_compro = mysql_query("SELECT c.* FROM categoria as c inner join producto as p on c.id_categoria=p.id_categoria and siVendo='0' GROUP BY c.id_categoria");
    $categorias_con_productos_compro=array();
    while ($row= mysql_fetch_assoc($consulta_categorias_con_productos_compro)) {
        $categorias_con_productos_compro[]=$row;
    }
    cerrar_conexion_basededatos($conexion);

    return $categorias_con_productos_compro;
}
function eliminar_categoria_por_id($id_categoria){
    $conexion = abrir_conexion_basededatos();
    $consulta_eliminar_categoria_por_id = mysql_query("DELETE FROM categoria WHERE id_categoria='$id_categoria'");
    cerrar_conexion_basededatos($conexion);
}
function crear_categoria(){
    $conexion = abrir_conexion_basededatos();
    $nombre_categoria=$_POST["nombre_categoria"];
    $consulta_crear_categoria = mysql_query("INSERT INTO categoria VALUES('','$nombre_categoria')");
    echo mysql_error();
    cerrar_conexion_basededatos($conexion);
}
?>
