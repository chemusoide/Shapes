<?php 
    /**********
    / * BLOQUE Para seleccionar el último peso
    ***********/                       
    $num_patients_devices = count($patients_devices);

    // Recorremos el listado y seleccionamos de todos los datos del tipo
    // peso y los ponemos en un array, como el array está ordenado por fecha
    // el primer peso (que será la última medida)

    for ($i = 0; $i < $num_patients_devices; $i++) {
            
        $tmp = (object)$patients_devices[$i];
        // miramos si el tipo de dato es un peso
        if ( $tmp -> getDeviceType() == "W"){

            // Metemos el valor en un array
            $weigh[] = $tmp -> getDeviceValue();

        } // End if

    } // End for

    // Mostramos el primer peso que es la última medida tomada por fecha
    $last_weigh = $weigh[0];
    //echo "$last_weigh Kg";

    /************** 
    /* Bloque analítica
    *************/
    //Contamos los datos de analiticas
    $num_patients_lab_analytics = count($patients_lab_analytics);

    // Recorremos el listado y seleccionamos de todos los datos del tipo
    // peso y los ponemos en un array, como el array está ordenado por fecha
    // el primer peso (que será la última medida)

    for ($i = 0; $i < $num_patients_lab_analytics; $i++) {
            
        $patients_lab_analytics_object = (object)$patients_lab_analytics[$i];

        //guardamos la fecha
        $patients_lab_analytics_time_stamp = $patients_lab_analytics_object -> getRecordDate();

        #Creamos el objeto
        $patients_lab_analytics_time_stamp_object =new DateTime($patients_lab_analytics_time_stamp);
        
        //Lo vamos guardoad en el formato deseado en un array (quedan todas las líneas guardadas y por tanto hay repetido)
        //Fuera del for quitamos las repetidas
        $patients_lab_analytics_date_dd_mm_yyyy_raw[] = $patients_lab_analytics_time_stamp_object->format("j/m/Y"); 

        //cogemos los datos y miramos el tipo de dato que es
        $patients_lab_analytics_type = $patients_lab_analytics_object -> getLabParam();

        //Miramos esl tipo de dato y lo guardamos en un array por clase
        //con los datos cronológicos de más reciente[0] a más antiguo[n]
        switch ($patients_lab_analytics_type) {
            
            case "U":
                $u[] = $patients_lab_analytics_object -> getLabvalue();
            break;

            case "C":
                $c[] = $patients_lab_analytics_object -> getLabvalue();
            break;

            case "S":
                $s[] = $patients_lab_analytics_object -> getLabvalue();
            break;

            case "P":
                $p[] = $patients_lab_analytics_object -> getLabvalue();
            break;

            case "H":
                $h[] = $patients_lab_analytics_object -> getLabvalue();
            break;

            case "CT":
                $ct[] = $patients_lab_analytics_object -> getLabvalue();
            break;

            case "LDL":
                $ldl[] = $patients_lab_analytics_object -> getLabvalue();
            break;

            case "HDL":
                $hdl[] = $patients_lab_analytics_object -> getLabvalue();
            break;

            case "eGFR":
                $egfr[] = $patients_lab_analytics_object -> getLabvalue();
            break;

            case "UP":
                $up[] = $patients_lab_analytics_object -> getLabvalue();
            break;

            default:
                echo "Dato no esperado";

        } //End switch

    } // End for

    //Quitamos los valores repetidos de fecha en el array los guarda en indices 0, 10, 20, 30...:
    $patients_lab_analytics_date_dd_mm_yyyy = array_unique($patients_lab_analytics_date_dd_mm_yyyy_raw);


    /******* 
     * BLOQUE FORMULARIOS
    */
                        
    //Contamos las líneas de barthel de un usuario
    $num_patients_barthel = count($patients_barthel);
    
    for ($i = 0; $i < $num_patients_barthel; $i++) {

        $patients_barthel_object = (object)$patients_barthel[$i];

        //guardamos la fecha
        $patients_barthel_time_stamp = $patients_barthel_object -> getCreateTs();

        #Creamos el objeto
        $patients_barthel_time_stamp_object =new DateTime($patients_barthel_time_stamp);
        
        //Lo vamos guardoad en el formato deseado en un array (quedan todas las líneas guardadas y por tanto hay repetido)
        //Fuera del for quitamos las repetidas
        $patients_barthel_date_dd_mm_yyyy_raw[] = $patients_barthel_time_stamp_object->format("j/m/Y"); 
        
        //obtenemos la puntación de barthel
        $patients_barthel_score[] = $patients_barthel_object -> getScore();

        //Obtenemos el resto de datos
        $patien_barthel_bowels[] = $patients_barthel_object -> getBowels();
        $patien_barthel_bladder[] = $patients_barthel_object -> getBladder();
        $patien_barthel_grooming[] = $patients_barthel_object -> getGrooming();
        $patien_barthel_toilet_use[] = $patients_barthel_object -> getToiletUse();
        $patien_barthel_feeding[] = $patients_barthel_object -> getFeeding();
        $patien_barthel_transfer[] = $patients_barthel_object -> getTransfer();
        $patien_barthel_mobility[] = $patients_barthel_object -> getMobility();
        $patien_barthel_dressing[] = $patients_barthel_object -> getDressing();
        $patien_barthel_stairs[] = $patients_barthel_object -> getStairs();
        $patien_barthel_bathing[] = $patients_barthel_object -> getBathing();

    } //end for

    //Contamos las líneas de ecfs de un usuario
    $num_patients_ecfs = count($patients_ecfs);
    
    for ($i = 0; $i < $num_patients_ecfs; $i++) {

        $patients_ecfs_object = (object)$patients_ecfs[$i];

        //guardamos la fecha
        $patients_ecfs_time_stamp = $patients_ecfs_object -> getCreateTs();

        #Creamos el objeto
        $patients_ecfs_time_stamp_object =new DateTime($patients_ecfs_time_stamp);
        
        //Lo vamos guardoad en el formato deseado en un array (quedan todas las líneas guardadas y por tanto hay repetido)
        //Fuera del for quitamos las repetidas
        $patients_ecfs_date_dd_mm_yyyy_raw[] = $patients_ecfs_time_stamp_object->format("j/m/Y"); 
        
        //obtenemos la puntación de ecfs
        $patients_ecfs_score[] = $patients_ecfs_object -> getScore();

        //Obtenemos el resto de datos
        $patients_ecfs_weigh[] = $patients_ecfs_object -> getWeigh();
        $patients_ecfs_shortBreath[] = $patients_ecfs_object -> getShortBreath();
        $patients_ecfs_shortBreathIncrease[] = $patients_ecfs_object -> getShortBreathIncrease();
        $patients_ecfs_feetSwollen[] = $patients_ecfs_object -> getFeetSwollen();
        $patients_ecfs_twoKg[] = $patients_ecfs_object -> getTwoKg();
        $patients_ecfs_fluidsLimit[] = $patients_ecfs_object -> getFluidsLimit();
        $patients_ecfs_restDay[] = $patients_ecfs_object -> getRestDay();
        $patients_ecfs_increaseFatigue[] = $patients_ecfs_object -> getIncreaseFatigue();
        $patients_ecfs_lowSaltDiet[] = $patients_ecfs_object -> getLowSaltDiet();
        $patients_ecfs_medicine[] = $patients_ecfs_object -> getMedicine();
        $patients_ecfs_fluShot[] = $patients_ecfs_object -> getFluShot();
        $patients_ecfs_exercise[] = $patients_ecfs_object -> getExercise();

    } //End for

    //Contamos las líneas de gijon de un usuario
    $num_patients_gijon = count($patients_gijon);
    
    for ($i = 0; $i < $num_patients_gijon; $i++) {

        $patients_gijon_object = (object)$patients_gijon[$i];

        //guardamos la fecha
        $patients_gijon_time_stamp = $patients_gijon_object -> getCreateTs();

        #Creamos el objeto
        $patients_gijon_time_stamp_object =new DateTime($patients_gijon_time_stamp);
        
        //Lo vamos guardoad en el formato deseado en un array (quedan todas las líneas guardadas y por tanto hay repetido)
        //Fuera del for quitamos las repetidas
        $patients_gijon_date_dd_mm_yyyy_raw[] = $patients_gijon_time_stamp_object->format("j/m/Y"); 
        
        //obtenemos la puntación de gijon
        $patients_gijon_score[] = $patients_gijon_object -> getScore();

        //Obtenemos el resto de datos
        $patients_gijon_familySituation[] = $patients_gijon_object -> getFamilySituation();
        $patients_gijon_economicSituation[] = $patients_gijon_object -> getEconomicSituation();
        $patients_gijon_livingPlace[] = $patients_gijon_object -> getLivingPlace();
        $patients_gijon_socialRelation[] = $patients_gijon_object -> getSocialRelation();
        $patients_gijon_supportSocial[] = $patients_gijon_object -> getSupportSocial();

    } //End for
?>