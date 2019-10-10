  <?php

    session_start();

    if (isset($_POST["email"]) && isset($_POST["pass"]) ) {
     
      $conexion = new mysqli("localhost", "root", "", "redisenio");            
      $sql =  "SELECT * FROM usuario WHERE usuario_mail = '" . $_POST["email"] . "' AND usuario_password = '" . $_POST["pass"] ."';";
      
      $resultado = $conexion->query($sql);

      if( $resultado->num_rows == 1){
        $sql =  "SELECT usuario_nombre FROM usuario WHERE usuario_mail = '";
        $sql .=  $_POST["email"] . "' AND usuario_password = '" . $_POST["pass"] ."';";
        
        $resultado = $conexion->query($sql);
        $usuario = $resultado->fetch_assoc();
        $_SESSION["nombre"] = $usuario["usuario_nombre"] ;
       
        header("location: index.php");

      }
      else{
        echo "No ingreso";
      }
    }
  ?>