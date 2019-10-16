<?php
    session_start();

    $titulo = $_POST["titulo"];
    $grupo = $_POST["grupo"];
    $categoria = $_POST["categoria"];
    $descripcion = $_POST["descripcion"];

    $id_usuario = $_SESSION["id"];

    $nombre_img = $_FILES["imagen"]["name"];
    $archivo = $_FILES['tmp_name'];
    $ruta = "files/";
    $ruta .= $nombre_img;
    move_uploaded_file($archivo,$ruta);

    $conexion = new mysqli("localhost", "root", "", "redisenio");

    $insert_publi = "INSERT INTO publicacion( publicacion_titulo, publicacion_imagen, diseniador_id, publicacion_descripcion, grupo_id) VALUES";
    $inser_publi .= "('".$titulo."','".$nombre_img."',".$id_usuario." ,'".$descripcion."',".$grupo.");";
    echo $insert_publi;
    
    $insert_cat_publi = "";
    
?>    