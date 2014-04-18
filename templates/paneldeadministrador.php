<?php $title = 'Panel de Administrador' ?>

<?php ob_start() ?>
<script type="text/javascript">
    var limite = 2000;
    var id,sivendo;

    $(document).ready(function() {
        $("#otra_informacion").keyup(function() {
          var longuitud = $(this).val().length;
          var mensaje = "Informacion Adicional (caracteres restantes: "
          longuitud =  limite - longuitud;
          mensaje = mensaje + longuitud +")";
          $("#texto_caracter").text(mensaje);
        });
        $("#departamentos").change(function() {
            var id_departamento = $(this).val();
            var ciudades = "<option value=\"\">Seleccione la ciudad</option>";
            $.get( "/departamento", { id: id_departamento} )
                .done(function( data ) {
                ciudades = ciudades+data;                
                $("#ciudades").html(ciudades);
            });
        });
    }); 
    function enviaremail(){
      var respuesta=confirm("Desea modificar o cambiar el Email");
      if (respuesta==true) {
        $.post( "/cambiocorreo",$("#formularioemail").serialize());
      }
      else{
        window.location.href='/paneldeadministrador';
      }      
    }
    function enviarcontraseña(){
      $("#errorcontranterior").addClass( "hidden" );
      validar=validar_contrasena();
      if(validar==true){
        var contraseñanterior = $("#contraseñanterior").val();
        $.post("/valcontra",{contrasena: contraseñanterior}).done(function( data ) {  
          if(data=="correcto"){
            var respuesta=confirm("Desea cambiar la Contraseña");
            if (respuesta==true) {
              $.post("/cambiarcontra",$("#formulariocontraseña").serialize());
            }
            else{
              window.location.href='/paneldeadministrador';
            } 
          }
          else{
            $("#errorcontranterior").removeClass( "hidden" );
          }
        });
      }
    }
    function enviartelefono(){
      validar=validar_telefono();
      if(validar==true){
        var respuesta=confirm("Desea modificar o cambiar el Telefono");
        if (respuesta==true) {
          $.post( "/cambiotelefono",$("#formulariotelefono").serialize());
        }
        else{
          window.location.href='/paneldeadministrador';
        } 
      }
    }
    function validar_dirrecion(){
      var departamento = document.getElementById("departamento").selectedIndex;
      var ciudad = document.getElementById("ciudad").selectedIndex;
       if( departamento == null || departamento == 0 ) {
        $("#departamentoerror").removeClass( "hidden" );  
        return false;
      }
      else if( ciudad == null || ciudad == 0 ) {
        $("#ciudaderror").removeClass( "hidden" );  
        return false;
      }
      return true;
    }
    function enviardireccion(){     
      var respuesta=confirm("Desea modificar o cambiar la Dirreción");
      if (respuesta==true) {
        if(validar_dirrecion()==true){
          $.post( "/cambiodireccion",$("#formulariodireccion").serialize());
        }        
      }
      else{
        window.location.href='/paneldeadministrador';
      }    
    }
    function eliminar_publicacion(button,id_publicacion){ 
      var i=0;
      var respuesta=confirm("Desea eliminar la publicación");     
      if (respuesta==true) {
        tr = button.parentNode.parentNode;      
        while(i<tr.childNodes.length){
          tr.removeChild(tr.childNodes[i]);
        }
        $.get( "/eliminar_publicacion",{id:id_publicacion});
      }
    }
    function eliminar_categoria(button,id_categoria){
      var i=0;
      var respuesta=confirm("Desea eliminar la publicación");     
      if (respuesta==true) {
        tr = button.parentNode.parentNode;      
        while(i<tr.childNodes.length){
          tr.removeChild(tr.childNodes[i]);
        }
        $.get( "/eliminar_categoria",{id:id_categoria});
      }
    }
    function modificar(vendo,id_publicacion){
      var  url = "/modificarporidformulario?vendo="+vendo;
      url = url+"&id=";
      url = url+id_publicacion;
      $( "#contenido" ).load(url);   
      id=id_publicacion;
      sivendo=vendo;    
    }
    function  get_ciudades(prueba) {
       var id_departamento = prueba.value;
        var ciudades = "<option value=\"\">Seleccione la ciudad</option>";
        $.get( "/departamento", { id: id_departamento} )
            .done(function( datos ) {
            ciudades = ciudades+datos;                
            $("#ciudad").html(ciudades);
        });
    }
    function set_modificacion(){
      var parametros = "&id="+id;
      parametros += "&ubicacion="+sivendo;
      var respuesta=confirm("Desea modificar la publicación");         
      if (respuesta==true) {      
        if(sivendo == 1){
          if(validacion_modificar_vendo()==true){
            $.post( "/modificarporid", $("#modificarvendo").serialize()+parametros);
          }
        }
        else {
          $.post( "/modificarporid", $("#modificarcompro").serialize()+parametros)
          .done(function(datos) {
            alert(datos);
          });
        }
      }
    }
    function add_categoria(){
      $.post( "/crear_categoria", $("#formcategorias").serialize())
        .done(function(datos) {
          alert(datos);
        });
      window.location.href='/paneldeadministrador';
    }
