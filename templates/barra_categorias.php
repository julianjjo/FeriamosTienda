<?php ob_start() ?>
  <div class="col-xs-12 col-md-3 well" role="complementary">
        <?php foreach ($categorias as $categoria): ?>
        <a href="/vender?id1=0&id2=<?php echo $categoria['id_categoria']?>">
          <?php echo utf8_encode($categoria['nombre_categoria'])?>
        </a><br>    
        <?php endforeach; ?> 
  </div>  
<?php $barra = ob_get_clean() ?>