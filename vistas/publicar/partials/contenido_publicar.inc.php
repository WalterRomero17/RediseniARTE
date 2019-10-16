<?php
    $conexion = new mysqli("localhost", "root", "", "redisenio");
?>

<div id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-sm-12">
                <h2>Ingresar publicación</h2>
            </div>
            <div class="col-md-8 col-sm-8 mt30">
                <div class="input-group">
                    <form action="procesar_publicar.php" method="post">
                        <div>
                            <select name="grupo" required>
                                <option>Grupo</option>
                                <?php
                                    $consulta_grupos = "SELECT grupo_id, grupo_descripcion from grupo";
                                    $grupos = $conexion ->query($consulta_grupos);

                                    foreach ($grupos as $grupo) {
                                            echo "<option value=".$grupo['grupo_id'].">".$grupo["grupo_descripcion"]."</option>";
                                        }
                                ?>
                            </select>
                        </div>
                        <div>
                            <select name="categoria" required>
                                <option value="">Categoria</option>
                                <?php
                                    $consulta_categoria = "SELECT categoria_id, categoria_descripcion from categoria";
                                    $categorias = $conexion ->query($consulta_categoria);

                                    foreach ($categorias as $categoria) {
                                        echo "<option value=".$categoria['categoria_id'].">".$categoria["categoria_descripcion"]."</option>";
                                    }
                                ?>              
                            </select>
                        </div>
                        <input name="titulo" type="text" placeholder="Titulo de la publicación" class="form-control" required>
                        <textarea name="descripcion" rows="6" class="form-control" id="message" placeholder ="Descripción de la publicación" required ></textarea>
                        <input  name="imagen" type="file" >
                        <button type="submit" name="submit" class="btn email">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>