<?php

    if (defined("SECURITY_CONSTANT")) {
            
        include_once(DAO_DIR . "/patients/PatientsDAO.php");
        include_once(DAO_DIR . "/patients_historics/Patients_historicsDAO.php");
        include_once(DAO_DIR . "/patients_data/Patients_dataDAO.php");
        include_once(DAO_DIR . "/patients_devices/Patients_devicesDAO.php");
        include_once(DAO_DIR . "/patients_ecfs/Patients_ecfsDAO.php");
        include_once(DAO_DIR . "/patients_medicines/Patients_medicinesDAO.php");
        include_once(DAO_DIR . "/patients_lab_analytics/Patients_lab_analyticsDAO.php");
        include_once(DAO_DIR . "/patients_barthel/Patients_barthelDAO.php");
        include_once(DAO_DIR . "/patients_ecfs/Patients_ecfsDAO.php");
        include_once(DAO_DIR . "/patients_gijon/Patients_gijonDAO.php");
        include_once(DAO_DIR . "/patients_chatbot/Patients_chatbotDAO.php");

        $patientsDAO = new PatientsDAO();
        $patients_historicsDAO = new Patients_historicsDAO();
        $patients_dataDAO = new Patients_dataDAO();
        $patients_devicesDAO = new Patients_devicesDAO();
        $patients_ecfsDAO = new Patients_ecfsDAO();
        $patients_medicinesDAO = new Patients_medicinesDAO();
        $patients_lab_analyticsDAO = new Patients_lab_analyticsDAO();
        $patients_barthelDAO = new Patients_barthelDAO();
        $patients_ecfsDAO = new Patients_ecfsDAO();
        $patients_gijonDAO = new Patients_gijonDAO();
        $patients_chatbotDAO  = new Patients_chatbotDAO();

                        
        // Resto de opciones
        if (isset($_GET["option"])) {
        
            switch ($_GET["option"]) {

                case "list":
                    $patients = $patientsDAO -> getAllregisters();
                    require_once(VIEWS_DIR . "/patients/patients_list.php");
                    break;

                case "query_p1":
                    $patients = $patientsDAO -> getRegister($_GET["id"]);
                    
                    $patients_historics = $patients_historicsDAO -> getRegistersForPatient($_GET["id"]); //Recogemos los valores del úlitmo registro
                    //$patients_historics_all = $patients_historicsDAO ->getAllRegistersForPatient($_GET["id"]); //Recogemos todos los valores.
                    //$patients_devices = $patients_devicesDAO -> getAllregistersForPatient($_GET["id"]);
                    $patients_data = $patients_dataDAO -> getAllregistersForPatient($_GET["id"]);
                    require_once(VIEWS_DIR . "/patients/patient_p1.php");
                    break;
                
                case "query_p2":
                    $patients = $patientsDAO -> getRegister($_GET["id"]);
                    $patients_medicines = $patients_medicinesDAO -> getRegister($_GET["id"]);
                    $patients_lab_analytics = $patients_lab_analyticsDAO -> getAllregistersForPatient($_GET["id"]);
                    require_once(VIEWS_DIR . "/patients/patient_p2.php");
                    break;

                case "query_p3":
                    $patients = $patientsDAO -> getRegister($_GET["id"]);
                    $patients_barthel = $patients_barthelDAO -> getAllregistersForPatient($_GET["id"]);
                    $patients_ecfs = $patients_ecfsDAO -> getAllregistersForPatient($_GET["id"]);
                    $patients_gijon = $patients_gijonDAO -> getAllregistersForPatient($_GET["id"]);
                    $patients_chatbot = $patients_chatbotDAO -> getAllregistersForPatient($_GET["id"]);
                    require_once(VIEWS_DIR . "/patients/patient_p3.php");
                    break;

                case "query":
                    $patients = $patientsDAO -> getRegister($_GET["id"]);
                    $patients_historics = $patients_historicsDAO -> getRegistersForPatient($_GET["id"]);

                    //$patients_devices = $patients_devicesDAO -> getAllregistersForPatient($_GET["id"]);
                    $patients_data = $patients_dataDAO -> getAllregistersForPatient($_GET["id"]);
                    $patients_lab_analytics = $patients_lab_analyticsDAO -> getAllregistersForPatient($_GET["id"]);

                    $patients_barthel = $patients_barthelDAO -> getAllregistersForPatient($_GET["id"]);
                    $patients_ecfs = $patients_ecfsDAO -> getAllregistersForPatient($_GET["id"]);
                    $patients_gijon = $patients_gijonDAO -> getAllregistersForPatient($_GET["id"]);
                    require_once(VIEWS_DIR . "/patients/patient_file.php");
                    break;

                case "modify":
                    // Sobre la tabla pacientes se modificará el registro de la base de datos
                    $reg_patients = new PatientsData();
                    // Sobre la el resto de tablas se añadirá una línea al registro de la base de datos
                    $reg_patients_historics = new Patients_historicsData();
                    //$reg_patients_devices = new Patients_devicesData();
                    //$reg_patients_data = new Patients_dataData();

                    $reg_patients_lab_analytics_U = new Patients_lab_analyticsData();
                    $reg_patients_lab_analytics_C = new Patients_lab_analyticsData();
                    $reg_patients_lab_analytics_S = new Patients_lab_analyticsData();
                    $reg_patients_lab_analytics_P = new Patients_lab_analyticsData();
                    $reg_patients_lab_analytics_H = new Patients_lab_analyticsData();
                    
                    $reg_patients_barthel = new Patients_barthelData();
                    
                    $reg_patients_ecfs = new Patients_ecfsData();
                    
                    $reg_patients_gijon = new Patients_gijonData();
                    
                    $reg_patients -> setId($_POST["id_patient"]);
                    $reg_patients -> setOlderPersonBirth ($_POST["older_person_birth"]);
                    $reg_patients -> setOlderPersonSex ($_POST["older_person_sex"]);
                    $reg_patients -> setInitialWeight ($_POST["initial_weight"]);

                    $reg_patients_historics -> setIdPatient($_POST["id_patient"]);
                    $reg_patients_historics -> setHeight($_POST["height"]);
                    $reg_patients_historics -> setSmokingStatus($_POST["smoking"]);
                    $reg_patients_historics -> setHeartDiseaseType($_POST["heart_disease"]);
                    $reg_patients_historics -> setNonHf($_POST["non_hf"]);
                    
                    $reg_patients_lab_analytics_U -> setIdPatient($_POST["id_patient"]);
                    $reg_patients_lab_analytics_U -> setLabParam ("U");
                    $reg_patients_lab_analytics_U -> setLabvalue ($_POST["urea"]);
                    
                    $reg_patients_lab_analytics_C-> setIdPatient($_POST["id_patient"]);
                    $reg_patients_lab_analytics_C -> setLabParam ("C");
                    $reg_patients_lab_analytics_C -> setLabvalue ($_POST["creatine"]);

                    $reg_patients_lab_analytics_S -> setIdPatient($_POST["id_patient"]);
                    $reg_patients_lab_analytics_S -> setLabParam ("S");
                    $reg_patients_lab_analytics_S -> setLabvalue ($_POST["sodium"]);

                    $reg_patients_lab_analytics_P -> setIdPatient($_POST["id_patient"]);
                    $reg_patients_lab_analytics_P -> setLabParam ("P");
                    $reg_patients_lab_analytics_P -> setLabvalue ($_POST["potassium"]);

                    $reg_patients_lab_analytics_H -> setIdPatient($_POST["id_patient"]);
                    $reg_patients_lab_analytics_H -> setLabParam ("H");
                    $reg_patients_lab_analytics_H -> setLabvalue ($_POST["haemoglobin"]);
                    
                    
                    $reg_patients_barthel -> setIdPatient($_POST["id_patient"]);
                    $reg_patients_barthel -> setScore($_POST["barthel"]);
                    
                    $reg_patients_ecfs -> setIdPatient($_POST["id_patient"]);
                    $reg_patients_ecfs -> setScore($_POST["ecfscbs"]);
                    
                    $reg_patients_gijon -> setIdPatient($_POST["id_patient"]);
                    $reg_patients_gijon -> setScore($_POST["gijon"]);

	                $patientsDAO -> alterReg($reg_patients); // Modificamos última línea
                    //var_dump($reg_patients_historics);
                    $patients_historicsDAO -> addReg($reg_patients_historics); // Añadimos una línea

                    //$patients_devicesDAO -> addReg($reg_patients_devices); // Añadimos una línea
                    //$patients_dataDAO -> addReg($reg_patients_data); // Añadimos una línea

                    $patients_lab_analyticsDAO -> addReg($reg_patients_lab_analytics_U);
                    $patients_lab_analyticsDAO -> addReg($reg_patients_lab_analytics_C);
                    $patients_lab_analyticsDAO -> addReg($reg_patients_lab_analytics_S);
                    $patients_lab_analyticsDAO -> addReg($reg_patients_lab_analytics_P);
                    $patients_lab_analyticsDAO -> addReg($reg_patients_lab_analytics_H);

                    $patients_barthelDAO -> addReg($reg_patients_barthel); // Añadimos una línea
                    $patients_ecfsDAO -> addReg($reg_patients_ecfs); // Añadimos una línea
                    $patients_gijonDAO -> addReg($reg_patients_gijon); // Añadimos una línea
                    
	                $_SESSION["message"] = "Info: paciente '" . $reg_patients -> getIdString() . "' modificado exitosamente.";
                
                    header("Location: index.php?controller=patients&option=query&id=" . $reg_patients -> getId());

                    break;
                
            }
        }else{
            $patients = $patientsDAO -> getAllregisters();
            require_once(VIEWS_DIR . "/patients/patients_list.php");
        }

    }

?>