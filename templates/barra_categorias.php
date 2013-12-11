<?php ob_start() ?>
  <div class="col-xs-12 col-md-3 well">
    <ul class="nav nav-pills nav-stacked">
      <li>
        <?php foreach ($categorias as $categoria): ?>
        <a href="/vender?id1=0&id2=<?php echo $categoria['id_categoria']?>">
          <?php echo utf8_encode($categoria['nombre_categoria'])?>
        </a>        
        <?php endforeach; ?>
      </li>      
    </ul>    
  </div>  
<?php $barra = ob_get_clean() ?>