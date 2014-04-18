<?php $title = 'Publique lo que usted nesesita'?>

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
        <h2 class="text-center">Describa lo que esta buscando</h2><br><br>
        <p>Los campos con asterisco (*) son obligatorios</p>
        <div class="well">        
            <form role="form" action="/publicarbusco" method="post" onsubmit="return validacion_compro()">
                <div class="form-group">
                    <label>*Nombre</label>
                    <input type="text" placeholder="Nombre" name="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Marca</label>
                    <input type="text" placeholder="Marca" name="marca" class="form-control">
                </div>
                <div class="form-group">
                    <div class="alert alert-danger hidden" id="categoriaerror">
                        <p>Seleccione una categoria</p>
                    </div>
                    <label>*Categoria</label>
                    <select class="form-control" name="categoria">
                        <option value="">Elija la categoria</option>
                        <?php foreach ($categorias as $categoria): ?>
                            <option value="<?php echo $categoria['id_categoria'] ?>"><?php echo utf8_encode($categoria['nombre_categoria']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>*Estado del producto</label>
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
                    <div class="alert alert-danger hidden" id="precioerror">
                        <p>Solo se permiten numeros</p>
                    </div>
                    <label>*Presupuesto</label>
                    <div class="input-group">
                        <span class="input-group-addon">$</span> 
                        <input type="text" placeholder="Presupuesto" name="precio" class="form-control" class="form-control" onkeyup="format(this)" onchange="format(this)" required>
                    </div>                    
                </div>
                <div class="form-group">                    
                    <label id="texto_caracter">Informacion Adicional (caracteres restantes: 2000)</label>
                    <textarea class="form-control" maxlength="2000" rows="6" id="otra_informacion" name="otra_informacion"> </textarea>
                </div>
                <br>       
                <input type="submit" value="Publicar producto" class="btn btn-primary"/><br><br> 
            </form>
        </div>
    </div>
<?php $contenido = ob_get_clean() ?>
 
<?php include 'base.php' ?>
