<?php

    $modulo = "index";
    
    if( isset($_GET["m"])){

        switch ( $_GET["m"] ) {

            case "home":
                $modulo = "index";
                break;
            
            case "ingreso":
                $modulo = "ingreso";
                break;

            case "logout":
                $modulo = "logout";
                break;

            case "registro":
                $modulo = "registro";
                break;

            case "diseniadores":
                $modulo = "diseniadores";
                break;
        }
    }

    include "vistas/" . $modulo . "/index.php" 

?> 