<p>Los campos con asterisco (*) son obligatorios</p>
<div class="well">        
    <form role="form" name="form2" id="modificarvendo">                
        <div class="form-group">
            <label>Nombre del producto</label>
            <input type="text" placeholder="Nombre" name="nombre" class="form-control" value="<?php echo utf8_encode($publicacion['nombre_producto'])?>">
        </div>
        <div class="form-group">
            <label>Marca</label>
            <input type="text" placeholder="Marca" name="marca" class="form-control" value="<?php echo utf8_encode($publicacion['marca'])?>">
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
            <label>Modelo</label>
            <input type="text" placeholder="Modelo" name="modelo" class="form-control" value="<?php echo utf8_encode($publicacion['modelo_producto'])?>">
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
            <label id="texto_caracter">Informacion Adicional (caracteres restantes: 2000)</label>
            <textarea class="form-control" maxlength="2000" rows="6" id="otra_informacion" name="otra_informacion"><?php echo $publicacion['otra_informacion_producto']?></textarea>
        </div>
        <div class="form-group">
            <label>Unidades</label>
            <input type="number" placeholder="Unidades" name="unidades" class="form-control" value="<?php echo $publicacion['unidades_producto']?>">
        </div>    
        <div class="form-group">
            <label>Precio de venta</label>
            <div class="input-group">
              <span class="input-group-addon">$</span>                      
              <input type="text" placeholder="Precio" name="precio" class="form-control" value="<?php echo $publicacion['precio_producto']?>">
            </div>
        </div>
        <br>
        <h3>Ubicacion del producto</h3><br>
        <div class="form-group">
            <div class="alert alert-danger hidden" id="departamentoserror">
                <p>Selecione un departamento</p>
            </div>
            <label>Departamento</label>
            <select class="form-control" id="departamento" name="departamento" onchange="get_ciudades(this)">
                <option value="">Seleccione el departamento</option>
                <?php foreach ($departamentos as $departamento): ?>
                    <option value="<?php echo $departamento['ID_DEPARTAMENTO'] ?>"><?php echo utf8_encode($departamento['NOMBRE']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <div class="alert alert-danger hidden" id="ciudadeserror">
                <p>Selecione una ciudad</p>
            </div>
            <label>Ciudad</label>
            <select class="form-control" id="ciudad" name="ciudad">
                <option value="">Seleccione la ciudad</option>
            </select>
        </div>
        <div class="form-group">
            <label>Dirección</label>
            <input type="text" placeholder="Dirrección" name="dirreccion" class="form-control" value="<?php echo utf8_encode($publicacion['direccion_producto'])?>">
        </div>
    </form>
</div>
