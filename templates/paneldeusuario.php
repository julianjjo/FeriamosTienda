<?php $title = 'Panel de usuario' ?>

<?php ob_start() ?>
<script type="text/javascript">
      $( document ).ready(function() {
        $( "#departamento" ).change(function() {
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
        window.location.href='/paneldeusuario';
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
              window.location.href='/paneldeusuario';
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
          window.location.href='/paneldeusuario';
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
        window.location.href='/paneldeusuario';
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
    function modificar(vendo,id_publicacion){
        $.get( "/modificarporid",{vendo:vendo,id:id_publicacion})
              .done(function(data) {        
                $("#contenido").html(data);
        });
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
        </div>
      </div>
      <div class="col-md-1">
      </div>      
    </div>  
    <div class="modal fade" id="emailmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="location.href='/paneldeusuario'">&times;</button>
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
              <button type="button" class="btn btn-default" data-dismiss="modal"  onclick="location.href='/paneldeusuario'">Cerrar</button>
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
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="location.href='/paneldeusuario'">&times;</button>
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
            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.href='/paneldeusuario'">Cerrar</button>
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
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="location.href='/paneldeusuario'">&times;</button>
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
            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.href='/paneldeusuario'">Cerrar</button>
            <input type="button" class="btn btn-primary" onclick="enviartelefono()" value="Guardar Cambios">
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->   
    <div class="modal fade" id="direccionmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="location.href='/paneldeusuario'">&times;</button>
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
                    <select class="form-control" id="departamento" name="departamento">
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
            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.href='/paneldeusuario'">Close</button>
            <button type="button" class="btn btn-primary" onclick="enviardireccion()">Save changes</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal --> 
    <div class="modal fade" id="modificarmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="location.href='/paneldeusuario'">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Modificar</h4>
          </div>
          <div class="modal-body" id="contenido">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.href='/paneldeusuario'">Close</button>
            <button type="button" class="btn btn-primary" onclick="">Save changes</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal --> 
  </div>
<?php $contenido = ob_get_clean() ?>
 
<?php include 'base.php' ?>