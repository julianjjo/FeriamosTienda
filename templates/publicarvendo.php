<?php $title = 'Publicar Producto Vendemos' ?>


<?php ob_start() ?>
    <div class="container publicar">      
        <h1 class="text-center">Publique lo que desea vender</h1><br>
        <div class="well">        
            <form role="form" action="/publicacionvendo" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" placeholder="Nombre" name="nombre" class="form-control">
                </div>
                <div class="form-group">
                    <label>Marca</label>
                    <input type="text" placeholder="Marca" name="marca" class="form-control">
                </div>
                <div class="form-group">
                    <label>Seleccione la categoria</label>
                    <select class="form-control" name="categoria">
                        <?php foreach ($categorias as $categoria): ?>
                            <option value="<?php echo $categoria['id_categoria'] ?>"><?php echo utf8_encode($categoria['nombre_categoria']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Seleccione el sector</label>
                    <select class="form-control" name="sector">
                        <?php foreach ($sectores as $tipo): ?>
                            <option value="<?php echo $tipo['id_tipo'] ?>"><?php echo utf8_encode($tipo['nombre_tipo']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Modelo</label>
                    <input type="text" placeholder="Modelo" name="modelo" class="form-control">
                </div>
                <div class="form-group">
                    <label>Año de Fabricación</label>
                    <select class="form-control" name="anio_fabricacion">
                        <?php foreach ($anios as $anio): ?>
                            <option value="<?php echo $anio ?>"><?php echo $anio ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Estado del producto</label>
                    <select class="form-control" name="estado">
                            <option value="Nuevo">Nuevo</option>
                            <option value="Excelente">Excelente</option>
                            <option value="Bueno">Bueno</option>
                            <option value="Regular">Regular</option>
                            <option value="Malo">Malo</option>
                    </select>
                </div>  
                <div class="form-group">
                    <label>Informacion Adicional</label>
                    <textarea class="form-control" rows="4" name="otra_informacion"> </textarea>
                </div>
                <div class="form-group">
                    <label>Unidades</label>
                    <input type="number" placeholder="Unidades" name="unidades" class="form-control">
                </div>    
                <div class="form-group">
                    <label>Precio de venta</label>
                    <input type="text" placeholder="Precio" name="precio" class="form-control">
                </div>
                <br>
                <h3>Ubicacion del producto</h3><br>
                <div class="form-group">
                    <label>Departamento</label>
                    <select class="form-control" name="departamento">
                        <option value="cundinamarca">Cundinamarca</option>
                        <?php foreach ($departamentos as $departamento): ?>
                            <option value="<?php echo $departamento['nombre_departamento'] ?>"><?php echo utf8_encode($nombre_departamento['nombre_departamento']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ciudad</label>
                    <select class="form-control" name="ciudad">
                        <option value="fusagasuga">Fusagasuga</option>
                        <?php foreach ($ciudades as $ciudad): ?>
                            <option value="<?php echo $ciudad['nombre_ciudad'] ?>"><?php echo utf8_encode($ciudad['nombre_ciudad']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Dirrección</label>
                    <input type="text" placeholder="Dirrección" name="dirreccion" class="form-control">
                </div><br>
                <h3>Fotografias del producto</h3><br>
                    <input type="file" name="foto1"><br>
                    <input type="file" name="foto2"><br>
                    <input type="file" name="foto3"><br>                    
                    <small>Las fotografias deben estar en formato jpg, jpeg o png.</small>
                <br>
                <br>                
                <input type="submit" value="Publicar producto" class="btn btn-primary"/><br><br> 
            </form>
        </div>
    </div>
<?php $contenido = ob_get_clean() ?>
 
<?php include 'base.php' ?>
