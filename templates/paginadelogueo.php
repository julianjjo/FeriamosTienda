<?php $title = 'Ingresa' ?>

<?php ob_start() ?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#ingresonovalido").addClass("hidden");
    $("#ingresar").click(function() {
      $.post("/login",$("#formulario").serialize())
      .done(function(datos) 
      {
        if(datos=='ingreso'){
          window.history.go(-1);
        }
        else{
          $("#ingresonovalido").removeClass("hidden");
        }
      });
    })
  });
</script>
<?php $script = ob_get_clean() ?>  

<?php ob_start() ?>
	<style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 400px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
    </style>
<?php $estilo = ob_get_clean() ?>

<?php ob_start() ?>
	<div class="container">
    <form role="form" class="form-signin" id="formulario">
      <h2 class="form-signin-heading">Ingresar a mi cuenta</h2>
      <div class="alert alert-danger hidden" id="ingresonovalido">
          <p>El email o la contraseña no son validas</p>
      </div>
       <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="Email">   
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Contraseña">
      </div>
      <label class="checkbox">
        <input type="checkbox" value="remember-me"> Recordarme
      </label>
      <button type="button" id="ingresar" class="btn btn-large btn-primary">Ingresar</button><br>
      <hr>
      <p class="text-center">Si no tiene cuenta <a href="./loginregistro" class="btn btn-primary">Registrese</a></p>
    </form>
    
  </div>
<?php $contenido = ob_get_clean() ?>
 
<?php include 'base.php' ?>