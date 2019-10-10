<?php

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$mail = $_POST["email"];
$pass = $_POST["pass"];

$conexion = new mysqli("localhost","root","","redisenio");
$sql = "INSERT INTO usuario(`usuario_nombre`, `usuario_apellido`, `usuario_mail`, `usuario_password`)";
$sql = $sql . "VALUES ('".$nombre."','".$apellido."','".$mail."','".$pass."');";
echo $sql;
$resultado = $conexion->query($sql);

if ($resultado == 1) {
    echo "Ingreso con exito";
}else{
    echo "No ingreso";
}

?>