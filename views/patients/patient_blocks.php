<?php 
    /**********
    / * BLOQUE Para seleccionar el último peso
    ***********/                       
    $num_patients_data = count($patients_data);

    // Recorremos el listado y seleccionamos de todos los datos del tipo
    // peso y los ponemos en un array, como el array está ordenado por fecha
    // el primer peso (que será la última medida)

    for ($i = 0; $i < $num_patients_data; $i++) {
            
        $tmp = (object)$patients_data[$i];
        // miramos si el tipo de dato es un peso
        if ( $tmp -> getMetric() == "body_weight"){

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

    // Contamos las líneas de chatbot de un usuario
    // En este caso nos vienen muchas líneas porque hay una por cada pregunta-respuesta
    $num_patients_chatbot = count($patients_chatbot);
    
    // Inicializamos los arrays de fechas
    $patients_chatbot_date_dd_mm_yyyy_raw_seguimiento = [];
    $patients_chatbot_date_dd_mm_yyyy_raw_medica = [];
    $patients_chatbot_date_dd_mm_yyyy_raw_contacto = [];
    $patients_chatbot_date_dd_mm_yyyy_raw_cambio = [];
    $patients_chatbot_date_dd_mm_yyyy_raw_ingresado = [];
    $patients_chatbot_date_dd_mm_yyyy_raw_analitica = [];

    /*
    function guardar_fecha_array ($array_de_guardado, $arrar_entrada) {

        #Creamos el objeto
        $patients_chatbot_time_stamp_object =new DateTime($arrar_entrada);

        // Lo vamos guardoad en el formato deseado en un array (quedan todas las líneas guardadas y por tanto hay repetido)
        // Lo que haremos es guardar el valor en una variable y comprarala con el último valor del array
        // Si existe no lo añadimos y si no existe lo añadimos:

        // Guaradmos la fecha en una variable temporal
        $temporal_date = $patients_chatbot_time_stamp_object->format("j/m/Y"); 
        //echo "Temporal Date: <h1>$temporal_date</h1>";
        // Buscamos en el array si existe la fecha si no existe lo guardamos
        if (!in_array($temporal_date, $array_de_guardado, true)) {
            //echo "<h1>NO EXISTE</h1>";
            $array_de_guardado[] = $temporal_date;
        }// end if


    } // End function guardar_fecha_array
*/
    // Recorremos todo el bloque para sacar los datos.
    for ($i = 0; $i < $num_patients_chatbot; $i++) {

        $patients_chatbot_object = (object)$patients_chatbot[$i];

        //guardamos la fecha
        //$patients_chatbot_time_stamp = $patients_chatbot_object -> getCreateTs();

        //guardamos la fecha por cada chatbot
        $numero_pregunta = $patients_chatbot_object -> getPregunta();

        switch ($numero_pregunta) {

            // Como el flujo de preguntas puede ser las 3 primeras o las 12 del primer bloque de seguimeinto
            // y se puede repetir día, guardamos la fecha cada ve que hay la pregunta 2.
            case ($numero_pregunta == 2):
                // echo"Estoy en el chatbot 1<br>";
                $patients_chatbot_time_stamp_seguimiento = $patients_chatbot_object -> getCreateTs();
                
                #Creamos el objeto
                $patients_chatbot_time_stamp_seguimiento_object =new DateTime($patients_chatbot_time_stamp_seguimiento);

                $patients_chatbot_date_dd_mm_yyyy_format_seguimiento = $patients_chatbot_time_stamp_seguimiento_object->format("j/m/Y"); 

                // Lo vamos guardoad en el formato deseado en un array 
                $patients_chatbot_date_dd_mm_yyyy_raw_seguimiento[] = $patients_chatbot_date_dd_mm_yyyy_format_seguimiento; 
               
                break;

            // Como se puede repetir día, guardamos la fecha cada ve que hay la pregunta 16, 
            case ($numero_pregunta == 16):
                // echo"Estoy en el chatbot 2<br>";

                $patients_chatbot_time_stamp_medica = $patients_chatbot_object -> getCreateTs();

                //Creamos el objeto
                $patients_chatbot_time_stamp_medica_object =new DateTime($patients_chatbot_time_stamp_medica);

                $patients_chatbot_date_dd_mm_yyyy_format_medica = $patients_chatbot_time_stamp_medica_object->format("j/m/Y"); 

                // Lo vamos guardoad en el formato deseado en un array 
                $patients_chatbot_date_dd_mm_yyyy_raw_medica[] = $patients_chatbot_date_dd_mm_yyyy_format_medica;
                 
                break;

            case ($numero_pregunta >= 17 && $numero_pregunta <= 21):
                // echo"Estoy en el chatbot 2<br>";

                $patients_chatbot_time_stamp_medica = $patients_chatbot_object -> getCreateTs();

                //Creamos el objeto
                $patients_chatbot_time_stamp_medica_object =new DateTime($patients_chatbot_time_stamp_medica);

                $patients_chatbot_date_dd_mm_yyyy_format_medica = $patients_chatbot_time_stamp_medica_object->format("j/m/Y"); 

                // No lo guardamos en el chatbot de resultados solo lo utilizamos para el valor de los datos
                    
                break;

            case 22:
                // echo"Estoy en el chatbot 3<br>";
                $patients_chatbot_time_stamp_contacto = $patients_chatbot_object -> getCreateTs();

                #Creamos el objeto
                $patients_chatbot_time_stamp_contacto_object =new DateTime($patients_chatbot_time_stamp_contacto);

                $patients_chatbot_date_dd_mm_yyyy_format_contacto = $patients_chatbot_time_stamp_contacto_object->format("j/m/Y");

                // Lo vamos guardoad en el formato deseado en un array 
                $patients_chatbot_date_dd_mm_yyyy_raw_contacto[] = $patients_chatbot_date_dd_mm_yyyy_format_contacto; 
                
                break;

            case 23:
                // echo"Estoy en el chatbot 4<br>";
                $patients_chatbot_time_stamp_cambio = $patients_chatbot_object -> getCreateTs();

                #Creamos el objeto
                $patients_chatbot_time_stamp_cambio_object =new DateTime($patients_chatbot_time_stamp_cambio);

                $patients_chatbot_date_dd_mm_yyyy_format_cambio = $patients_chatbot_time_stamp_cambio_object->format("j/m/Y"); 

                // Lo vamos guardoad en el formato deseado en un array 
                $patients_chatbot_date_dd_mm_yyyy_raw_cambio[] = $patients_chatbot_date_dd_mm_yyyy_format_cambio;
                
                break;

            case 24:
                // echo"Estoy en el chatbot 5<br>";
                $patients_chatbot_time_stamp_ingresado = $patients_chatbot_object -> getCreateTs();

                #Creamos el objeto
                $patients_chatbot_time_stamp_ingresado_object =new DateTime($patients_chatbot_time_stamp_ingresado);

                $patients_chatbot_date_dd_mm_yyyy_format_ingresado = $patients_chatbot_time_stamp_ingresado_object->format("j/m/Y");

                // Lo vamos guardoad en el formato deseado en un array
                $patients_chatbot_date_dd_mm_yyyy_raw_ingresado[] = $patients_chatbot_date_dd_mm_yyyy_format_ingresado;

                break;

            case 25:
                // echo"Estoy en el chatbot 6<br>";
                $patients_chatbot_time_stamp_analitica = $patients_chatbot_object -> getCreateTs();

                #Creamos el objeto
                $patients_chatbot_time_stamp_analitica_object =new DateTime($patients_chatbot_time_stamp_analitica);

                $patients_chatbot_date_dd_mm_yyyy_format_analitica = $patients_chatbot_time_stamp_analitica_object->format("j/m/Y");

                // Lo vamos guardoad en el formato deseado en un array
                $patients_chatbot_date_dd_mm_yyyy_raw_analitica[] = $patients_chatbot_date_dd_mm_yyyy_format_analitica; 
                
                break;

            default:
                // echo"Estoy en el chatbot 6<br>";
                $patients_chatbot_time_stamp_analitica = $patients_chatbot_object -> getCreateTs();

                #Creamos el objeto
                $patients_chatbot_time_stamp_analitica_object =new DateTime($patients_chatbot_time_stamp_analitica);

                $patients_chatbot_date_dd_mm_yyyy_format_seguimiento = $patients_chatbot_time_stamp_analitica_object->format("j/m/Y");
                
                // No lo guardamos en el chatbot de resultados solo lo utilizamos para el valor de los datos

        } // End Switch

        // Separamos las preguntas según cuestionario y preguta
        // empezamos por la pregunta 2 porque la 1 es irrelevante.

        // Respuesta a cuestionario 1 respuesta 2
        if ($patients_chatbot_object -> getId_cuestionario() == "1" && $patients_chatbot_object -> getPregunta() == "2"){

            $patients_chatbot_respuesta_1_2[] = $patients_chatbot_object -> getRespuesta() ."-". $patients_chatbot_date_dd_mm_yyyy_format_seguimiento;

        } // end if

        // Respuesta a cuestionario 1 respuesta 3
        if ($patients_chatbot_object -> getId_cuestionario() == "1" && $patients_chatbot_object -> getPregunta() == "3"){

            $patients_chatbot_respuesta_1_3[] = $patients_chatbot_object -> getRespuesta() ."-". $patients_chatbot_date_dd_mm_yyyy_format_seguimiento;
            
        } // end if
        
        // Respuesta a cuestionario 1 respuesta 4
        if ($patients_chatbot_object -> getId_cuestionario() == "1" && $patients_chatbot_object -> getPregunta() == "4"){
                                        
            $patients_chatbot_respuesta_1_4[] = $patients_chatbot_object -> getRespuesta() ."-". $patients_chatbot_date_dd_mm_yyyy_format_seguimiento;
            
        } // end if

        // Respuesta a cuestionario 1 respuesta 5
        if ($patients_chatbot_object -> getId_cuestionario() == "1" && $patients_chatbot_object -> getPregunta() == "5"){

            $patients_chatbot_respuesta_1_5[] = $patients_chatbot_object -> getRespuesta() ."-". $patients_chatbot_date_dd_mm_yyyy_format_seguimiento;
            
        } // end if
        
        // Respuesta a cuestionario 1 respuesta 6
        if ($patients_chatbot_object -> getId_cuestionario() == "1" && $patients_chatbot_object -> getPregunta() == "6"){

            $patients_chatbot_respuesta_1_6[] = $patients_chatbot_object -> getRespuesta() ."-". $patients_chatbot_date_dd_mm_yyyy_format_seguimiento;
            
        } // end if

        // Respuesta a cuestionario 1 respuesta 7
        if ($patients_chatbot_object -> getId_cuestionario() == "1" && $patients_chatbot_object -> getPregunta() == "7"){

            $patients_chatbot_respuesta_1_7[] = $patients_chatbot_object -> getRespuesta() ."-". $patients_chatbot_date_dd_mm_yyyy_format_seguimiento;
            
        } // end if

        // Respuesta a cuestionario 1 respuesta 8
        if ($patients_chatbot_object -> getId_cuestionario() == "1" && $patients_chatbot_object -> getPregunta() == "8"){

            $patients_chatbot_respuesta_1_8[] = $patients_chatbot_object -> getRespuesta() ."-". $patients_chatbot_date_dd_mm_yyyy_format_seguimiento;
            
        } // end if

        // Respuesta a cuestionario 1 respuesta 9
        if ($patients_chatbot_object -> getId_cuestionario() == "1" && $patients_chatbot_object -> getPregunta() == "9"){

            $patients_chatbot_respuesta_1_9[] = $patients_chatbot_object -> getRespuesta() ."-". $patients_chatbot_date_dd_mm_yyyy_format_seguimiento;
            
        } // end if

        // Respuesta a cuestionario 1 respuesta 10
        if ($patients_chatbot_object -> getId_cuestionario() == "1" && $patients_chatbot_object -> getPregunta() == "10"){

            $patients_chatbot_respuesta_1_10[] = $patients_chatbot_object -> getRespuesta() ."-". $patients_chatbot_date_dd_mm_yyyy_format_seguimiento;
            
        } // end if

        // Respuesta a cuestionario 1 respuesta 11
        if ($patients_chatbot_object -> getId_cuestionario() == "1" && $patients_chatbot_object -> getPregunta() == "11"){

            $patients_chatbot_respuesta_1_11[] = $patients_chatbot_object -> getRespuesta() ."-". $patients_chatbot_date_dd_mm_yyyy_format_seguimiento;
            
        } // end if

        // Respuesta a cuestionario 1 respuesta 12
        if ($patients_chatbot_object -> getId_cuestionario() == "1" && $patients_chatbot_object -> getPregunta() == "12"){

            $patients_chatbot_respuesta_1_12[] = $patients_chatbot_object -> getRespuesta() ."-". $patients_chatbot_date_dd_mm_yyyy_format_seguimiento;
            
        } // end if

        // Respuesta a cuestionario 2 respuesta 2
        if ($patients_chatbot_object -> getId_cuestionario() == "2" && $patients_chatbot_object -> getPregunta() == "17"){

            $patients_chatbot_respuesta_2_2[] = $patients_chatbot_object -> getRespuesta() ."-". $patients_chatbot_date_dd_mm_yyyy_format_medica;
            
        } // end if

        // Respuesta a cuestionario 2 respuesta 3
        if ($patients_chatbot_object -> getId_cuestionario() == "2" && $patients_chatbot_object -> getPregunta() == "18"){

            $patients_chatbot_respuesta_2_3[] = $patients_chatbot_object -> getRespuesta() ."-". $patients_chatbot_date_dd_mm_yyyy_format_medica;
            
        } // end if

        // Respuesta a cuestionario 2 respuesta 4
        if ($patients_chatbot_object -> getId_cuestionario() == "2" && $patients_chatbot_object -> getPregunta() == "19"){

            $patients_chatbot_respuesta_2_4[] = $patients_chatbot_object -> getRespuesta() ."-". $patients_chatbot_date_dd_mm_yyyy_format_medica;
            
        } // end if

        // Respuesta a cuestionario 2 respuesta 5
        if ($patients_chatbot_object -> getId_cuestionario() == "2" && $patients_chatbot_object -> getPregunta() == "20"){

            $patients_chatbot_respuesta_2_5[] = $patients_chatbot_object -> getRespuesta() ."-". $patients_chatbot_date_dd_mm_yyyy_format_medica;
            
        } // end if

        // Respuesta a cuestionario 2 respuesta 6
        if ($patients_chatbot_object -> getId_cuestionario() == "2" && $patients_chatbot_object -> getPregunta() == "21"){

            $patients_chatbot_respuesta_2_6[] = $patients_chatbot_object -> getRespuesta() ."-". $patients_chatbot_date_dd_mm_yyyy_format_medica;
            
        } // end if

        // Respuesta a cuestionario 2 respuesta 7
        /**NO HAY más respuestas
        if ($patients_chatbot_object -> getId_cuestionario() == "2" && $patients_chatbot_object -> getPregunta() == "7"){

            $patients_chatbot_respuesta_2_7[] = $patients_chatbot_object -> getRespuesta();
            
        } // end if
        */

        // Respuesta a cuestionario 3 respuesta 1
        if ($patients_chatbot_object -> getId_cuestionario() == "3" && $patients_chatbot_object -> getPregunta() == "22"){

            $patients_chatbot_respuesta_3_1[] = $patients_chatbot_object -> getRespuesta() ."-". $patients_chatbot_date_dd_mm_yyyy_format_contacto;
            
        } // end if

        // Respuesta a cuestionario 3 respuesta 2
        if ($patients_chatbot_object -> getId_cuestionario() == "3" && $patients_chatbot_object -> getPregunta() == "23"){

            $patients_chatbot_respuesta_3_2[] = $patients_chatbot_object -> getRespuesta() ."-". $patients_chatbot_date_dd_mm_yyyy_format_cambio;
            
        } // end if

        // Respuesta a cuestionario 3 respuesta 3
        if ($patients_chatbot_object -> getId_cuestionario() == "3" && $patients_chatbot_object -> getPregunta() == "24"){

            $patients_chatbot_respuesta_3_3[] = $patients_chatbot_object -> getRespuesta() ."-". $patients_chatbot_date_dd_mm_yyyy_format_ingresado;
            
        } // end if

        // Respuesta a cuestionario 3 respuesta 4
        if ($patients_chatbot_object -> getId_cuestionario() == "3" && $patients_chatbot_object -> getPregunta() == "25"){

            $patients_chatbot_respuesta_3_4[] = $patients_chatbot_object -> getRespuesta() ."-". $patients_chatbot_date_dd_mm_yyyy_format_analitica;
            
        } // end if

        //Obtenemos el resto de los datos
        $patients_chatbot_id[] = $patients_chatbot_object -> getId();
        $patients_chatbo_userId[] = $patients_chatbot_object -> getUserId();
        $patients_chatbo_cuestionario[] = $patients_chatbot_object -> getCuestionario();
        $patients_chatbot_id_patient[] = $patients_chatbot_object -> getId_patient();
        $patients_chatbot_create_ts[] = $patients_chatbot_object -> getCreateTs();

    } //end for
?>