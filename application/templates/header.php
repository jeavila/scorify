<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $titulo;?></title>
    <link rel="stylesheet" type="text/css" href="public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/estilo.css">
</head>
<body>
<div class="container">
  <!-- Static navbar -->
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Scorify</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Operaciones <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Clases</a></li>
              <li><a href="#">Alumnos</a></li>
              <li><a href="#">Calificaciones</a></li>
            </ul>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
  </nav>
  <!-- End NavBar -->

  <div>
    <?php echo $message; ?>
  </div>
