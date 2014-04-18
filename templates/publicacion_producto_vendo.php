<?php $title = 'Vender' ?>

<?php ob_start() ?>
<script type="text/javascript">
  $(document).ready(function(){
    $("img").hover(function() {
      var src = $(this).attr("src");
      $("#zoom").attr("src",src);
    },function() {
      $("#zoom").attr("src","");
    });
  });
</script>
<?php $script = ob_get_clean() ?> 

<?php ob_start() ?>
<style type="text/css">
    .imagenes{
      width: 140px;
    }
    .imagen{
      max-height: 400px;
    }
    .highlight {
      padding: 9px 14px;
      margin-bottom: 14px;
      background-color: #f7f7f9;
      border: 1px solid #e1e1e8;
      border-radius: 4px;
      }
    .transparente{
      background-color:#CCC;background: transparent;
      position: absolute;
      z-index: 100;
      left: 600px;
      border: 1px solid #CCCCCC;
    }  
</style>
<?php $estilo = ob_get_clean() ?> 
<?php ob_start() ?>
<div class="transparente"><img id="zoom" src=""></div>  
<div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-5 highlight">  
        <div class="row">
            <div class="col-md-12 text-center">
                <div id="galeria_main_image" class="inline-block"></div>                
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <ul id="galeria_thumbs" class="list-inline">
                    <?php foreach ($fotos as $foto):?>
                    <li>
                        <a href="<?php echo $foto['path']?>"><img class="imagenes img-thumbnail" src="<?php echo $foto['path']?>"></a>
                    </li>
                  <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-1">
    </div>
    <div class="col-md-4">
      <h3 class="text-center"><?php echo $publicacion['nombre_producto']?></h3><hr><br>
      <div class="table-responsive ">
        <table>
          <tr>
            <td>
              <p><strong>Marca:&nbsp</strong></p>
            </td>
            <td>
              <p><?php echo $publicacion['marca']?></p>
            </td>
          </tr>
          <tr>
            <td>
              <p><strong>Modelo:&nbsp</strong></p>
            </td>
            <td>
              <p><?php echo $publicacion['modelo_producto']?></p>
            </td>
          </tr>
          <tr>
            <td>
              <p><strong>Valor:&nbsp</strong> </p> 
            </td>
            <td>
              <p class="text-primary">$ <?php echo $publicacion['precio_producto']?></p>
            </td>
          </tr>
          <tr>
            <td>
              <p><strong>Unidades:&nbsp</strong></p>
            </td>
            <td>
              <p><?php echo $publicacion['unidades_producto']?></p>
            </td>
          </tr>
          <tr>
            <td>
              <p><strong>Año de Fabricación:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</strong><p>
            </td>
            <td>
              <p><?php echo $publicacion['a_o_de_fabricacion']?></p>
            </td>
          </tr>
          <tr>
            <td>
              <p><strong>Estado:</strong></p> 
            </td>
            <td>
              <p><?php echo $publicacion['estado_del_producto']?></p>
            </td>
          </tr>
          <tr>
            <td>
              <p><strong>Departamento:</strong></p> 
            </td>
            <td>
              <p><?php echo utf8_encode($departamento["NOMBRE"])?></p>
            </td>
          </tr>
          <tr>
            <td>
              <p><strong>Ciudad:</strong></p> 
            </td>
            <td>
              <p><?php echo utf8_encode($ciudad["NOMBRE"])?></p>
            </td>
          </tr>
          <tr>
            <th colspan="2"> 
              <p class="text-center lead"><strong>Información de contacto</strong></p>
            </th>
          </tr>
          <tr>
            <td><p><strong>Telefono:</strong></p></td>
            <td><p><?php echo $usuario['telefono']?></p></td>
          </tr>
          <tr>
            <td><p><strong>Email:</strong></p></td>
            <td><p><?php echo $usuario['email']?></p></td>
          </tr>
          <tr>
            <td class="text-center" colspan="2">
              <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ventana_de_contacto">Contactar</button>
            </td>
          </tr>
        </table>   
      </div>
    </div>
     <div class="col-md-1">
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center">Información Adicional</h2>
    </div>
    <div class="col-md-1">
    </div>
    <div class="col-md-10 well">
        <p><?php echo $publicacion['otra_informacion_producto']?><p>
    </div>
    <div class="col-md-1">
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="ventana_de_contacto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Contactar</h4>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="form-group">
            <label for="emailcontacto">Email</label>
            <input type="email" class="form-control" id="emailcontacto" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="Telefono">Telefono</label>
            <input type="email" class="form-control" id="Telefono" placeholder="Telefono">
          </div>
          <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input type="email" class="form-control" id="Nombre" placeholder="Nombre">
          </div>
          <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="email" class="form-control" id="apellidos" placeholder="Apellidos">
          </div>
          <div class="form-group">
            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje" class="form-control" rows="3"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div>
<?php $contenido = ob_get_clean() ?>
 
<?php include 'base.php' ?>