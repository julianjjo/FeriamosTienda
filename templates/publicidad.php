<?php ob_start() ?>
<<<<<<< HEAD
	<?php foreach ($publicidad_activa as $publicidad): ?>
=======
	<?php foreach ($publicidades as $publicidad): ?>
>>>>>>> 657047b76b3003a5ca94bc76c27d735b329564f6
      <a href="<?php echo $publicidad["direccion_web"]?>" target="_blank"><img style="border: 0px solid ; width: 200px; height: 150px;" alt="" src="<?php echo $publicidad["ubicacion_imagen_publicitaria"]?>"></a>
      <br><br>
    <?php endforeach;?>
<?php $publicidad = ob_get_clean() ?>