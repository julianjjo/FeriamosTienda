<?php ob_start() ?>
	<p class="navbar-text">Bienvenido <a href="#" class="navbar-link">Julian Mican</a></p>
    <form class="navbar-form navbar-left" role="form"> 
        <button type="button" onclick="location.href='#'" class="btn btn-primary">Mi Cuenta</button>
        <button type="button" onclick="location.href='/cerrarsesion'" class="btn btn-primary">Cerrar Sesión</button>
    </form> 
<?php $session = ob_get_clean() ?>
