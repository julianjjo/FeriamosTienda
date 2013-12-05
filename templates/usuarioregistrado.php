<?php $title = 'Usuario Registrado' ?>
 
<?php ob_start() ?>
    <div class="row">
        <div class="col-md-2">.</div>
        <div class="col-md-8">
            <div class="jumbotron">
                <h1>Usuario Registrado<h1>
                <br><br><br><br><br><br><br><br>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>    
<?php $contenido = ob_get_clean() ?>
 
<?php include 'base.php' ?>