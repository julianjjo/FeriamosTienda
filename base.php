<!-- templates/base.php -->
<!DOCTYPE html>
<html>
    <head>    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $title ?></title>
    <script type="text/javascript" src="../js/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="../js/validaciones.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <?php echo $estilo ?>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="../css/main.css" media="screen"/>
    </head>
    <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./">Feriamos</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="./">Inicio</a></li>
            <li><a href="#about">Vender</a></li>
            <li><a href="#contact">Comprar</a></li>
            <li><a href="#contact">Condiciones</a></li>
          </ul>                     
          <ul class="nav navbar-nav navbar-right">
            <?php echo $session ?>  
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <?php echo $contenido ?>
    </body>
</html>
