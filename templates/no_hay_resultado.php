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
    <h1 class="text-center">No encuentran resultados de la busqueda</h1><br>
    <p class="text-center">Si no encuentra el producto <a href="./publicarbusco" class="btn btn-primary" role="button">publique lo que usted nesesita</a></p>
  </div>
  <div class="col-xs-0 col-md-1">
  </div>
</div>
<?php $contenido = ob_get_clean() ?>
 
<?php include 'base.php' ?>