<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- stylesheet css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nivo-lightbox.css">
	<link rel="stylesheet" href="css/nivo_themes/default/default.css">
	<link rel="stylesheet" href="css/templatemo-style.css">
	<!-- google web font css -->
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
    <?php
        $conexion = new mysqli("localhost", "root", "", "redisenio");
    ?>
    <div class = "container">
        <div class = "row">
            <div class = "col">
                <form action="publicaciones.php" method="post">
                    <select name="grupo">
                        <option value="">Grupo</option>
                        <?php
                            $consulta_grupos = "SELECT grupo_id, grupo_descripcion from grupo";
                            $grupos = $conexion ->query($consulta_grupos);

                            foreach ($grupos as $grupo) {
                                echo "<option value=".$grupo['grupo_id'].">".$grupo["grupo_descripcion"]."</option>";
                            }
                        ?>
                    </select>
                    <select name="categoria">
                        <option value="">Categoria</option>
                        <?php
                            $consulta_categoria = "SELECT categoria_id, categoria_descripcion from categoria";
                            $categorias = $conexion ->query($consulta_categoria);

                            foreach ($categorias as $categoria) {
                                echo "<option value=".$categoria['categoria_id'].">".$categoria["categoria_descripcion"]."</option>";
                            }
                        ?>
                            
                    </select>
                    <button type="submit">Buscar</button>
                </form>
                
            </div>
        </div>
        <?php
            if (isset($_POST["grupo"]) && isset($_POST["categoria"])) {
                $grupo1 = $_POST["grupo"];
                $categoria1 = $_POST["categoria"];

                $consulta = "SELECT publicacion_titulo FROM publicacion, publicacion_categoria WHERE";
                $consulta .= " publicacion.publicacion_id = publicacion_categoria.publicacion_id ";
                $consulta .= "AND publicacion.grupo_id = ".$grupo1." AND ";
                $consulta .= "publicacion_categoria.categoria_id = ".$categoria1.";";
                
                $resultados = $conexion->query($consulta);

                foreach ($resultados as $resultado ) {
                    echo "<p>".$resultado["publicacion_titulo"]."</p>";
                }
            } else {
                $consulta = "SELECT publicacion_titulo FROM publicacion, publicacion_categoria WHERE";
                $consulta .= " publicacion.publicacion_id = publicacion_categoria.publicacion_id ";
                $consulta .= "GROUP BY publicacion.publicacion_id;";
                
                $resultados = $conexion->query($consulta);

                foreach ($resultados as $resultado ) {
                    echo "<p>".$resultado["publicacion_titulo"]."</p>";
                }
            }
            
        ?>
    </div>
    <!-- javascript js -->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/nivo-lightbox.min.js"></script>
	<script src="js/custom.js"></script>

</body>
</html>