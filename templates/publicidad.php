<?php ob_start() ?>
	<?php foreach ($publicidad_activa as $publicidad): ?>
      <a href="<?php echo $publicidad["direccion_web"]?>" target="_blank"><img style="border: 0px solid ; width: 200px; height: 150px;" src="<?php echo $publicidad["ubicacion_imagen_publicitaria"]?>"></a>
      <br><br>
    <?php endforeach;?>
<?php $publicidad = ob_get_clean() ?>