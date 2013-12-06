<?php $title = 'Publicar Producto Vendemos' ?>
 
<?php ob_start() ?>
<style type="text/css">
    .publicar{
        max-width: 200;
    }
</style>
<?php $estilo = ob_get_clean() ?>

<?php ob_start() ?>
    <div class="container publicar">
        <div class="well">
            <h1>Publique lo que desea vender</h1><br><br>           
            <form role="form" action="/publicacionvendo" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nombre del Producto</label>
                    <input type="text" placeholder="Nombre" name="nombre" class="form-control">
                </div>
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
                <div class="form-group">
                    <label>Precio del Producto</label>
                    <input type="text" placeholder="Precio" name="precio" class="form-control">
                </div>
                <div class="form-group">
                    <label>Unidades del producto</label>
                    <input type="number" placeholder="Unidades" name="unidades" class="form-control">
                </div>
                <div class="form-group">
                    <label>Descripción</label>
                    <textarea class="form-control" rows="4" name="descripcion"> </textarea>
                </div>
                <div class="form-group">
                    <label>Fecha de Fabricación</label>
                    <input type="date" name="fecha" class="form-control">
                </div>
                <div class="form-group">
                    <label>Modelo del Producto</label>
                    <input type="text" placeholder="Modelo" name="modelo" class="form-control">
                </div>
                <div class="form-group">
                    <label>Departamento</label>
                    <select class="form-control" name="departamento">
                        <?php foreach ($departamentos as $departamento): ?>
                            <option value="<?php echo $departamento['nombre_departamento'] ?>"><?php echo utf8_encode($nombre_departamento['nombre_departamento']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ciudad</label>
                    <select class="form-control" name="ciudad">
                        <?php foreach ($ciudades as $ciudad): ?>
                            <option value="<?php echo $ciudad['nombre_ciudad'] ?>"><?php echo utf8_encode($ciudad['nombre_ciudad']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Dirrección</label>
                    <input type="text" placeholder="Dirrección" name="dirreccion" class="form-control">
                </div>
                <div class="form-group">
                    <label>Otra informacion</label>
                    <textarea class="form-control" rows="4" name="otra_informacion"> </textarea>
                </div>
                <div class="form-group">
                    <label>Estado del producto</label>
                    <select class="form-control" name="categoria">
                            <option value="excelente">Excelente</option>
                            <option value="bueno">Bueno</option>
                            <option value="regular">Regular</option>
                            <option value="malo">Malo</option>
                    </select>
                </div>                
                <div class="form-group">
                    <label>Años de uso</label>
                    <input type="number" placeholder="Años de uso" name="uso" class="form-control">
                </div><br>
                <h3>Fotografias del producto</h3><br>
                    <input type="file" name="foto1"><br>
                    <input type="file" name="foto2"><br>
                    <input type="file" name="foto3"><br>
                <br>                
                <input type="submit" value="Publicar producto" class="btn btn-primary"/><br><br> 
            </form>
        </div>
    </div>
<?php $contenido = ob_get_clean() ?>
 
<?php include 'base.php' ?>
