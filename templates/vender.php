<?php require "templates/publicidad.php"?>
<?php $title = 'Vender' ?>

<?php include 'barra_categorias.php' ?>

<?php ob_start() ?>
<style type="text/css">
    .imagenes{
        max-width: 110px;
        max-height: 110px;
    }
</style>
<?php $estilo = ob_get_clean() ?>

<?php ob_start() ?>
<div class="row">
  <div class="col-xs-0 col-md-1">
  </div>
  <?php echo $barra ?>
  <div class="col-xs-12 col-md-5">
    <a href="./publicacionvendo" class="btn btn-success pull-right" role="button">Publique lo que desea vender</a><br>
    <h2 class="text-center">Ultimas publicaciones</h2><hr>
    <?php foreach ($publicaciones as $publicacion): ?>
      <div class="list-group">
        <a href="./publicacionvendo?id=<?php echo $publicacion['id_producto']?>" class="list-group-item">
          <div class="media">
              <img class="media-object pull-left imagenes img-thumbnail" src="<?php echo $publicacion['path'] ?>">
            <div class="media-body">
              <h4 class="media-heading"><strong><?php echo $publicacion['nombre_producto'] ?></strong></h4>
              <p><strong>Marca: </strong> <?php echo $publicacion['marca'] ?></p>
              <p><strong>Valor: </strong>$ <?php echo $publicacion['precio_producto'] ?><p>
              <p><strong>Unidades Disponibles: </strong> <?php echo $publicacion['unidades_producto'] ?><p>
            </div>
          </div>  
        </a>
      </div>    
    <?php endforeach; ?>
  </div>
  <div class="col-xs-0 col-md-2"> 
    <?php echo $publicidad?>
  </div>
</div>
  
<?php $contenido = ob_get_clean() ?>
 
<?php include 'base.php' ?>