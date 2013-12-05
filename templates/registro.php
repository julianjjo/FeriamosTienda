<?php $title = 'Registro Usuario' ?>
 
<?php ob_start() ?>
    <div class="container">
      <div class="well">
        <p class="text-warning">Lo campos marcados con asterisco * son obligatorios</p>
        <form role="form" action="/registro" method="POST" onsubmit="return validacion_registro()" name="form1">
          <div class="form-group">
            <label for="email" >*Direccion de Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Ingrese su Email" name="email" required>
          </div>
          <div class="form-group">
            <div id="errorcontra" class="alert alert-danger hidden">
                <p>La contraseña debe tener entre mínimo 8 caracteres, por lo menos un digito y un alfanumérico, y no puede contener caracteres espaciales</p>
            </div>
            <label for="contraseña">*Contraseña:</label>
            <input type="password" class="form-control" id="contraseña" placeholder="Contraseña" name="password" required>
          </div>
          <div class="form-group">
            <div id="errorrepetircontra" class="alert alert-danger hidden">
                <p>La contraseñas no son iguales</p>
            </div>         
            <label for="repetircontraseña">*Repetir Contraseña:</label>
            <input type="password" class="form-control" id="repetircontraseña" placeholder="Repitir Contraseña" name="repetirpassword" required>
          </div>
          <div class="form-group">
            <label for="Nombre">*Nombre:</label>
            <input type="input" class="form-control" id="nombre" placeholder="Nombre" name="nombre" required>
          </div>
          <div class="form-group">
              <label for="apeliidos">*Apellidos:</label>
              <input type="input" class="form-control" id="apeliido" placeholder="Apellidos" name="apellidos" required>
          </div>
          <div class="form-group">
              <div id="errortelefono" class="alert alert-danger hidden">
                  <p>El telefono solo debe tener numeros</p>
              </div>
              <label for="telefono">*Telefono:</label>
              <input type="tel" class="form-control" id="telefono" placeholder="Telefono" name="telefono" required>
          </div>
          <div class="form-group">
              <label for="direccion">*Dirección:</label>
              <input type="input" class="form-control" id="direccion" placeholder="Dirección" name="direccion" required>
          </div>
          <button type="submit" class="btn btn-success">Registrar</button>
        </form>
      </div>
    </div>
<?php $contenido = ob_get_clean() ?>
 
<?php include 'base.php' ?>