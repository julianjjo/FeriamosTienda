<?php require "templates/publicidad.php"?>
<?php $title = 'Comprar' ?>

<?php include 'barra_categorias_busco.php' ?>

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
  <div class="col-xs-12 col-md-5">
    <a href="./publicarbusco" class="btn btn-success pull-right" role="button">Publique lo que desea comprar</a><br>
    <h2 class="text-center">Ultimas publicaciones</h2>
    <?php foreach ($publicaciones as $publicacion): ?>
      <div class="list-group">
        <a href="./publicacionbusco?id=<?php echo $publicacion['id_producto']?>" class="list-group-item">
          <div class="media">
            <div class="media-body">
              <h4><strong><?php echo $publicacion['nombre_producto'] ?></strong></h4>
              <p><strong>Marca: </strong> <?php echo $publicacion['marca'] ?><p>
              <p><strong>Presupuesto: </strong> <?php echo $publicacion['precio_producto'] ?><p>
              <p><strong>Unidades Nesesarias: </strong> <?php echo $publicacion['unidades_producto'] ?><p>
            </div>
          </div>  
        </a>
      </div> 
    <?php endforeach; ?>
  </div>
  <div class="col-xs-0 col-md-3">
    <?php echo $publicidad?>
  </div>
</div>
  
<?php $contenido = ob_get_clean() ?>
 
<?php include 'base.php' ?>