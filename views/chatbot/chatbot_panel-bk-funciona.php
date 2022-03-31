<?php

    // Begin - Para mostrar errores PHP en Modo DEBUG -> Comentar para producción
    // error_reporting(E_ALL);
    // ini_set('display_errors', '1');
    // End - Para mostrar errores PHP en Modo DEBUG -> Comentar para producción

    // TODO Controlar el error si una variable se declara dentro de un IF:
    // - alarm_2kg_2days, alarm_2kg_7days, alarm_2kg_2days_edema, alarm_2kg_7days_edema

    if (defined("SECURITY_CONSTANT")) {

        $bodyId = "show_all_emails";
        $pageTitle = "Control Panel";

        require_once(SKEL_DIR . "/cabecera.php");
        
        require_once(SKEL_DIR . "/headStart.php");
        
        require_once(SKEL_DIR . "/headEnd.php");
        
        require_once(SKEL_DIR . "/bodyStart.php");
        
        require_once(SKEL_DIR . "/sidebar.php");
        
        require_once(SKEL_DIR . "/contentWrapper.php");

        //Configuraciones para reducir código
        
        $labelGeneralAlarms = array ("n/a", 
                                     "Missing data", 
                                     "New info",
                                     "Warning",
                                     "Caution",
                                     "Danger"); //n/a, para empezar el array por 1

        $numGeneralAlarms = count($labelGeneralAlarms) -1;

        $indicatorPanels = array ("n/a",
                                  "#collapseMissingData",
                                  "#collapseNewInformation",
                                  "#collapseWarningAlarm",
                                  "#collapseCautionAlarm",
                                  "#collapseDangerAlarm",); //n/a, para empezar el array por 1

        $colorAlarm = array ("n/a",
                             "btn btn-secondary btn-icon-split",
                             "btn btn-info btn-icon-split",
                             "btn btn-warning btn-icon-split",
                             "btn btn-caution btn-icon-split",
                             "btn btn-danger btn-icon-split"); //n/a, para empezar el array por 1

        $iconAlarm = array ("n/a",
                             "fas fa-info-circle",
                             "fas fa-flag",
                             "fas fa-exclamation-triangle",
                             "fas fa-exclamation-triangle",
                             "fas fa-exclamation-triangle"); //n/a, para empezar el array por 1


        $missingdata_array = array ("n/a",
                                    "Q: Diet",
                                    "Devices: W",
                                    "W"); //n/a, para empezar el array por 1

        $newinformation_array = array ("n/a",
                                       "U: Med",
                                       "U: Hosp",
                                       "U: Visit",
                                       "U: Result"); //n/a, para empezar el array por 1

        $warningAlarm_array = array ("n/a",
                                    "Q: E",
                                    "W"); //n/a, para empezar el array por 1    
                                    
        $cautionAlarm_array = array ("n/a",
                                    "Q: P",
                                    "Q: U",
                                    "Q: SE",
                                    "Q: C",
                                    "W-7",
                                    "W-2"); //n/a, para empezar el array por 1
        
        $dangerAlarm_array = array ("n/a",
                                    "Q: SoB",
                                    "Q: SoBL",
                                    "W"); //n/a, para empezar el array por 1

        $dataPanels_missingData = array ("n/a",
                               "#collapseMissingData01",
                               "#collapseMissingData02",
                               "#collapseMissingData03");

        $dataPanels_newInfo = array ("n/a",
                               "#collapseNewInfoData01",
                               "#collapseNewInfoData02",
                               "#collapseNewInfoData03",
                               "#collapseNewInfoData04");

        $dataPanels_WarningAlarm = array ("n/a",
                                         "#collapseWarningAlarmData01",
                                         "#collapseWarningAlarmData02");

        $dataPanels_CautionAlarm = array ("n/a",
                                         "#collapseCautionAlarmData01",
                                         "#collapseCautionAlarmData02",
                                         "#collapseCautionAlarmData03",
                                         "#collapseCautionAlarmData04",
                                         "#collapseCautionAlarmData05",
                                         "#collapseCautionAlarmData06");

        $dataPanels_DangerAlarm = array ("n/a",
                                         "#collapseDangerAlarmData01",
                                         "#collapseDangerAlarmData02",
                                         "#collapseDangerAlarmData03");


        //Gestion del peso W de Devices

        // Funcion que en un array multidimensional nos busca una id según un nivel de profundidad
         function search_in_array ($_array, $_key, $_column) {

            $n_elements = count ($_array);

            for ($i = 0;  $i < $n_elements; $i++){

                if ($_array[$_column][$i]  == $_key){

                    return true;

                }else{

                    return false;

                }//end if

            } // End for

         }// End function buscar_en_array

         // Función que cuenta la diferencia de dias entre dos fechas
         function count_days ($_fecha1, $fecha2) {

            $first_date = new DateTime($_fecha1);
            $second_date = new DateTime($fecha2);
            $diff = $first_date -> diff ($second_date);
            $diff_days = $diff -> days;

            return $diff_days;

         } //End funcion count_dias


        // Creamos un array multidimensional con los ID de paciente 
        // y los 3 datos a continuación por cada aparición 
        //Inicializamos el array
        $list_patients_w_id = [];

        // Creamos un contador para el indice de ID
        $index_count = 0;

        $num_patients_devices = count($patients_devices);
        //echo "patients_devices: $patients_devices <br>";

        //Recorro la lista al revés para tenerlos por orden de más nuevo a más viejas las fechas
        $patients_devices_rev = array_reverse ($patients_devices);
        //echo "patients_devices_rev: $patients_devices_rev <br>";

        for ($i = 0; $i < $num_patients_devices; $i++) {
            
            //Pasamos los pacientes para poder manejarlos
            $tmp = (object)$patients_devices_rev[$i];
            $id_patient = $tmp -> getIdPatient();

            $key_list = search_in_array($list_patients_w_id, $id_patient, $index_count);

            // Sino No existe lo añadimos en el siguiente ID
            if ($key_list == 'false' || empty($list_patients_w_id) ){
                //echo "VERDADERO <br>";
                $list_patients_w_id[$index_count][] = $tmp -> getIdPatient();
                $list_patients_w_id[$index_count][] = $tmp -> getRecordDate();
                $list_patients_w_id[$index_count][] = $tmp -> getDeviceValue();

            }else{
                //echo "FALSO <br>";
                $index_count ++;
                $list_patients_w_id[$index_count][] = $tmp -> getIdPatient();
                $list_patients_w_id[$index_count][] = $tmp -> getRecordDate();
                $list_patients_w_id[$index_count][] = $tmp -> getDeviceValue();
            } //End If

        } // End for
        
/*
        echo "Paciente5.1: ". $list_patients_w_id[0][0]." - ". $list_patients_w_id[0][1]. " - ". $list_patients_w_id[0][2]. "<br>";
        echo "Paciente5.2: ". $list_patients_w_id[0][3]." - ". $list_patients_w_id[0][4]. " - ". $list_patients_w_id[0][5]. "<br>";
        echo "Paciente5.3: ". $list_patients_w_id[0][6]." - ". $list_patients_w_id[0][7]. " - ". $list_patients_w_id[0][8]. "<br>";

        echo "Paciente4.1: ". $list_patients_w_id[1][0]." - ". $list_patients_w_id[1][1]. " - ". $list_patients_w_id[1][2]. "<br>";
        echo "Paciente4.2: ". $list_patients_w_id[1][3]." - ". $list_patients_w_id[1][4]. " - ". $list_patients_w_id[1][5]. "<br>";
        echo "Paciente4.3: ". $list_patients_w_id[1][6]." - ". $list_patients_w_id[1][7]. " - ". $list_patients_w_id[1][8]. "<br>";
        echo "Paciente4.3: ". $list_patients_w_id[1][9]." - ". $list_patients_w_id[1][10]. " - ". $list_patients_w_id[1][11]. "<br>";

        echo "Paciente_otro.1: ". $list_patients_w_id[2][0]." - ". $list_patients_w_id[2][1]. " - ". $list_patients_w_id[2][2]. "<br>";
*/

        // recorremos el array de pacientes con peso
        $num_patients_w = count ($list_patients_w_id);
        //echo "Num: $num_patients_w <br/>";

        //Inicializamos arrays
        /*
        $alarm_more_than_7_days = 0;
        $alarm_more_between_2_7_days = 0;

        $alarm_2kg_2days_edema = 0;
        $alarm_2kg_7days_edema = 0;
        $alarm_2kg_7days_array = 0;
        */

        // Recorremos el array de pacientes a nivel superior o sea cada paciente diferente
        for ($i = 0; $i < $num_patients_w; $i++) {
            // Cogemos la fecha del primer peso que es la última medida
            $first_w_date = $list_patients_w_id[$i][1];
            // Lo comparamos con la fecha actual
            $diff_w_days = count_days($first_w_date, date('Y-m-d h:m:s'));

            // si tiene más de 7 días añadimos el ID en un listado de pesos de más de 7 días
            if ($diff_w_days > 7){
                $alarm_more_than_7_days[] = $list_patients_w_id[$i][0];
                //echo"$alarm_more_than_7_days[$i] <br>";

            // Si está entre 2 y 7 días añadimos el ID en un listado de pesos de entre 2 y 7 días
            }else if ($diff_w_days <= 7 && $diff_w_days > 2){
                $alarm_more_between_2_7_days[] = $list_patients_w_id[$i][0];
                // echo"$alarm_more_between_2_7_days[$i] <br>";

            // si son menos de 2 días la última medida 
            } else {

               // contamos elementos que hay en el array
               $num_list_patients_w_id = count ($list_patients_w_id[$i]);
               // echo "N: $num_list_patients_w_id <br>";

               // recorremos el array de 3 en 3 para comparar los pesos
               for ($j=2; $j <= $num_list_patients_w_id; $j=$j+3) {
                    //echo "Peso: ". $list_patients_w_id[$i][$j]. "<br>";            

                    //miramos primero que exista valor para la posición
                    if (isset($list_patients_w_id[$i][$j+3])){

                        // miramos si existe valor siguiente y si existe comparamos
                        if ($list_patients_w_id[$i][$j+3] != NULL) {
                            // miramos la diferencia de días entre la última fecha y la siguiente del array
                            $difference_days_w = count_days($list_patients_w_id[$i][1], $list_patients_w_id[$i][$j+2]);
                            /*
                            echo $list_patients_w_id[$i][2];
                            echo "fecha1: " .$list_patients_w_id[$i][1]. "<br>";
                            echo "fecha2: " .$list_patients_w_id[$i][$j+2]. "<br>";
                            echo "Days: " .$difference_days_w. "<br>";
                            */

                            $weight_1 = $list_patients_w_id[$i][2];
                            $weight_2 = $list_patients_w_id[$i][$j+3];
                            $weight_difference = $weight_1 - $weight_2;
                            
                            /*
                            echo "w1: " .$weight_1. "<br>";
                            echo "w2: " .$weight_2. "<br>";
                            echo "W: ". $weight_difference. "<br>";
                            */
                            
                            // si es menor de 3 días miramos pesos 
                            if ($difference_days_w < 3){

                                //si es más de 2Kg alarma
                                if ($weight_difference > 2) {

                                    $alarm_2kg_2days_array = $list_patients_w_id[$i][0];

                                } // End if más de 2Kg

                            } // End if menos de 3 días
                            
                            
                            // si son entre 3 y 8 días
                            if ($difference_days_w >= 3 && $difference_days_w < 8){

                                //si es más de 2Kg alarma
                                if ($weight_difference > 2) {

                                    $alarm_2kg_7days_array = $list_patients_w_id[$i][0];

                                } // End if más de 2Kg

                            } // End if entre 3 y 8 días
                            
                        }// end if

                    }// end if

               } // End for
              
                // como puede que se guarde más de una alarma porque hay un intervalo de días 2-3, 3-8
                //solo tendremos en cuenta la primera alarma
                $alarm_2kg_2days = $alarm_2kg_2days_array[0];
                $alarm_2kg_7days = $alarm_2kg_7days_array[0];

                //var_dump($alarm_2kg_2days);
                //var_dump($alarm_2kg_7days);

            }// End if la última medida es reciente
           
        } // end for

        // Ver si los id de posible edema están con los id de aumento de peso
        $num_alarm_edema = count ($alarm_edema);

        for ($i = 0; $i < $num_alarm_edema; $i++) {

            if (in_array ($alarm_edema[$i], $alarm_2kg_2days)) {
                $alarm_2kg_2days_edema = $alarm_edema[$i];
            } // end if 

            if (in_array ($alarm_edema[$i], $alarm_2kg_7days)) {
                $alarm_2kg_7days_edema = $alarm_edema[$i];
            } // end if

        } // End for

        //Contamos número de alarmas
        //$num_alarm_more_than_7_days = count($alarm_more_than_7_days); // En principio no es necesario
        //$num_alarm_more_between_2_7_days = count($alarm_more_between_2_7_days); // En principio no es necesario
        $num_alarm_2kg_2days = count($alarm_2kg_2days);
        $num_alarm_2kg_7days = count($alarm_2kg_7days);
        $num_alarm_2kg_2days_edema = count($alarm_2kg_2days_edema);
        $num_alarm_2kg_7days_edema = count($alarm_2kg_7days_edema);

        
        /*
        echo "1) $num_alarm_more_than_7_days <br>";
        echo "2) $num_alarm_more_between_2_7_days <br>";
        echo "3) $num_alarm_2kg_2days <br>";
        echo "4) $num_alarm_2kg_7days <br>";
        echo "5) $num_alarm_2kg_2days_edema <br>";
        echo "6) $num_alarm_2kg_7days_edema <br>";
        */

        $numIndicators_missingdata = count($missingdata_array) - 1; //contamos el número de nombres de datos -1 para descartar n/a
        $numIndicators_newinformation = count($newinformation_array) - 1; //contamos el número de nombres de datos -1 para descartar n/a
        $numIndicators_warningAlarm = count($warningAlarm_array) + $num_alarm_2kg_7days - 1; // contamos el número de nombres de datos -1 para descartar n/a
        $numIndicators_cautionAlarm = count($cautionAlarm_array) + $num_alarm_2kg_2days + $alarm_2kg_7days_edema - 1; // -1 contamos el número de nombres de datos -1 para descartar n/a
        $numIndicators_dangerAlarm = count($dangerAlarm_array) + $num_alarm_2kg_2days_edema - 1; // contamos el número de nombres de datos -1 para descartar n/a

        /*
        echo "missingdata: " .$numIndicators_missingdata. "<br>";
        echo "newinformation: " .$numIndicators_newinformation. "<br>";
        echo "warning: " .$numIndicators_warningAlarm. "<br>";
        echo "caution: " .$numIndicators_cautionAlarm. "<br>";
        echo "danger: " .$numIndicators_dangerAlarm. "<br>";
        */

        // Buscamos alarmas repetidas para ver si alguien ha marcado dos de las siguientes Q4..Q10
        // Metemos todas las id de alarmas en un array y miramos los numeros que hay de cada alarma:
        $combinet_alarms = array_merge ($alarm_4_1, $alarm_4_2, $alarm_4_3, $alarm_4_4, $alarm_5_1, $alarm_5_2);

       // echo "alarms_4_4: ";
       // var_dump($alarma_4_4);
       // echo "<br>";

        //$count_combinet_alarms = array_count_values($combinet_alarms);

        //var_dump($count_combinet_alarms);
        //echo "combine alarms: ";
        //var_dump ($combinet_alarms);
        //echo "<br>";

        //buscamos los valores que son 2 o más

        $numAlarmArray[] = 0; // Creamos un array con los números de alarma, el primero es 0 para contar desde el 1

        // Missing data
        $numAlarm_1_1 = count($alarm_1_1);
        $numAlarm_1_2 = count($alarm_1_2);
        $numAlarm_1_3 = count($alarm_1_3);

        $numAlarm_1_Array = array (0,
                                   $numAlarm_1_1,
                                   $numAlarm_1_2,
                                   $numAlarm_1_3);

        $numAlarm1 = $numAlarm_1_1 + $numAlarm_1_2 + $numAlarm_1_3;

        $numAlarmArray[] = $numAlarm1;

        // Information data
        $numAlarm_2_1 = count($alarm_2_1);
        $numAlarm_2_2 = count($alarm_2_2);
        $numAlarm_2_3 = count($alarm_2_3);
        $numAlarm_2_4 = count($alarm_2_4);

        $numAlarm_2_Array = array (0,
                                   $numAlarm_2_1,
                                   $numAlarm_2_2,
                                   $numAlarm_2_3,
                                   $numAlarm_2_4);

        $numAlarm2 = $numAlarm_2_1 + $numAlarm_2_2 + $numAlarm_2_3 + $numAlarm_2_4;

        $numAlarmArray[] = $numAlarm2;

        // Warning alarm
        $numAlarm_3_1 = count($alarm_3_1);
        $numAlarm_3_2 = count($alarm_2kg_7days);
        
        $numAlarm_3_Array = array (0,
                                   $numAlarm_3_1,
                                   $numAlarm_3_2);

        $numAlarm3 = $numAlarm_3_1 + $numAlarm_3_2;

        $numAlarmArray[] = $numAlarm3;

        // Caution alarm
        $numAlarm_4_1 = count($alarm_4_1);
        $numAlarm_4_2 = count($alarm_4_2);
        $numAlarm_4_3 = count($alarm_4_3);
        $numAlarm_4_4 = count($alarm_4_4);
        $numAlarm_4_5 = count($alarm_2kg_2days);
        $numAlarm_4_6 = count($alarm_2kg_7days_edema);

        $numAlarm_4_Array = array (0,
                                   $numAlarm_4_1,
                                   $numAlarm_4_2,
                                   $numAlarm_4_3,
                                   $numAlarm_4_4,
                                   $numAlarm_4_5,
                                   $numAlarm_4_6);

        $numAlarm4 = $numAlarm_4_1 + $numAlarm_4_2 + $numAlarm_4_3 + $numAlarm_4_4 + $numAlarm_4_5 + $numAlarm_4_6;

        $numAlarmArray[] = $numAlarm4;

        // Danger alarm
        $numAlarm_5_1 = count($alarm_5_1);
        $numAlarm_5_2 = count($alarm_5_2);
        $numAlarm_5_3 = count($alarm_2kg_2days_edema);
        
        $numAlarm_5_Array = array (0,
                                   $numAlarm_5_1,
                                   $numAlarm_5_2,
                                   $numAlarm_5_3);

        $numAlarm5 = $numAlarm_5_1 + $numAlarm_5_2 + $numAlarm_5_3;

        $numAlarmArray[] = $numAlarm5;


        //Creamos la función que crea la tabla de información
        function _tableInfo ($_numAlarm, $_object ){
           
            $html = 
                '<div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>P1</th>
                                <th>P2</th>
                                <th>P3</th>
                            </tr>
                        </thead>
                        <tbody>
                        ';

                                for ($i = 0; $i < $_numAlarm; $i++) {

                            
                                    $patient = (object)$_object[$i];
                                    $html .=
                                        '<tr>
                                            <td>
                                                <a href= "index.php?controller=patients&amp;option=query_p1&amp;id='. $patient -> getId() .' "> '. $patient -> getIdString().'></a>
                                            </td>
                                            <td>
                                                <a href= "index.php?controller=patients&amp;option=query_p1&amp;id='.  $patient -> getId() .' ">P1</a>
                                            </td>
                                            <td>
                                                <a href= "index.php?controller=patients&amp;option=query_p2&amp;id='.  $patient -> getId() .' ">P2</a>
                                            </td>
                                            <td>
                                                <a href= "index.php?controller=patients&amp;option=query_p3&amp;id='.  $patient -> getId() .' ">P3</a>
                                            </td>
                                        </tr>';
                            

                                }
                        $html .='
                        
                        </tbody>
                    </table>
                </div>';
           
                echo $html;

        } // End Function
        
        //TODO  _tableInfo($numAlarm_1_1,$alarm_1_1);
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><?php echo $pageTitle ?></h1>
            
            <!-- Content Row -->
            <div class="row">

                <!-- First Column -->
                <div class="col-lg-3">
                
                    <!-- card card shadow -->
                    <div class="card shadow mb-4">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="my-2"></div>
                            <h3>Alarms:</h3>
                            <?php

                            // Por cada alarma generamos un botón 
                            // Este botón enviará a desplegar el panel correspondiente de inidicadores con un botón por cada indicador
                            // Yo tengo las alarmas de menos a mas importancia  la primera menos importante, la última más importante,
                            // pero las muestro al reves.
                            for ($i=$numGeneralAlarms; $i >= 1; $i--){ ?>
                                <p>
                                    <a href="#" class="<?php echo $colorAlarm[$i]; ?>" data-toggle="collapse" data-target=<?php echo $indicatorPanels[$i]; ?> aria-expanded="true" aria-controls="collapseOneOne">
                                    <span class="icon text-white-50">
                                        <i class="<?php echo $iconAlarm[$i]; ?>"></i>
                                    </span>
                                    <span class="text"><?php echo $labelGeneralAlarms[$i].": ". $numAlarmArray[$i] ?></span>
                                    </a>
                                </p>
                            <?php
                            } // End for
                            ?>
                            
                        </div> 
                        <!-- /.card-body -->

                    </div>
                    <!-- card card shadow -->
                </div>
                <!-- First Column -->

                <!-- Second Column 1-->

                <div id="collapseMissingData" class="collapse col-lg-3">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <?php $target01 = "#collapseOneTwo";?>
                        <!-- card body -->
                        <div class="card-body">
                            <div class="information"></div>
                            <h3>Missing data:</h3>
                            <?php
                            // Generamos un botón con cada uno de los indicadores para la alarma 1
                            for ($i=1; $i <= $numIndicators_missingdata; $i++) {?>
                                <div class="my-2"></div>
                                <a href="#" class="btn btn-secondary btn-icon-split" data-toggle="collapse" data-target=<?php echo $dataPanels_missingData[$i] ?> aria-expanded="true" aria-controls="collapseOneTwo">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-info-circle"></i>
                                    </span>
                                    <span class="text"> <?php echo $missingdata_array[$i]." -> " .$numAlarm_1_Array[$i]; ?></span>
                                </a>
                            <?php
                            } // End for
                            ?>
                        </div> 
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- Second Column 1-->

                <!-- Second Column 2 -->

                <div id="collapseNewInformation" class="collapse col-lg-3">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <!-- card body -->
                        <div class="card-body">
                            <div class="information"></div>
                            <h3>New info:</h3>

                            <?php
                            // Generamos un botón por cada indicador de la alarma 2
                            for ($i=1; $i <= $numIndicators_newinformation; $i++) {?>
                                <div class="my-2"></div>
                                <a href="#" class="btn btn-info btn-icon-split" data-toggle="collapse" data-target=<?php echo $dataPanels_newInfo[$i] ?> aria-expanded="true" aria-controls="collapseOneTwo">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-flag"></i>
                                    </span>
                                    <span class="text"> <?php echo $newinformation_array[$i]." -> " .$numAlarm_2_Array[$i]; ?></span>
                                </a>
                            <?php
                            } // End for
                            ?>

                        </div> 
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- Second Column 2 -->

                <!-- Second Column 3 -->

                <div id="collapseWarningAlarm" class="collapse col-lg-3">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <!-- card body -->
                        <div class="card-body">
                            <div class="information"></div>
                            <h3>Warning:</h3>

                            <?php
                            // Generamos un botón por cada indicador de la alarma 3
                            for ($i=1; $i <= $numIndicators_warningAlarm; $i++) {?>
                                <div class="my-2"></div>
                                <a href="#" class="btn btn-warning btn-icon-split" data-toggle="collapse" data-target=<?php echo $dataPanels_WarningAlarm[$i] ?> aria-expanded="true" aria-controls="collapseOneTwo">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                    <span class="text"> <?php echo $warningAlarm_array[$i]." -> " .$numAlarm_3_Array[$i]; ?></span>
                                </a>
                            <?php
                            } // End for
                            ?>

                        </div> 
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- Second Column 3 -->

                <!-- Second Column 4 -->

                <div id="collapseCautionAlarm" class="collapse col-lg-3">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <!-- card body -->
                        <div class="card-body">
                            <div class="information"></div>
                            <h3>Caution:</h3>

                            <?php
                            // Generamos un botón por cada indicador de la alarma 3
                            for ($i=1; $i <= $numIndicators_cautionAlarm; $i++) {?>
                                <div class="my-2"></div>
                                <a href="#" class="btn btn-caution btn-icon-split" data-toggle="collapse" data-target=<?php echo $dataPanels_CautionAlarm[$i] ?> aria-expanded="true" aria-controls="collapseOneTwo">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                    <span class="text"> <?php echo $cautionAlarm_array[$i]." -> " .$numAlarm_4_Array[$i]; ?></span>
                                </a>
                            <?php
                            } // End for
                            ?>

                        </div> 
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- Second Column 4 -->

                <!-- Second Column 5 -->

                <div id="collapseDangerAlarm" class="collapse col-lg-3">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <!-- card body -->
                        <div class="card-body">
                            <div class="information"></div>
                            <h3>Danger:</h3>

                            <?php
                            // Generamos un botón por cada indicador de la alarma 3
                            for ($i=1; $i <= $numIndicators_dangerAlarm; $i++) {?>
                                <div class="my-2"></div>
                                <a href="#" class="btn btn-danger btn-icon-split" data-toggle="collapse" data-target=<?php echo $dataPanels_DangerAlarm[$i] ?> aria-expanded="true" aria-controls="collapseOneTwo">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                    <span class="text"> <?php echo $dangerAlarm_array[$i]." -> " .$numAlarm_5_Array[$i]; ?></span>
                                </a>
                            <?php
                            } // End for
                            ?>

                        </div> 
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- Second Column 5 -->

                <!-- Third Column alarm 1 panel 1-->
                <div id="collapseMissingData01" class="collapse col-lg-6">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="information"></div>
                            <h3>Patients:</h3>
                            <?php _tableInfo($numAlarm_1_1,$alarm_1_1);?>
                        <!-- card body -->   
                        </div>
                    </div>
                <!-- Third Column alarm 1 panel 1 -->
                </div>

                <!-- Third Column alarm 1 panel 2 -->
                <div id="collapseMissingData02" class="collapse col-lg-6">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="information"></div>
                            <h3>Patients:</h3>
                            <?php _tableInfo($numAlarm_1_2,$alarm_1_2);?>
                        <!-- card body -->   
                        </div>
                    </div>
                <!-- Third Column alarm 1 panel 2 -->
                </div>

                <!-- Third Column alarm 1 panel 2 -->
                <div id="collapseMissingData03" class="collapse col-lg-6">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="information"></div>
                            <h3>Patients:</h3>
                            <?php _tableInfo($numAlarm_1_3,$alarm_1_3);?>
                            
                        <!-- card body -->   
                        </div>
                    </div>
                <!-- Third Column alarm 1 panel 2 -->
                </div>


                <!-- Third Column alarm 2 panel 1 -->
                <div id="collapseNewInfoData01" class="collapse col-lg-6">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="information"></div>
                            <h3>Patients:</h3>
                            <?php _tableInfo($numAlarm_2_1,$alarm_2_1);?>
                        <!-- card body -->   
                        </div>
                    </div>
                <!-- Third Column alarm 2 panel 1 -->
                </div>

                <!-- Third Column alarm 2 panel 2 -->
                <div id="collapseNewInfoData02" class="collapse col-lg-6">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="information"></div>
                            <h3>Patients:</h3>
                            <?php _tableInfo($numAlarm_2_2,$alarm_2_2);?>
                        <!-- card body -->   
                        </div>
                    </div>
                <!-- Third Column alarm 2 panel 2 -->
                </div>

                <!-- Third Column alarm 2 panel 3 -->
                <div id="collapseNewInfoData03" class="collapse col-lg-6">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="information"></div>
                            <h3>Patients:</h3>
                            <?php _tableInfo($numAlarm_2_3,$alarm_2_3);?>
                        <!-- card body -->   
                        </div>
                    </div>
                <!-- Third Column alarm 2 panel 3 -->
                </div>

                 <!-- Third Column alarm 2 panel 4 -->
                 <div id="collapseNewInfoData04" class="collapse col-lg-6">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="information"></div>
                            <h3>Patients:</h3>
                            <?php _tableInfo($numAlarm_2_4,$alarm_2_4);?>
                        <!-- card body -->   
                        </div>
                    </div>
                <!-- Third Column alarm 2 panel 4 -->
                </div>

                <!-- Third Column alarm 3 panel 1 -->
                <div id="collapseWarningAlarmData01" class="collapse col-lg-6">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="information"></div>
                            <h3>Patients:</h3>
                            <?php _tableInfo($numAlarm_3_1,$alarm_3_1);?>
                        <!-- card body -->   
                        </div>
                    </div>
                <!-- Third Column alarm 3 panel 1 -->
                </div>

                <!-- Third Column alarm 3 panel 2 -->
                <div id="collapseWarningAlarmData02" class="collapse col-lg-6">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="information"></div>
                            <h3>Patients:</h3>
                            <?php _tableInfo($numAlarm_3_2,$alarm_3_2);?>
                        <!-- card body -->   
                        </div>
                    </div>
                <!-- Third Column alarm 3 panel 2 -->
                </div>

                <!-- Third Column alarm 4 panel 1 -->
                <div id="collapseCautionAlarmData01" class="collapse col-lg-6">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="information"></div>
                            <h3>Patients:</h3>
                            <?php _tableInfo($numAlarm_4_1,$alarm_4_1);?>
                        <!-- card body -->   
                        </div>
                    </div>
                <!-- Third Column alarm 4 panel 1 -->
                </div>

                <!-- Third Column alarm 4 panel 2 -->
                <div id="collapseCautionAlarmData02" class="collapse col-lg-6">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="information"></div>
                            <h3>Patients:</h3>
                            <?php _tableInfo($numAlarm_4_2,$alarm_4_2);?>
                        <!-- card body -->   
                        </div>
                    </div>
                <!-- Third Column alarm 4 panel 2 -->
                </div>

                <!-- Third Column alarm 4 panel 3 -->
                <div id="collapseCautionAlarmData03" class="collapse col-lg-6">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="information"></div>
                            <h3>Patients:</h3>
                            <?php _tableInfo($numAlarm_4_3,$alarm_4_3);?>
                        <!-- card body -->   
                        </div>
                    </div>
                <!-- Third Column alarm 4 panel 3 -->
                </div>

                <!-- Third Column alarm 4 panel 4 -->
                <div id="collapseCautionAlarmData04" class="collapse col-lg-6">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="information"></div>
                            <h3>Patients:</h3>
                            <?php _tableInfo($numAlarm_4_4,$alarm_4_4);?>
                        <!-- card body -->   
                        </div>
                    </div>
                <!-- Third Column alarm 4 panel 4 -->
                </div>

                <!-- Third Column alarm 4 panel 5 -->
                <div id="collapseCautionAlarmData05" class="collapse col-lg-6">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="information"></div>
                            <h3>Patients:</h3>
                            <?php _tableInfo($numAlarm_4_5,$alarm_4_5);?>
                        <!-- card body -->   
                        </div>
                    </div>
                <!-- Third Column alarm 4 panel 5 -->
                </div>

                <!-- Third Column alarm 4 panel 6 -->
                <div id="collapseCautionAlarmData06" class="collapse col-lg-6">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="information"></div>
                            <h3>Patients:</h3>
                            <?php _tableInfo($numAlarm_4_6,$alarm_4_6);?>
                        <!-- card body -->   
                        </div>
                    </div>
                <!-- Third Column alarm 4 panel 6 -->
                </div>

                <!-- Third Column alarm 5 panel 1 -->
                <div id="collapseDangerAlarmData01" class="collapse col-lg-6">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="information"></div>
                            <h3>Patients:</h3>
                            <?php _tableInfo($numAlarm_5_1,$alarm_5_1);?>
                        <!-- card body -->   
                        </div>
                    </div>
                <!-- Third Column alarm 5 panel 1 -->
                </div>

                <!-- Third Column alarm 5 panel 2 -->
                <div id="collapseDangerAlarmData02" class="collapse col-lg-6">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="information"></div>
                            <h3>Patients:</h3>
                            <?php _tableInfo($numAlarm_5_2,$alarm_5_2);?>
                        <!-- card body -->   
                        </div>
                    </div>
                <!-- Third Column alarm 5 panel 2 -->
                </div>

                <!-- Third Column alarm 5 panel 3 -->
                <div id="collapseDangerAlarmData03" class="collapse col-lg-6">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="information"></div>
                            <h3>Patients:</h3>
                            <?php _tableInfo($numAlarm_5_3,$alarm_5_3);?>
                        <!-- card body -->   
                        </div>
                    </div>
                <!-- Third Column alarm 5 panel 3 -->
                </div>

            </div>
            <!-- Content Row  -->
        </div>
        <!-- /.container-fluid -->            

<?php

        require_once(SKEL_DIR . "/bodyEnd.php");

        require_once(SKEL_DIR . "/pie.php");

    }
?>