</script>
<?php $script = ob_get_clean() ?> 

<?php ob_start() ?>
<style type="text/css">
  .bordes{
    border-style:solid;
    border-color: #D8D8D8;
    padding: 20px;
    border-radius: 10px;
    background-color: #FFFFFF;
    border-width: 1px;
  }
</style>
<?php $estilo = ob_get_clean() ?> 

<?php ob_start() ?>
  <div class="container">
    <div class="row">
      <div class="col-md-1">
      </div>
      <div class="col-md-10 bordes">
        <ul id="myTab" class="nav nav-tabs">
          <li class="active"><a href="#perfil" data-toggle="tab">Perfil</a></li>
          <li class=""><a href="#publicaciones" data-toggle="tab">Publicaciones</a></li>
          <li class=""><a href="#publicaciones_meses" data-toggle="tab">Publicaciones con mas de 3 meses</a>
          <li class=""><a href="#categorias" data-toggle="tab">Categorias</a></li>
          <li class=""><a href="#publicidad" data-toggle="tab">Publicidad</a>    
        </ul>
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade active in" id="perfil">
            <br>
            <div class="table-responsive">
              <table class="table table-bordered">
                <tr>
                  <td>
                    <p><strong>Direccion de Email:</strong></p>
                  </td>
                  <td>                    
                    <p><?php echo $usuario['email']?></p>
                  </td>
                  <td>
                    <button class="btn btn-default" data-toggle="modal" data-target="#emailmodal">Modificar o Cambiar</button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p><strong>Contraseña:</strong>
                  </td>
                  <td>
                    <p>********</p>
                  </td>
                  <td>
                    <button class="btn btn-default" data-toggle="modal" data-target="#contrasena">Cambiar</button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p><strong>Telefono:</strong></p>
                  </td>
                  <td>
                    <p><?php echo $usuario['telefono']?></p>
                  </td>
                  <td>
                    <button class="btn btn-default" data-toggle="modal" data-target="#telefonomodal">Modificar o Cambiar</button>
                  </td>
                </tr>
                <tr>
                  <td rowspan="3">
                     <p><strong>Ubicación actual:</strong></p>
                  </td>
                  <td>
                    <p><strong>Departamento:</strong><?php echo " ".utf8_encode($departamento["NOMBRE"])?></p>
                  </td>
                  <td rowspan="3">
                    <button class="btn btn-default" data-toggle="modal" data-target="#direccionmodal">Modificar o Cambiar</button>
                  </td>
                </tr>
                <tr>
                  <td>
                  <p><strong>Ciudad:</strong><?php echo " ".utf8_encode($ciudad["NOMBRE"])?></p> 
                 </td>
                </tr>
                <tr>
                  <td>
                    <p><strong>Dirección:</strong><?php echo " ".$usuario['direccion']?></p>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="publicaciones">
            <br>
            <table class="table table-hover">
            <tr>
              <th class="text-center">Nombre de la publicación</th>
              <th class="text-center">Ubicación</th>
              <th></th>
              <th></th>
            </tr>
            <?php foreach ($publicaciones as $publicacion):?>
              <tr>
                <td><?php echo $publicacion["nombre_producto"]?></td>
                <?php if ($publicacion["siVendo"]=="1"):?>
                <td>Vendo</td>
                <?php elseif ($publicacion["siVendo"]=="0"):?>
                <td>Compro</td>
                <?php endif;?>
                <td><button class="btn btn-primary" data-toggle="modal" data-target="#modificarmodal" onclick="modificar(<?php echo $publicacion["siVendo"]?>,<?php echo $publicacion["id_producto"]?>)">Modificar</button></td>
                <td><button class="btn btn-warning" onclick="eliminar_publicacion(this,<?php echo $publicacion["id_producto"]?>)">Eliminar</button></td>
              </tr>
            <?php endforeach;?>
            </table>
          </div>
          <div class="tab-pane fade" id="publicaciones_meses"><br>
              <table class="table table-hover">
                <tr>
                  <th class="text-center">Nombre de la publicación</th>
                  <th class="text-center">Ubicación</th>
                  <th></th>
                  <th></th>
                <?php foreach ($publicaciones_meses as $publicacion):  ?>
                </tr> 
                  <td><?php echo $publicacion['nombre_producto']?></td>
                  <?php if ($publicacion["siVendo"]=="1"):?>
                  <td>Vendo</td>
                  <?php elseif ($publicacion["siVendo"]=="0"):?>
                  <td>Compro</td>
                  <?php endif;?>
                   <td><button class="btn btn-primary">Enviar correo</button></td>
                  <td><button class="btn btn-warning" onclick="eliminar_publicacion(this,<?php echo $publicacion["id_producto"]?>)">Eliminar</button></td>
                </tr>        
                <?php endforeach;?> 
              </table>
          </div>
          <div class="tab-pane fade" id="publicidad"><br>
            <div class="row text-right">
              <div class="col-md-12">
                <button class="btn btn-default">Adicionar nueva publicidad</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12"><br>
                 <table class="table table-hover">
                <tr>
                  <th class="text-center">Publicidad</th>
                  <th class="text-center">Fecha de inicio</th>
                  <th class="text-center">Fecha de fin</th>
                  <th class="text-center">Hora de inicio</th>
                  <th class="text-center">Hora de fin</th>
                  <th></th>
                <?php foreach ($publicidades as $publicidad):  ?>
                </tr> 
                  <td><?php echo $publicacion['nombre_producto']?></td>
                  <?php if ($publicacion["siVendo"]=="1"):?>
                  <td>Vendo</td>
                  <?php elseif ($publicacion["siVendo"]=="0"):?>
                  <td>Compro</td>
                  <?php endif;?>
                   <td><button class="btn btn-primary">Enviar correo</button></td>
                  <td><button class="btn btn-warning" onclick="eliminar_publicacion(this,<?php echo $publicacion["id_producto"]?>)">Eliminar</button></td>
                </tr>        
                <?php endforeach;?> 
              </table>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="categorias"><br>
            <div class="row text-right">
              <div class="col-md-12">
                <button class="btn btn-default" data-toggle="modal" data-target="#adiccionarcategoriamodal">Adicionar nueva Categoria</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12"><br>
                 <table class="table table-hover">
                <tr>
                  <th class="text-center">Nombre de la Categoria</th>
                  <th></th>
                <?php foreach ($categorias as $categoria):  ?>
                </tr> 
                  <td><?php echo utf8_encode($categoria['nombre_categoria'])?></td>
                  <td><button class="btn btn-warning" onclick="eliminar_categoria(this,<?php echo $categoria["id_categoria"]?>)">Eliminar</button></td>
                </tr>        
                <?php endforeach;?> 
              </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-1">
      </div>      
    </div>  
    <div class="modal fade" id="emailmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
            <h4 class="modal-title" id="myModalLabel">Modificar o Cambiar Dirreción de Email</h4>
          </div>
          <form method="post" id="formularioemail">
            <div class="modal-body">            
                <div class="form-group">
                  <label for="email" >*Direccion de Email:</label>
                  <input type="email" class="form-control" id="email" name="email" value="<?php echo $usuario['email']?>" required>
                  <p id="prueba"></p>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal"  >Cerrar</button>
              <input type="button" class="btn btn-primary" onclick="enviaremail()" value="Guardar Cambios">
            </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->    
    <div class="modal fade" id="contrasena" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
            <h4 class="modal-title" id="myModalLabel">Cambiar Contraseña</h4>
          </div>
          <div class="modal-body">
            <form method="post" id="formulariocontraseña">
              <div class="form-group">
                <div id="errorcontranterior" class="alert alert-danger hidden">
                    <p>Debe ingresar la contraseña anterior</p>
                </div>
                <label for="contraseñanterior">Contraseña Anterior:</label>
                <input type="password" class="form-control" placeholder="Contraseña Anterior" name="passwordanterior" id="contraseñanterior" required>
              </div>
              <div class="form-group">
                <div id="errorcontra" class="alert alert-danger hidden">
                    <p>La contraseña debe tener entre mínimo 8 caracteres, por lo menos un digito y un alfanumérico, y no puede contener caracteres espaciales</p>
                </div>
                <label for="contraseña">Contraseña Nueva:</label>
                <input type="password" class="form-control" id="contraseña" placeholder="Contraseña" name="password" id="contraseña" required>
              </div>
              <div class="form-group">
                <div id="errorrepetircontra" class="alert alert-danger hidden">
                    <p>La contraseñas no son iguales</p>
                </div>         
                <label for="repetircontraseña">Repetir Contraseña:</label>
                <input type="password" class="form-control" id="repetircontraseña" placeholder="Repitir Contraseña" name="repetirpassword" id="repetircontraseña" required>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
            <input type="button" class="btn btn-primary" onclick="enviarcontraseña()" value="Guardar Cambios">
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal --> 
    <!-- Modal -->
    <div class="modal fade" id="telefonomodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
            <h4 class="modal-title" id="myModalLabel">Modificar o Cambiar Telefono</h4>
          </div>
          <div class="modal-body">
            <form id="formulariotelefono">
              <div class="form-group">
                  <div id="errortelefono" class="alert alert-danger hidden">
                      <p>El telefono solo debe tener numeros</p>
                  </div>
                  <label for="telefono">*Telefono:</label>
                  <input type="tel" class="form-control" id="telefono" value="<?php echo $usuario['telefono']?>" name="telefono" required>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
            <input type="button" class="btn btn-primary" onclick="enviartelefono()" value="Guardar Cambios">
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->   
    <div class="modal fade" id="direccionmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
            <h4 class="modal-title" id="myModalLabel">Modificar o Cambiar Telefono</h4>
          </div>
          <div class="modal-body">
            <form id="formulariodireccion">
                <div class="form-group">
                    <label for="direccion">*Dirección:</label>
                    <input type="input" class="form-control" id="direccion" value="<?php echo $usuario['direccion']?>" name="direccion" required>
                </div>
                <div class="form-group">
                    <div class="alert alert-danger hidden" id="departamentoerror">
                        <p>Selecione un departamento</p>
                    </div>
                    <label>Departamento</label>
                    <select class="form-control" id="departamentos" name="departamento">
                        <option value="">Seleccione el departamento</option>
                        <?php foreach ($departamentos as $departamento): ?>
                            <option value="<?php echo $departamento['ID_DEPARTAMENTO'] ?>"><?php echo utf8_encode($departamento['NOMBRE'])?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="alert alert-danger hidden" id="ciudaderror">
                        <p>Selecione una ciudad</p>
                    </div>
                    <label>Ciudad</label>
                    <select class="form-control" id="ciudades" name="ciudad">
                        <option value="">Seleccione la ciudad</option>
                    </select>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
            <button type="button" class="btn btn-primary" onclick="enviardireccion()">Guardar Cambios</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal --> 
    <div class="modal fade" id="modificarmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
            <h4 class="modal-title" id="myModalLabel">Modificar</h4>
          </div>
          <div class="modal-body" id="contenido">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
            <button type="button" class="btn btn-primary" onclick="set_modificacion()">Guardar Cambios</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal --> 
    <div class="modal fade" id="adiccionarcategoriamodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
            <h4 class="modal-title" id="myModalLabel">Adiccionar Categorias</h4>
          </div>
          <div class="modal-body" id="contenido">
            <form id="formcategorias">
              <div class="form-group"> 
                <label for="categoria">Nombre de categoria:</label>               
                <input type="text" id="categoria" class="form-control" name="nombre_categoria" placeholder="Categoria">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
            <button type="button" class="btn btn-primary" onclick="add_categoria()">Guardar Cambios</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal --> 
  </div>
<?php $contenido = ob_get_clean() ?>
 
<?php include 'base.php' ?>