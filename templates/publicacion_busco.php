<?php $title = 'Busco' ?>

<?php ob_start() ?>
<style type="text/css">
    .imagenes{
      width: 110px;
    }
    .imagen{
      max-height: 300px;
    }
    .highlight {
      padding: 9px 14px;
      margin-bottom: 14px;
      background-color: #f7f7f9;
      border: 1px solid #e1e1e8;
      border-radius: 4px;
      }
</style>
<?php $estilo = ob_get_clean() ?> 
<?php ob_start() ?>
<div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
      <h2 class="text-center"><?php echo $publicacion['nombre_producto']?></h2><hr><br>
      <div class="table-responsive">
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
              <p><strong>Presupuesto:&nbsp</strong> </p> 
            </td>
            <td>
              <p class="text-primary">$ <?php echo $publicacion['precio_producto']?></p>
            </td>
          </tr>
          <tr>
            <td>
              <p><strong>Unidades Nesesarias:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</strong></p>
            </td>
            <td>
              <p><?php echo $publicacion['unidades_producto']?></p>
            </td>
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
     <div class="col-md-4">
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