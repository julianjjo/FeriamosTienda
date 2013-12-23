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
    <div class="col-md-1">
    </div>
    <div class="col-md-10">
      <h1 class="text-center"><?php echo $publicacion['nombre_producto']?></h1><hr><br>
      <div class="table-responsive">
        <table>
          <tr>
            <td>
              <p class="lead"><strong>Marca:&nbsp</strong></p>
            </td>
            <td>
              <p class="lead"><?php echo $publicacion['marca']?></p>
            </td>
          </tr>
          <tr>
            <td>
              <p class="lead"><strong>Presupuesto:&nbsp</strong> </p> 
            </td>
            <td>
              <p class="lead text-primary">$ <?php echo $publicacion['precio_producto']?></p>
            </td>
          </tr>
          <tr>
            <td>
              <p class="lead"><strong>Unidades Nesesarias:&nbsp</strong></p>
            </td>
            <td>
              <p class="lead"><?php echo $publicacion['unidades_producto']?></p>
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
<?php $contenido = ob_get_clean() ?>
 
<?php include 'base.php' ?>