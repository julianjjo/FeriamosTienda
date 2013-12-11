<?php $title = 'Vender' ?>

<?php include 'barra_categorias.php' ?>

<?php ob_start() ?>
<style type="text/css">
    .imagenes{
        width: 110px;
    }
</style>
<?php $estilo = ob_get_clean() ?>

<?php ob_start() ?>
<div class="row">
  <div class="col-xs-0 col-md-1">
  </div>
  <?php echo $barra ?>
  <div class="col-xs-12 col-md-7">
    <h1 class="text-center">Ultimas publicaciones</h1>
    <?php foreach ($publicaciones as $publicacion): ?>
      <div class="list-group">
        <a href="#" class="list-group-item">
          <div class="media">
              <img class="media-object pull-left imagenes img-thumbnail" src="<?php echo $publicacion['path'] ?>">
            <div class="media-body">
              <h4 class="media-heading"><?php echo $publicacion['nombre_producto'] ?></h4>
              <p><strong>Valor: </strong> <?php echo $publicacion['precio_producto'] ?><p>
              <p><strong>Unidades Disponibles: </strong> <?php echo $publicacion['unidades_producto'] ?><p>
            </div>
          </div>  
        </a>
      </div>    
    <?php endforeach; ?>
  </div>
  <div class="col-xs-0 col-md-1">
  </div>
</div>
  
<?php $contenido = ob_get_clean() ?>
 
<?php include 'base.php' ?>