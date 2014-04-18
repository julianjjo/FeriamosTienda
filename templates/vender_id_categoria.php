<?php $title = 'Vender' ?>

<?php include 'barra_categorias.php' ?>

<?php ob_start() ?>
<style type="text/css">
    .imagenes{
        max-width: 110px;
        max-height: 110px;
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
    <a href="./publicacionvendo" class="btn btn-success pull-right" role="button">Publique lo que desea vender</a><br>
    <h2 class="text-center"><?php echo utf8_encode($categoria_id['nombre_categoria'])?></h2>
    <hr><br>
    <div class="row text-center">      
    <?php if ($cantidad==0):?>
          <a class="lead" href="/publicacionvendo"><strong>Publique</strong> su <?php echo utf8_encode($categoria_id['nombre_categoria'])?> a Comprar</a>
    <?php endif;?>
    </div>
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
    <div clas="row">
      <div class="col-xs-8 col-md-6">
        <ul class="pagination">
          <?php if ($id1>0):?>  
            <li><a href="/vender?id1=<?php echo $id1-1 ?>&id2=<?php echo $categoria_id['id_categoria']?>">&laquo;</a></li>
          <?php else:?>
            <li class="disabled noevent"><a href="/vender?id1=<?php echo $id1 ?>&id2=<?php echo $categoria_id['id_categoria']?>">&laquo;</a></li>
          <?php endif;?>
          <?php $contador=0 ?>
          <?php for ($contador=1; $contador <= $catidad_posicion; $contador++):?>            
              <?php if($contador-1==$id1): ?>     
                <li class="active"><a href="/vender?id1=<?php echo $contador-1?>&id2=<?php echo $categoria_id['id_categoria']?>"><?php echo $contador?></a></li>
              <?php else:?>
                <li><a href="/vender?id1=<?php echo $contador-1?>&id2=<?php echo $categoria_id['id_categoria']?>"><?php echo $contador?></a></li>
              <?php endif;?>  
          <?php endfor; ?>
          <?php if ($id1<$catidad_posicion-1):?> 
            <li><a href="/vender?id1=<?php echo $id1+1?>&id2=<?php echo $categoria_id['id_categoria']?>">&raquo;</a></li>
          <?php else: ?>
            <li class="disabled noevent"><a href="/vender?id1=<?php echo $id1?>&id2=<?php echo $categoria_id['id_categoria']?>">&raquo;</a></li>
          <?php endif;?>
        </ul>
      </div>
      <div class="col-xs-4 col-md-6">
        <br>
        <p class="pull-right">Mostrando de <?php echo $cantidad_anterior_por_publicacion ?>  a <?php echo $cantidad_por_publicacion?> de <?php echo $cantidad ?> (<?php echo $catidad_posicion ?> Páginas)<p>
      </div>    
    </div>    
  </div>
  <div class="col-xs-0 col-md-1">
  </div>
</div>
  
<?php $contenido = ob_get_clean() ?>
 
<?php include 'base.php' ?>