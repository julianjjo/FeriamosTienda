<?php $title = 'Publicar Producto' ?>
 
<?php ob_start() ?>
    <form role="form" action="#" method="post">
        <div class="form-group">
            <label>Seleccione la categoria</label>
            <select class="form-control" name="categoria">
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?php echo $categoria['nombre_categoria'] ?>"><?php echo utf8_encode($categoria['nombre_categoria']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Seleccione el tipo</label>
            <select class="form-control" name="tipo">
                <?php foreach ($tipos as $tipo): ?>
                    <option value="<?php echo $tipo['nombre_tipo'] ?>"><?php echo utf8_encode($tipo['nombre_tipo']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="submit" value="Publicar producto" class="btn btn-primary"/>
    </form>
<?php $contenido = ob_get_clean() ?>
 
<?php include 'base.php' ?>
