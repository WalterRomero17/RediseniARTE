<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>RediseñArte</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- stylesheet css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nivo-lightbox.css">
	<link rel="stylesheet" href="css/nivo_themes/default/default.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- google web font css -->
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- navigation -->
    <div class="container">
        <div class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                </button>
                <a href="index.php" class="navbar-brand"><img src="images/logo_wal.png" class="img-responsive"
                        alt="logo"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php?m=diseniadores">DISEÑASORES</a></li>
                    <li><a href="index.php?m=publicaciones">PUBLICACIONES</a></li>

                    <?php 
                    if (isset($_SESSION["nombre"]) ) {
                    ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false"><?php echo $_SESSION["nombre"];?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Compras</a></li>
                            <li><a href="#">Favoritos</a></li>
                            <li><a href="logout.php">Cerrar Sesión</a></li>
                            
                        </ul>
                    </li>

                    <?php 
                    }else {
                    ?>
                    <li><a href="index.php?m=registro">REGISTRARSE</a></li>
                    <li><a href="index.php?m=ingreso">INGRESAR</a></li>
                    <?php }?>

                </ul>
            </div>
        </div>
    </div>

    <?php include ($contenido); ?>

    <!-- footer section -->
    <footer>
        <div class="container">
            <div class="row">

                <div class="col-md-5 col-sm-4">
                    <img src="images/logo_wal.png" class="img-responsive" alt="logo">
                    <p>En Buenos Aires, Argentina</p>
                    <p><i class="fa fa-phone"></i> 011-4455-7722</p>
                    <p><i class="fa fa-envelope-o"></i> info@rediseñarte.com</p>
                </div>

                <div class="col-md-3 col-sm-4">
                    <h3>Siempre en Contacto</h3>
                    <p>Llamamos o envianos un email y te respondemos lo antes posible.</p>

                </div>

                <div class="col-md-4 col-sm-4 newsletter">
                    <h3>Noticias</h3>
                    <p>Recibe novedades sobre nuestras pagina y servicios.</p>
                    <div class="input-group">
                        <form action="#" method="post">
                            <input name="email" type="email" placeholder="ingrese su E-mail" class="form-control"
                                autorequired>
                            <button type="submit" name="submit" class="btn email">Enviar</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    <!-- copyright section -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <p>Copyright © 2019 Walter Gabriel Romero</p>
                </div>
                <div class="col-md-6 col-sm-6">
                    <ul class="social-icons">
                        <li><a href="#" class="fa fa-facebook"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-instagram"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- javascript js -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/nivo-lightbox.min.js"></script>
    
    
</body>

</html>