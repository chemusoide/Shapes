<?php
	session_start();
	//error_reporting(E_ALL);
	//ini_set('display_errors', 1);
//--------------------------------------------------------------------------
function GuardaLog($txt)
//--------------------------------------------------------------------------
{
/*			
    $FILE_HANDLE = fopen(__dir__.'/log.txt', 'a');
    $line = date("d/m/Y H:i:s - ");
    $line .= $txt;
	$line .= "\n";
    fwrite($FILE_HANDLE, $line);
    fclose($FILE_HANDLE);
*/
}

	GuardaLog('------------ Entrando index');

    // Constante de seguridad. Si alguna vista se intenta cargar fuera del index.php,
    // esta constante no existirá y no mostraremos nada
    define("SECURITY_CONSTANT", "chema");
    
	//control sesion
	
	//session_start();
	
	/*
	if( $_COOKIE['shapes'] )
	{
		session_id( $_COOKIE['shapes'] );
		session_start();
	}
	*/
    
	
	//session_name("shapes");
    //session_start();
    require_once("config.php");

    $allowedControllers = unserialize(ALLOWED_CONTROLLERS);
    
    if ( isset($_SESSION["user_id"]) ) {  
		GuardaLog('session user_id existe');
    
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
		GuardaLog('session user_id NO existe');
        
        // Autenticación...
        if ( isset($_POST["user_name"]) && isset($_POST["user_password"]) ) {

			GuardaLog('llamando a userController');
            require_once(CONTROLLERS_DIR . "/userController.php");
        
        } else {

			GuardaLog('llamando a login');
?>		
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
	
            require_once(VIEWS_DIR . "/login.php");

        }
                	    
    }
