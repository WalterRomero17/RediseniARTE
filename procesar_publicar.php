<?php
    session_start();

    $titulo = $_POST["titulo"];
    $grupo = $_POST["grupo"];
    $categoria = $_POST["categoria"];
    $descripcion = $_POST["descripcion"];

    $id_usuario = $_SESSION["id"];

    $nombre_img = $_FILES["imagen"]["name"];
    $archivo = $_FILES["imagen"]['tmp_name'];
    $ruta = "files/";
    $ruta .= $nombre_img;
    move_uploaded_file($archivo,$ruta);

    $conexion = new mysqli("localhost", "root", "", "redisenio");

    $insert_publi = "INSERT INTO publicacion( publicacion_titulo, publicacion_imagen, diseniador_id, publicacion_descripcion, grupo_id) VALUES";
    $insert_publi .= "('".$titulo."','".$nombre_img."',".$id_usuario.",'".$descripcion."',".$grupo.");";
    
    $conexion->query($insert_publi);
    
    $select_publi = "SELECT publicacion_id FROM publicacion WHERE publicacion_titulo = '".$titulo."';";
    $resultado_select = $conexion->query($select_publi);
    $fila = $resultado_select->fetch_assoc();

    $insert_cat_publi = "INSERT INTO publicacion_categoria(publicacion_id,categoria_id)";
    $insert_cat_publi .= "VALUES (".$fila['publicacion_id'].",".$categoria.");";

    $conexion->query($insert_cat_publi);

    header("location:index.php?m=publicaciones");
?>    