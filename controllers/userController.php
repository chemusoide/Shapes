<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);


	GuardaLog('------------ Entrando userController');

    if (defined("SECURITY_CONSTANT")) {
		
		GuardaLog('SECURITY_CONSTANT ok');
        
        include_once(DAO_DIR . "/user/UserDAO.php");

    	$userDAO = new UserDAO();
		    	
        // Resto de opciones
    	if (isset($_GET["option"])) {
    	
	        switch ($_GET["option"]) {
	
	            case "list":
	                $users = $userDAO -> getAllRegisters();
	                require_once(VIEWS_DIR . "/users/user_list.php");
	                break;
	                
	            case "query":
	            	
	            	$user = $userDAO->getRegister($_GET["id"]);
	                require_once(VIEWS_DIR . "/users/user_file.php");
	                break;
	                
	            case "precreation":
	                
	            	require_once(VIEWS_DIR . "/users/user_file.php");
	                break;
	                
                case "creation":
                	
	                $register = new UserData();
	                
	                if ( isset($_POST["user_name"]) && strlen($_POST["user_name"]) > 1 ) {
	                    	                    
	                    $register->setUserName($_POST["user_name"]);
	                    
	                } else {
	                    	                    
	                    $_SESSION["message"] = "Error: user name not specified.";
	                    break;
	                    
	                }
	                	                
	                if ( ($_POST["user_password"] == $_POST["user_password_confirm"]) && (strlen($_POST["user_password"]) >= 6) ) {
	                    
                        $register->setUserPassword($_POST["user_password"]);
                    
                    } else {
                        
                        $_SESSION["message"] = "Error: no password specified, does not match the confirmation or password too short.";
                        break;
                        
                    }
					//TODO: Comprobamos que no está el usuario ya creado y deshabilitado
	                
	                $userDAO -> createRegister($register);


	                $_SESSION["message"] = "Info: user '" . $register->getUserName() . "' successfully created.";
	                header("Location: index.php?controller=user&opcion=list");
	            	break;
	                
	            case "modification":
	                $register = new UserData();
	                $register->setUserId($_POST["user_id"]);
	                $register->setUserName($_POST["user_name"]);

					//TODO: Comprobar que el usuairo no esté creado y deshabilitado 
	                
	                $userDAO->modifyRegister($register);
	                $_SESSION["message"] = "Info: user '" . $register->getUserName() . "' successfully modified.";
	                header("Location: index.php?controller=user&opcion=list");
	            	break;
	                
	            case "delete":
	                
	                $register = new UserData();
	                $register = $userDAO->getRegister($_POST["user_id"]);
	            	$userDAO->deleteRegister($_POST["user_id"]);
	            	$_SESSION["message"] = "Info: user '" . $register->getUserName() . "' successfully deleted.";
	            	header("Location: index.php?controller=user&opcion=list");
	            	break;
	            	
	            case "changePassword":
	                
	                $register = new UserData();
	                $register = $userDAO->getRegister($_POST["user_id"]);
	                	                    
                    if ( ($_POST["user_password"] == $_POST["user_password_confirm"]) && (strlen($_POST["user_password"]) >= 6) ) {
                        
                        $register->setUserPassword($_POST["user_password"]);
                    
                    } else {
                        
                        $_SESSION["message"] = "Error: no password specified, does not match the confirmation or password too short.";
                        break;
                        
                    }
	                    	                
	                $userDAO->modifyRegister($register);
	                $_SESSION["message"] = "Info: password of user '" . $register->getUserName() . "' successfully changed.";
	                header("Location: index.php?controller=user&opcion=list");
	                break;
	            	
	            case "login":
					GuardaLog('entrando case login');
        	        // Autenticación...
                    if ( isset($_POST["user_name"]) && isset($_POST["user_password"]) ) {

						if ($_POST) {

							$url = 'https://kubernetes.pasiphae.eu/shapes/asapa/auth/login';
						
							$datos = array();
							$user_name = $datos['email'] = $_POST['user_name'];
							$datos['password'] = $_POST['user_password'];
						
							$datos = json_encode($datos);
						
							GuardaLog('llamando a curl');
							try {
								$ch = curl_init($url);
								curl_setopt($ch, CURLOPT_POSTFIELDS, $datos);
								curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','X-Shapes-Key: 7Msbb3w^SjVG%j'));
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
								$result = curl_exec($ch);
								curl_close($ch);

								$data = json_decode($result);
								GuardaLog('data=');
								GuardaLog($result);
						
							}
							catch (Exception $e) {
								echo 'Excepción capturada: ',  $e->getMessage(), "\n";
							}
						
						} // if ($_POST) {

                	    if ( $data -> code == 200 ) {
							            	                        	            	        
							GuardaLog('guardando datos de sesion');
                	        $_SESSION["user_id"] = 1;
                	        $_SESSION["user_name"] = $user_name;
							GuardaLog('volvemos al index');
							//header("Location: index.php");
							header("Location: index.php");
							exit();
							GuardaLog('se supone que ya hemos vuelto al index');
               	        
                	    } else {
      	        
                	        $_SESSION["message"] = "Error: wrong username or password.";
                	        require_once(VIEWS_DIR . "/login.php");
                	        
                	    }
                	    
                    } else {
                                        	        
            	        $_SESSION["message"] = "Error: unspecified username or password.";
            	        require_once(VIEWS_DIR . "/login.php");
            	                    	        
            	    }
                    
                    break;
                    
	            case "logout":
	                
	                session_destroy();
	                header("Location: index.php");
	                break;
	            	
                default:
	                $users = $userDAO->getAllRegisters();
	                require_once(VIEWS_DIR . "/users/user_list.php");
	
	        }
	        
    	} else {
    		
    		$users = $userDAO->getAllRegisters();
            require_once(VIEWS_DIR . "/users/user_list.php");
    		
    	}

    }

?>