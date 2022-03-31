<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv=”X-UA-Compatible” content=”IE=Edge,chrome=1″>
    <meta name="viewport" content="initial-scale=1">
    <title>shapes</title>
</head>

<body>
<?php
    // Constante de seguridad. Si alguna vista se intenta cargar fuera del index.php,
    // esta constante no existirá y no mostraremos nada
    define("SECURITY_CONSTANT", "chema");
    
    session_name("shapes");
    session_start();
    require_once("config.php");

    $allowedControllers = unserialize(ALLOWED_CONTROLLERS);
    
    if ( isset($_SESSION["user_id"]) ) {  
    
        if ( isset($_GET["controller"]) && $_GET["controller"] != "" ) {
        
            if ( in_array($_GET["controller"], $allowedControllers, true) ) {
    
                require_once(CONTROLLERS_DIR . "/" . $_GET["controller"] . "Controller.php");
    
            } else {

                echo "<p>Controller not allowed " . urlencode( $_GET["controller"] ) . "</p>";
    
            }
                
        } else {
    
            header("Location: index.php?controller=chatbot&option=panel");
    
        }
        
    } else {
        
        // Autenticación...
        if ( isset($_POST["user_name"]) && isset($_POST["user_password"]) ) {

            require_once(CONTROLLERS_DIR . "/userController.php");
        
        } else {

            require_once(VIEWS_DIR . "/login.php");

        }
                	    
    }
?>