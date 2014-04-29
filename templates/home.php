<?php require 'templates/publicidad.php';?>
<?php $title = 'Feriamos.com' ?>
 
<?php ob_start() ?>
<div class="row">
  <div class="col-xs-0 col-md-1">
  </div>  
  <div class="col-xs-12 col-md-8">
  	<div class="row">
  		<div class="col-xs-12 col-md-6">
		  	<div class="panel panel-default">
				<div class="panel-heading">
			    	<h3 class="panel-title">Vendo</h3>
			  	</div>
			    <div class="panel-body">
				    <?php foreach ($categorias_vendo as $categoria): ?>
			        <a href="/vender?id1=0&id2=<?php echo $categoria['id_categoria']?>">
			          <?php echo utf8_encode($categoria['nombre_categoria'])?>
			        </a><br>    
			        <?php endforeach; ?> 
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
			    	<h3 class="panel-title">Compro</h3>
			  	</div>
			    <div class="panel-body">
				    <?php foreach ($categorias_compro as $categoria): ?>
			        <a href="/vender?id1=0&id2=<?php echo $categoria['id_categoria']?>">
			          <?php echo utf8_encode($categoria['nombre_categoria'])?>
			        </a><br>    
			        <?php endforeach; ?> 
				</div>
			</div>
		</div>		  	
	</div>
  </div>
  <div class="col-xs-0 col-md-3">
     <?php echo $publicidad?>
  </div>
</div>
<?php $contenido = ob_get_clean() ?>
 
<?php include 'base.php' ?>