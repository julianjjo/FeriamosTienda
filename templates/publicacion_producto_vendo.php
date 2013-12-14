<?php $title = 'Vender' ?>

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
    <div class="col-md-4 highlight">
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
    <div class="col-md-6">
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
              <p class="lead"><strong>Precio:&nbsp</strong> </p> 
            </td>
            <td>
              <p class="lead text-primary">$ <?php echo $publicacion['precio_producto']?></p>
            </td>
          </tr>
          <tr>
            <td>
              <p class="lead"><strong>Unidades:&nbsp</strong></p>
            </td>
            <td>
              <p class="lead"><?php echo $publicacion['unidades_producto']?></p>
            </td>
          </tr>
          <tr>
            <td>
              <p class="lead"><strong>Año de Fabricación:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</strong><p>
            </td>
            <td>
              <p class="lead"><?php echo $publicacion['a_o_de_fabricacion']?></p>
            </td>
          </tr>
          <tr>
            <td>
              <p class="lead "><strong>Estado:</strong></p> 
            </td>
            <td>
              <p class="lead"><?php echo $publicacion['estado_del_producto']?></p>
            </td>
          </tr>
          <tr>
            <td>
              <p class="lead "><strong>Departamento:</strong></p> 
            </td>
            <td>
              <p class="lead"><?php echo ucfirst(strtolower($publicacion['estado_o_departamento_producto']))?></p>
            </td>
          </tr>
          <tr>
            <td>
              <p class="lead "><strong>Ciudad:</strong></p> 
            </td>
            <td>
              <p class="lead"><?php echo ucfirst(strtolower($publicacion['ciudad_producto']))?></p>
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
        <h2 class="text-center">Otra información</h2>
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