<?php
    $conexion = new mysqli("localhost", "root", "", "redisenio");
?>

    <div class = "container mt30">

            <form action="index.php" method="get">
                <input type="hidden" name="m" value = "publicaciones">
                <select name="grupo">
                    <option>Grupo</option>
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
                    <button class="btn btn-primary" type="submit">Buscar</button>
            </form>
                        
            <div class="row">    
            <?php
                if (isset($_GET["grupo"]) && isset($_GET["categoria"])) {
                    $grupo1 = $_GET["grupo"];
                    $categoria1 = $_GET["categoria"];

                    $consulta = "SELECT * FROM publicacion, publicacion_categoria WHERE";
                    $consulta .= " publicacion.publicacion_id = publicacion_categoria.publicacion_id ";
                    $consulta .= "AND publicacion.grupo_id = ".$grupo1." AND ";
                    $consulta .= "publicacion_categoria.categoria_id = ".$categoria1.";";
                        
                    $resultados = $conexion->query($consulta);

                    foreach ($resultados as $resultado ) {
            ?>
                    
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src=<?php echo "files/".$resultado["publicacion_imagen"];?> alt="...">
                                <div class="caption">
                                    <h3><?php echo $resultado["publicacion_titulo"];?></h3>
                                    <p><?php echo $resultado["publicacion_descripcion"];?></p>
                                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-primary" role="button">Button</a></p>
                                </div>
                            </div>
                        </div>
                    
            <?php
                    }
        
                } else {
                        $consulta = "SELECT * FROM publicacion, publicacion_categoria WHERE";
                        $consulta .= " publicacion.publicacion_id = publicacion_categoria.publicacion_id ";
                        $consulta .= "GROUP BY publicacion.publicacion_id;";
                        
                        $resultados = $conexion->query($consulta);

                        foreach ($resultados as $resultado ) {
            ?>
                        
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src=<?php echo "files/".$resultado["publicacion_imagen"];?> alt="...">
                                    <div class="caption">
                                        <h3><?php echo $resultado["publicacion_titulo"];?></h3>
                                        <p class = "text_ajust"><?php echo $resultado["publicacion_descripcion"];?></p>
                                        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-primary" role="button">Button</a></p>
                                    </div>
                                </div>
                            </div>
                        
            <?php
                        }
                    }
            ?>
            </div>    
    </div>

    