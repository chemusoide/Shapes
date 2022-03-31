<?php

    // Begin - Para mostrar errores PHP en Modo DEBUG -> Comentar para producción
    // error_reporting(E_ALL);
    // ini_set('display_errors', '1');
    // End - Para mostrar errores PHP en Modo DEBUG -> Comentar para producción

    if (defined("SECURITY_CONSTANT")) {

        $bodyId = "patient_file";
        $pageTitle = "Patient information";

        require_once(SKEL_DIR . "/cabecera.php");
        
        require_once(SKEL_DIR . "/headStart.php");
        
        require_once(SKEL_DIR . "/headEnd.php");
        
        require_once(SKEL_DIR . "/bodyStart.php");
        
        require_once(SKEL_DIR . "/sidebar.php");
        
        require_once(SKEL_DIR . "/contentWrapper.php");

        //$num_patients_historics = count($patients_historics);

        // Guardamos en un array los datos del historico de pacientes ordenados de más modernos a más viejos
        // por tanto el valor 0 es el último valor registrado y el valor num_patients_historics -1  es el primero.
        /*
        for ($i = 0; $i < $num_patients_historics; $i++) {

            (object)$patients_historics[$i];

        } // End For
*/

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

        //var_dump ($patients_lab_analytics);
    
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

        $action = "index.php?controller=patients&amp;";
        if ( isset($patients) ) {
        	
        	$action = $action . "option=modify";
            
        }

?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"> ID Patient: <?php echo $patients -> getIdString() ?></h1>

            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $pageTitle ?></h6>
                </div>
                <div class="card-body">
                    <div class="row">
                       
                        <form method="post" action="<?php  echo $action ?>">
                            <input type="hidden" name="id_patient" value = "<?php if ( isset($patients) ) { echo $patients -> getId(); } ?>" />
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input class="form-control" type="text" placeholder="Age" name="older_person_birth" id="age" value="<?php if ( isset($patients) ) { echo $patients -> getOlderPersonBirth(); } ?>">
                            </div>

                             <?php // DEBUG $sex = $patients -> getOlderPersonSex(); echo "<h1> $sex </h1>";?>
                            <div class="form-group">
                                <label for="age">Gender</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="older_person_sex" id="gender1" value="0" <?php  if ( isset($patients) && $patients -> getOlderPersonSex() == "0") { echo "checked"; }  ?>>
                                    <label class="form-check-label" for="gender1">
                                        Female
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="older_person_sex" id="gender2" value="1" <?php  if ( isset($patients) && $patients -> getOlderPersonSex() == "1") { echo "checked"; }  ?>>
                                    <label class="form-check-label" for="gender2">
                                        Male
                                    </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="smoking_status">Smoking Status</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="smoking" id="smoking1" value="1" <?php  if ( isset($patients_historics) && $patients_historics -> getSmokingStatus() == "1") { echo "checked"; }  ?>>
                                    <label class="form-check-label" for="smoking1">
                                        Smoker
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="smoking" id="smoking2" value="2" <?php  if ( isset($patients_historics) && $patients_historics -> getSmokingStatus() == "2") { echo "checked"; }  ?>>
                                    <label class="form-check-label" for="smoking2">
                                        Not smoker
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="smoking" id="smoking3" value="3" <?php  if ( isset($patients_historics) && $patients_historics -> getSmokingStatus() == "3") { echo "checked"; }  ?>>
                                    <label class="form-check-label" for="smoking3">
                                        Ex-smoker
                                    </label>
                                    </div>
                                </div>
                            </div>

                            <? var_dump($patients_devices_w);?>
                            <div class="form-group">
                                <label for="weight">Weight (Kg)</label>
                                <input class="form-control" type="text" placeholder="Kg" name="weight" id="weight" value = "<?php echo $last_weigh; ?>">
                            </div>

                            <div class="form-group">
                                <label for="height">Height (Cm)</label>
                                <input class="form-control" type="text" placeholder="Cm" name="height" id="height" value = "<?php if ( isset($patients_historics) ) { echo $patients_historics -> getHeight(); } ?>">
                            </div>

                            <div class="form-group">
                                <label for="heart_disease">Heart Disease</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="heart_disease" id="heart_disease0" value="0" <?php  if ( isset($patients_historics) && $patients_historics -> getHeartDiseaseType() == "0") { echo "checked"; }  ?>>
                                        <label class="form-check-label" for="heart_disease0">
                                            isq
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="heart_disease" id="heart_disease1" value="1" <?php  if ( isset($patients_historics) && $patients_historics -> getHeartDiseaseType() == "1") { echo "checked"; }  ?>>
                                        <label class="form-check-label" for="heart_disease1">
                                            valv
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="heart_disease" id="heart_disease2" value="2" <?php  if ( isset($patients_historics) && $patients_historics -> getHeartDiseaseType() == "2") { echo "checked"; }  ?>>
                                        <label class="form-check-label" for="heart_disease2">
                                            HTA
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="heart_disease" id="heart_disease3" value="3" <?php  if ( isset($patients_historics) && $patients_historics -> getHeartDiseaseType() == "3") { echo "checked"; }  ?>>
                                        <label class="form-check-label" for="heart_disease3">
                                            idiop
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="heart_disease" id="heart_disease4" value="4" <?php  if ( isset($patients_historics) && $patients_historics -> getHeartDiseaseType() == "4") { echo "checked"; }  ?>>
                                        <label class="form-check-label" for="heart_disease4">
                                            others
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="urea">Urea level</label>
                                <input class="form-control" type="text" name="urea" placeholder="urea" id="urea" value = "<?php echo $u[0]; ?>">
                            </div>

                            <div class="form-group">
                                <label for="creatine">Creatine level</label>
                                <input class="form-control" type="text" name="creatine" placeholder="creatine" id="creatine" value = "<?php echo $c[0]; ?>">
                            </div>

                            <div class="form-group">
                                <label for="sodium">Sodium level</label>
                                <input class="form-control" type="text" name="sodium" placeholder="sodium" id="sodium" value = "<?php echo $s[0]; ?>">
                            </div>

                            <div class="form-group">
                                <label for="potassium">Potassium level</label>
                                <input class="form-control" type="text" name="potassium" placeholder="potassium" id="potassium" value = "<?php echo $p[0]; ?>">
                            </div>

                            <div class="form-group">
                                <label for="haemoglobin">Haemoglobin level</label>
                                <input class="form-control" type="text" name="haemoglobin" placeholder="haemoglobin" id="haemoglobin" value = "<?php echo $h[0]; ?>">
                            </div>

                            <?php $non_hf_value = $patients_historics -> getNonHf(); ?>
                            <div class="form-group">
                                <label for="non_hf">Non HF</label>
                                <select class="form-control" name="non_hf" id="non_hf">
                                    <option <?php if ($non_hf_value == "A"){echo "selected=\"selected\"";}?> value="A">Peripheral VD</option>
                                    <option <?php if ($non_hf_value == "B"){echo "selected=\"selected\"";}?> value="B">Cereblar VD</option>
                                    <option <?php if ($non_hf_value == "C"){echo "selected=\"selected\"";}?> value="C">COPD</option>
                                    <option <?php if ($non_hf_value == "D"){echo "selected=\"selected\"";}?>value="D">Diabetes Mellitus</option>
                                    <option <?php if ($non_hf_value == "E"){echo "selected=\"selected\"";}?>value="E">Cancer</option>
                                    <option <?php if ($non_hf_value == "F"){echo "selected=\"selected\"";}?>value="F">Neurodegenerative disease</option>
                                    <option <?php if ($non_hf_value == "G"){echo "selected=\"selected\"";}?>value="G">Supplemental oxygen</option>
                                    <option <?php if ($non_hf_value == "H"){echo "selected=\"selected\"";}?>value="H">Chronic kidney</option>
                                    <option <?php if ($non_hf_value == "I"){echo "selected=\"selected\"";}?>value="I">Heart attack</option>
                                    <option <?php if ($non_hf_value == "J"){echo "selected=\"selected\"";}?>value="J">Hypertension</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="barthel_index">Barthel <?php echo "($patients_barthel_date_dd_mm_yyyy_raw[0])";?></label>
                                <input class="form-control" type="text" placeholder="barthel index" name="barthel" id="barthel_index" value = "<?php echo $patients_barthel_score[0]; ?>">
                            </div>

                            <div class="form-group">
                                <label for="gijon">Gijon <?php echo "($patients_gijon_date_dd_mm_yyyy_raw[0])";?></label>
                                <input class="form-control" type="text" placeholder="gijon index" name="gijon" id="gijon_index" value = "<?php echo $patients_gijon_score[0]; ?>">
                            </div>

                            <div class="form-group">
                                <label for="ecfscbs">ECFScBS <?php echo "($patients_ecfs_date_dd_mm_yyyy_raw[0])";?></label>
                                <input class="form-control" type="text" placeholder="ecfscbs index" name="ecfscbs" id="ecfscbs_index" value = "<?php echo $patients_ecfs_score[0]; ?>">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                    <!-- /.card-row -->
                    
                </div> 
                <!-- /.card-body -->      
            </div>
            <!-- /.card-shadow -->
        </div>
        <!-- /.container-fluid -->            

<?php

        require_once(SKEL_DIR . "/bodyEnd.php");

        require_once(SKEL_DIR . "/pie.php");

    }
?>