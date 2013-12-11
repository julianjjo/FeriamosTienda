<?php $title = 'Vender' ?>

<?php include 'barra_categorias.php' ?>

<?php ob_start() ?>
<style type="text/css">
    .imagenes{
        width: 110px;
    }
    .noevent{
      pointer-events: none;
      cursor: default;
    }
</style>
<?php $estilo = ob_get_clean() ?>

<?php ob_start() ?>
<div class="row">
  <div class="col-xs-0 col-md-1">
  </div>
  <?php echo $barra ?>
  <div class="col-xs-12 col-md-7">
    <h1 class="text-center"><?php echo utf8_encode($categoria_id['nombre_categoria'])?></h1>
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
    <div class="well">
      <ul class="pagination lead">
        <!--<li class="disabled noevent"><a href="#">&laquo;</a></li>
        <li class="active noevent"><a href="#">1</a></li>-->
        <li><a href="/vender?id1=0&id2=<?php echo $categoria_id['id_categoria']?>">&laquo;</a></li>
        <?php $contador=0 ?>
        <?php for ($contador=1; $contador <= $catidad_posicion; $contador++):?>
          <li><a href="/vender?id1=<?php echo $contador-1?>&id2=<?php echo $categoria_id['id_categoria']?>"><?php echo $contador?></a></li>
        <?php endfor; ?>
        <li><a href="#">&raquo;</a></li>
      </ul>
    </div>    
  </div>
  <div class="col-xs-0 col-md-1">
  </div>
</div>
  
<?php $contenido = ob_get_clean() ?>
 
<?php include 'base.php' ?>