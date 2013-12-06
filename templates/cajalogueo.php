<?php ob_start() ?>
    <form class="navbar-form navbar-left" role="form">
        <button type="button" onclick="location.href='/paginalogin'" class="btn btn-primary">Ingresar</button>
        <button type="button" onclick="location.href='/registro'" class="btn btn-primary">Registrese</button>
    </form> 
<?php $session = ob_get_clean() ?>
