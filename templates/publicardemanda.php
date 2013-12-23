<?php $title = 'Publique lo que usted nesesita'?>


<?php ob_start() ?>
    <div class="container publicar">      
        <h1 class="text-center">Publique lo que usted nesesita</h1><br>
        <div class="well">        
            <form role="form" action="/publicardemanda" method="post">
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
                    <label>Unidades que Nesesita</label>
                    <input type="number" placeholder="Unidades" name="unidades" class="form-control">
                </div>    
                <div class="form-group">
                    <label>Presupuesto</label>
                    <input type="text" placeholder="Presupuesto" name="precio" class="form-control">
                </div>
                <div class="form-group">
                    <label>Informacion Adicional</label>
                    <textarea class="form-control" rows="4" name="otra_informacion"> </textarea>
                </div>
                <br>       
                <input type="submit" value="Publicar producto" class="btn btn-primary"/><br><br> 
            </form>
        </div>
    </div>
<?php $contenido = ob_get_clean() ?>
 
<?php include 'base.php' ?>
