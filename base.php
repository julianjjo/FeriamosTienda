<!-- Plantilla base -->
<!DOCTYPE html>
<html>
    <head>    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $title ?></title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="../js/validaciones.js"></script>
    <script type="text/javascript" src="../js/funciones.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.1.0/prototype.js"></script>-->
    <script src="js/jquery.desoslide.min.js"></script>
    <script src="/js/galeria.js"></script>
    <?php if(isset($script)){echo $script;}?>
    <?php if(isset($estilo)){echo $estilo;}?>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="../css/main.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="css/jquery.desoslide.css" />
    </head>
    <body>
    <header>
      <div class="container">
        <div class="row">
          <br>
          <div class="col-md-1">
            <br><br><br>
          </div>
          <div class="col-xs-6 col-md-5">
            <blockquote>
              <p>Sabemos quien tiene lo que usted busca y quien busca lo que usted tiene.</p>
            </blockquote>
          </div>
          <div class="col-xs-6 col-md-5">
            <form class="form-inline pull-right" role="form" action="./buscar" metodo="GET">
              <div class="form-group">
                <label class="sr-only" for="buscar">Buscar</label>
                <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Buscar">
              </div>
              <button type="submit" class="btn btn-default" disabled="disabled">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </form>
          </div>        
          <div class="col-md-1">
          </div>
        </div>
      </div>        
    </header>    
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
            <li><a href="./busco">Compro</a></li>
            <!--<li><a href="#contact">Tarifas</a></li>-->
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
