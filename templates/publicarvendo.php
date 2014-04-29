<?php $title = 'Publicar Producto Vendemos' ?>
<?php ob_start() ?>
<script type="text/javascript">    
    var limite = 2000;
    $( document ).ready(function() {
        $("#otra_informacion").keyup(function() {
          var longuitud = $(this).val().length;
          var mensaje = "Informacion Adicional (caracteres restantes: "
          longuitud =  limite - longuitud;
          mensaje = mensaje + longuitud +")";
          $("#texto_caracter").text(mensaje);
        });
        $( "#departamento" ).change(function() {
            var id_departamento = $(this).val();
            var ciudades = "<option value=\"\">Seleccione la ciudad</option>";
            $.get( "/departamento", { id: id_departamento} )
                .done(function( data ) {
                ciudades = ciudades+data;                
                $("#ciudad").html(ciudades);
            });
        });        
    });
    function format(input)
    {
      $("#precioerror").addClass( "hidden" );
      var num = input.value.replace(/\./g,'');
      if(!isNaN(num)){
          num = num.toString().split("").reverse().join("").replace(/(?=\d*\.?)(\d{3})/g,'$1.');
          num = num.split("").reverse().join("").replace(/^[\.]/,"");
          input.value = num;
      }
      else{ 
          $("#precioerror").removeClass( "hidden" );
          input.value = input.value.replace(/[^\d\.]*/g,"");
      }
    }
</script>
<?php $script = ob_get_clean() ?>

<?php ob_start() ?>
    <div class="container publicar">      
        <h2 class="text-center">Describa lo que está vendiendo</h2><br>
        <p>Los campos con asterisco (*) son obligatorios</p>
        <div class="well">        
            <form role="form" action="/publicacionvendo" method="post" enctype="multipart/form-data" onsubmit="return validacion_publicar_vendo()" name="form2">                
                <div class="form-group">
                    <label>*Nombre del producto</label>
                    <input type="text" placeholder="Nombre" name="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>*Marca</label>
                    <input type="text" placeholder="Marca" name="marca" class="form-control" required>
                </div>
                <div class="form-group">
                    <div class="alert alert-danger hidden" id="categoriaerror">
                        <p>Seleccione una categoria</p>
                    </div>
                    <label>*Categoría</label>
                    <select class="form-control" name="categoria" id="categoria">
                        <option value="">Elija la categoria</option>
                        <?php foreach ($categorias as $categoria): ?>
                            <option value="<?php echo $categoria['id_categoria'] ?>"><?php echo utf8_encode($categoria['nombre_categoria']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <!--<div class="form-group">
                    <label>Seleccione el sector</label>
                    <select class="form-control" name="sector">
                        <?php foreach ($sectores as $tipo): ?>
                            <option value="<?php echo $tipo['id_tipo'] ?>"><?php echo utf8_encode($tipo['nombre_tipo']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>-->
                <div class="form-group">
                    <label>Modelo</label>
                    <input type="text" placeholder="Modelo" name="modelo" class="form-control">
                </div>
                <div class="form-group">
                    <label>Año de Fabricación</label>
                    <select class="form-control" name="anio_fabricacion">
                        <option value="">Seleccione Año</option>
                        <?php foreach ($anios as $anio): ?>
                            <option value="<?php echo $anio ?>"><?php echo $anio ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>*Estado del producto</label required>
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
                    <textarea class="form-control" maxlength="2000" rows="6" id="otra_informacion" name="otra_informacion"> </textarea>
                </div>
                <div class="form-group">
                    <label>Unidades</label>
                    <input type="number" placeholder="Unidades" name="unidades" class="form-control">
                </div>    
                <div class="form-group">
                    <div class="alert alert-danger hidden" id="precioerror">
                        <p>Solo se permiten numeros</p>
                    </div>
                    <label>*Precio de venta</label>
                    <div class="input-group">
                      <span class="input-group-addon">$</span>                      
                      <input type="text" placeholder="Precio" name="precio" class="form-control" onkeyup="format(this)" onchange="format(this)" required>
                    </div>
                </div>
                <br>
                <h3>Ubicacion del producto</h3><br>
                <div class="form-group">
                    <div class="alert alert-danger hidden" id="departamentoerror">
                        <p>Selecione un departamento</p>
                    </div>
                    <label>*Departamento</label>
                    <select class="form-control" id="departamento" name="departamento">
                        <option value="">Seleccione el departamento</option>
                        <?php foreach ($departamentos as $departamento): ?>
                            <option value="<?php echo $departamento['ID_DEPARTAMENTO'] ?>"><?php echo utf8_encode($departamento['NOMBRE']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="alert alert-danger hidden" id="ciudaderror">
                        <p>Selecione una ciudad</p>
                    </div>
                    <label>*Ciudad</label>
                    <select class="form-control" id="ciudad" name="ciudad">
                        <option value="">Seleccione la ciudad</option>
                    </select>
                </div>
                <h3>Fotografias del producto</h3><br>
                    <div class="alert alert-danger hidden" id="fotoerror">
                        <p>Formato de imagen no compatible</p>
                    </div>
                    <input type="file" name="foto1"><br>
                    <input type="file" name="foto2"><br>
                    <input type="file" name="foto3"><br>                    
                    <small>Las fotografias deben estar en formato jpg, jpeg, gif o png.</small>
                <br>
                <br>                
                <input type="submit" value="Publicar producto" class="btn btn-primary"/><br><br> 
            </form>
        </div>
    </div>  
<?php $contenido = ob_get_clean() ?>
 
<?php include 'base.php' ?>
