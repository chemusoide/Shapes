<?php

    if (defined("SECURITY_CONSTANT")) {
        
        include_once(DAO_DIR . "/patients_chatbot/Patients_chatbotDAO.php");
		include_once(DAO_DIR . "/patients/PatientsDAO.php");
		include_once(DAO_DIR . "/patients_devices/Patients_devicesDAO.php");
		include_once(DAO_DIR . "/patients_data/Patients_dataDAO.php");

    	$chatbotDAO = new Patients_chatbotDAO();
		$patientsDAO = new PatientsDAO();
		$patients_devicesDAO = new Patients_devicesDAO();
		$patients_dataDAO = new Patients_dataDAO();

		    	
        // Resto de opciones
    	if (isset($_GET["option"])) {
    	
	        switch ($_GET["option"]) {
	
	            case "panel":
					
	                $alarm_1_1 = $patientsDAO -> getAlarm_1_1();
					$alarm_1_2 = $patientsDAO -> getAlarm_1_2();
					$alarm_1_3 = $patientsDAO -> getAlarm_1_3();

					$alarm_2_1 = $patientsDAO -> getAlarm_2_1();
					$alarm_2_2 = $patientsDAO -> getAlarm_2_2();
					$alarm_2_3 = $patientsDAO -> getAlarm_2_3();
					$alarm_2_4 = $patientsDAO -> getAlarm_2_4();

					$alarm_3_1 = $patientsDAO -> getAlarm_3_1();

					$alarm_4_1 = $patientsDAO -> getAlarm_4_1();
					$alarm_4_2 = $patientsDAO -> getAlarm_4_2();
					$alarm_4_3 = $patientsDAO -> getAlarm_4_3();
					$alarm_4_4 = $patientsDAO -> getAlarm_4_4();

					$alarm_5_1 = $patientsDAO -> getAlarm_5_1();
					$alarm_5_2 = $patientsDAO -> getAlarm_5_2();
					$alarm_5_3 = $patientsDAO -> getAlarm_5_3();

					$alarm_edema = $patientsDAO -> getAlarm_edema();

					$patients_data = $patients_dataDAO -> getAllWeightRegister();
					$all_patients = $patientsDAO -> getAllregisters();

	                require_once(VIEWS_DIR . "/chatbot/chatbot_panel.php");
	                break;
	                
	           default:
			   		$alarm1 = $patientsDAO -> getAlarm_1_1();
                    require_once(VIEWS_DIR . "/chatbot/chatbot_panel.php");
                    break;
                    
            } // End Switch
	        
    	} else {
    		
    		$alarm1 = $patientsDAO -> getAlarm_1_1();
            require_once(VIEWS_DIR . "/chatbot/chatbot_panel.php");
    		
    	} // End if

    } // End if

?>