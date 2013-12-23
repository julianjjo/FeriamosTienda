<!-- templates/base.php -->
<!DOCTYPE html>
<html>
    <head>    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $title ?></title>
    <script type="text/javascript" src="../js/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="../js/validaciones.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script src="js/jquery.desoslide.min.js"></script>
    <script src="/js/galeria.js"></script>
    <?php echo $estilo ?>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="../css/main.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="css/jquery.desoslide.css" />
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
            <li><a href="./">Inicio</a></li>
            <li><a href="./vender">Vendo</a></li>
            <li><a href="./busco">Busco</a></li>
            <li><a href="#contact">Tarifas</a></li>
            <li><a href="#contact">Condiciones</a></li>
          </ul>                     
          <ul class="nav navbar-nav navbar-right">
            <?php echo $session ?>  
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <div class="row">
      <br>
      <div class="col-md-1">
        <br><br><br>
      </div>
      <div class="col-xs-6 col-md-5">
        <blockquote>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
          <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
        </blockquote>
      </div>
      <div class="col-xs-6 col-md-5">
        <form class="form-inline pull-right" role="form" action="./buscar" metodo="GET">
          <div class="form-group">
            <label class="sr-only" for="buscar">Buscar</label>
            <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Buscar">
          </div>
          <button type="submit" class="btn btn-default">Buscar</button>
        </form>
      </div>        
      <div class="col-md-1">
      </div>
    </div>
    <?php echo $contenido ?>
    </body>
</html>
