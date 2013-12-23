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
  <div class="col-md-10">
    <h1 class="text-center">Resultados de la busqueda</h1>
    <?php foreach ($publicaciones as $publicacion): ?>
      <div class="list-group">
        <a href="./publicacionvendo?id=<?php echo $publicacion['id_producto']?>" class="list-group-item">
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
<div clas="row">
    <div class="col-md-1">
    </div>
    <div class="col-xs-8 col-md-5">
      <ul class="pagination">
        <?php if ($id>0):?>  
          <li><a href="/buscar?buscar=<?php echo $busqueda?>&id=<?php echo $id-1 ?>">&laquo;</a></li>
        <?php else:?>
          <li class="disabled noevent"><a href="/buscar?buscar=<?php echo $busqueda?>&id=<?php echo $id ?>">&laquo;</a></li>
        <?php endif;?>
        <?php $contador=0 ?>
        <?php for ($contador=1; $contador <= $catidad_posicion; $contador++):?>            
            <?php if($contador-1==$id): ?>     
              <li class="active"><a href="/buscar?buscar=<?php echo $busqueda?>&id=<?php echo $contador-1?>"><?php echo $contador?></a></li>
            <?php else:?>
              <li><a href="/buscar?buscar=<?php echo $busqueda?>&id=<?php echo $contador-1?>"><?php echo $contador?></a></li>
            <?php endif;?>  
        <?php endfor; ?>
        <?php if ($id<$catidad_posicion-1):?> 
          <li><a href="/buscar?buscar=<?php echo $busqueda?>&id=<?php echo $id+1?>">&raquo;</a></li>
        <?php else: ?>
          <li class="disabled noevent"><a href="/buscar?buscar=<?php echo $busqueda?>&id=<?php echo $id?>">&raquo;</a></li>
        <?php endif;?>
      </ul>
    </div>
    <div class="col-xs-4 col-md-5">
      <br>
      <p class="pull-right">Mostrando de <?php echo $cantidad_anterior_por_publicacion ?>  a <?php echo $cantidad_por_publicacion?> de <?php echo $cantidad ?> (<?php echo $catidad_posicion ?> Páginas)<p>
    </div>  
    <div class="col-md-1">
    </div>
  </div>    
</div>
<?php $contenido = ob_get_clean() ?>
 
<?php include 'base.php' ?>