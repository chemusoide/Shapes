<?php

    if (defined("SECURITY_CONSTANT")) {

        $bodyId = "patient_p1";
        $pageTitle = "Medical History";

        require_once(SKEL_DIR . "/cabecera.php");
        
        require_once(SKEL_DIR . "/headStart.php");
        
        require_once(SKEL_DIR . "/headEnd.php");
        
        require_once(SKEL_DIR . "/bodyStart.php");
        
        require_once(SKEL_DIR . "/sidebar.php");
        
        require_once(SKEL_DIR . "/contentWrapper.php");

        require_once("patient_functions.php");

        $num_patients_historics = count($patients_historics);

        //var_dump ($patients_historics);

        if ( isset($patients) ) {
            
            $id_patient = $patients -> getIdString();

        } // end if

        if ( isset($patients_historics) ) {
            

            //var_dump($patients_historics);
            if ($patients_historics -> getHeight() != NULL){
                $height = $patients_historics -> getHeight();
            }else{
                $height = "No Data";
            } // End if

            if ($patients -> getInitialWeight() != NULL){
                $initial_weight = $patients -> getInitialWeight();
            }else{
                $initial_weight = "No Data";
            } // End if

            if ($patients -> getOlderPersonSex() != NULL){
                $older_person_sex = $patients -> getOlderPersonSex();

                if ($older_person_sex == 1){

                    $sex = "M";

                }else{

                    $sex = "F";

                } // End if

            }else{
                $older_person_sex = "No Data";
            } // End if

            if ($patients -> getOlderPersonBirth() != NULL){
                $older_person_Birth = $patients -> getOlderPersonBirth();
                $edad = obtener_edad_segun_fecha ($older_person_Birth);
            }else{
                $older_person_Birth = "No Data";
            } // End if

            if ($patients_historics -> getLeftVentricularEjectionFraction() != NULL){
                $lvef = $patients_historics -> getLeftVentricularEjectionFraction();
            }else{
                $lvef = "No Data";
            } // End if

            if ( $patients_historics -> getHeartRhythm() == 1){
                $heart_rhythm = "SINUSAL";
            }elseif ($patients_historics -> getHeartRhythm() == 2){
                $heart_rhythm = "NO SINUSAL";
            }else {
                $heart_rhythm = "No Data";
            }

            if ( $patients_historics -> getHeartRhythmAtrialFibrillation() == "y"){
                $heart_rhythmAF = "YES";
            }elseif ($patients_historics -> getHeartRhythmAtrialFibrillation() == "n"){
                $heart_rhythmAF = "NO";
            }else {
                $heart_rhythmAF = "No Data";
            } // End if

            if ( $patients_historics -> getHeartRhythmFlutter() == "y"){
                $heart_rhythmF = "YES";
            }elseif ($patients_historics -> getHeartRhythmFlutter() == "n"){
                $heart_rhythmF = "NO";
            }else {
                $heart_rhythmF = "No Data";
            } // End if

            $device = $patients_historics -> getDeviceType();

            switch ($device){

                case 1:
                    $device_type = "Does not carry";
                    break;

                case 2:
                    $device_type = "MCP";
                    break;
                
                case 3:
                    $device_type = "DAI";
                    break;

                case 4:
                    $device_type = "TRC";
                    break;

                case 5:
                    $device_type = "DAI-TRC";
                    break;
                
                default:
                    $device_type = "No Data";

            } // End Switch


            $heart_disease = $patients_historics -> getHeartDiseaseType();

            switch ($heart_disease){

                case 0:
                    $heart_disease_type = "Ischaemic heart disease";
                    break;

                case 1:
                    $heart_disease_type = "Valvular heart disease";
                    break;
                
                case 2:
                    $heart_disease_type = "Hypertensive heart disease";
                    break;

                case 3:
                    $heart_disease_type = "Idiopathic heart disease";
                    break;

                case 4:
                    $heart_disease_type = "Others";
                    break;

                default:
                    $heart_disease_type = "No Data";

            } // End Switch

            if ($patients_historics -> getHeartDiseaseTypeOther() != NULL){
                $hdto = $patients_historics -> getHeartDiseaseTypeOther();
            }else{
                $hdto = "No Data";
            } // End if

            if ($patients_historics -> getHfDiagnosisYear() != NULL){
                $diagnostic_hf_year= $patients_historics -> getHfDiagnosisYear();
            }else{
                $diagnostic_hf_year = "No Data";
            } // End if
            
            $year_source_diagnosis = $patients_historics -> getHfDiagnosisYearSource();

            switch ($year_source_diagnosis){

                case "A":
                    $year_source_diagnosis_value = "Medical record";
                    break;

                case "B":
                    $year_source_diagnosis_value = "Older person";
                    break;
                
                case "C":
                    $year_source_diagnosis_value = "Caregiver";
                    break;

                case "D":
                    $year_source_diagnosis_value = "Other";
                    break;

                default:
                    $year_source_diagnosis_value = "No Data";

            } // End Switch

            if ($patients_historics -> getHfStageSymptomatology() != NULL){
                $hf_symptomatology = $patients_historics -> getHfStageSymptomatology();
            }else{
                $hf_symptomatology = "No Data";
            } // End if
            //echo "AÑO: $diagnostic_hf_year";
            $year_with_hf = date('Y') - $diagnostic_hf_year;


            $non_hf_periherla_vd = nonhfvalue($patients_historics -> getNonHfPeriherlaVd());
            $non_hf_cerebral_vd = nonhfvalue($patients_historics -> getNonHfCerebralVd());
            $non_hf_COPD = nonhfvalue($patients_historics -> getNonHfCOPD());
            $non_hf_supplemental_oxygen = nonhfvalue($patients_historics -> getNonHfSupplementalOxygen());
            $non_hf_diabetes_melitus = nonhfvalue($patients_historics -> getNonHfDiabetesMelitus());
            $non_hf_chronic_renal = nonhfvalue($patients_historics -> getNonHfChronicRenal());

            if ($patients_historics -> getNonHfYear() != NULL){
                $date_non_hf = $patients_historics -> getNonHfYear();
                $date_non_hf_parts = explode ("-", $date_non_hf);
                $year_non_hf = $date_non_hf_parts[0];
            }else{
                $year_non_hf = "No Data";
            } // End if

                $yearsuntilnow = date('Y') - $year_non_hf;

            if ($patients_historics -> getMedicalConditionsOther() != NULL){
                $other_relevant_medical_conditions = $patients_historics -> getMedicalConditionsOther();
            }else{
                $other_relevant_medical_conditions = "No Data";
            } // End if

            if ($patients_historics -> getMedicalConditionsNumber() != NULL){
                $no_medical_conditions = $patients_historics -> getMedicalConditionsNumber();
            }else{
                $no_medical_conditions = "No Data";
            } // End if
            
            if ($patients_historics -> getDyspnoeaLevel() != NULL){
                $dyspnoealevel = $patients_historics -> getDyspnoeaLevel();
            }else{
                $dyspnoealevel = "No Data";
            } // End if

            $smoking_status = $patients_historics -> getSmokingStatus();

            switch ($smoking_status){

                case "0":
                    $smoking_status_value = "Never Smoker";
                    break;

                case "1":
                    $smoking_status_value = "Current Smoker";
                    break;
                
                case "2":
                    $smoking_status_value = "Ex-Smoker";
                    break;

                default:
                    $smoking_status_value = "No Data";

            } // End Switch

            if ( $patients_historics -> getStopWalking() == 0){
                $stop_walking = "NO";
            }elseif ($patients_historics -> getStopWalking() == 1){
                $stop_walking = "YES";
            }else {
                $stop_walking = "No Data";
            }

        } // end if isset patients_historics

        if ( isset($patients_data) ) {

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
            

        } else{

            $last_weigh = "No weigh data";

        } //End if

        // echo "ID PATIENT: $id_patient";
        // echo "HEIGHT: $height";
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"> ID Patient: <?php  echo $id_patient ?></h1>

            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $pageTitle ?></h6>
                </div>
                <div class="card-body">
                    <div class="row">

                    <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    AGE
                                </div>
                                <div class="card-body">
                                    <?php echo "$edad  years (born $older_person_Birth)"?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    SEX
                                </div>
                                <div class="card-body">
                                    <?php echo $sex ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    HEIGHT
                                </div>
                                <div class="card-body">
                                    <?php echo $height ?> cm
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">    
                            <div class="card mb-4">
                                <div class="card-header">
                                    INITIAL WEIGH
                                </div>
                                <div class="card-body">
                                    <?php echo $initial_weight ?> Kg
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">    
                            <div class="card mb-4">
                                <div class="card-header">
                                    CURRENT WEIGH
                                </div>
                                <div class="card-body">
                                    <?php echo $last_weigh ?> Kg
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    LEFT VENTRICULAR EJECTION FRACTION
                                </div>
                                <div class="card-body">
                                    <?php echo $lvef ?> %
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    HEART RHYTHM
                                </div>
                                <div class="card-body">
                                    <?php  echo $heart_rhythm ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    DEVICE TYPE
                                </div>
                                <div class="card-body">

                                    <?php echo $device_type; ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    TYPE OF HEART DISEASE
                                </div>
                                <div class="card-body">

                                    <?php echo $heart_disease_type; ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    YEARS WITH HF
                                </div>
                                <div class="card-body">
                                    <?php echo "$yearsuntilnow years from <i>$year_non_hf</i>"; ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    NON HF, PERIHERLA VD
                                </div>
                                <div class="card-body">
                                    <?php echo $non_hf_periherla_vd;?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    NON HF, CEREBRAL VD
                                </div>
                                <div class="card-body">
                                    <?php echo $non_hf_cerebral_vd;?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    NON HF, COPD
                                </div>
                                <div class="card-body">
                                    <?php echo $non_hf_COPD;?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    NON HF, SUPPLEMENTAL OXYGEN
                                </div>
                                <div class="card-body">
                                    <?php echo $non_hf_supplemental_oxygen;?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    NON HF, DIABETES MELITUS
                                </div>
                                <div class="card-body">
                                    <?php echo $non_hf_diabetes_melitus;?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    NON HF, CHRONIC RENAL
                                </div>
                                <div class="card-body">
                                    <?php echo $non_hf_chronic_renal;?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    SMOKING STATUS
                                </div>
                                <div class="card-body">
                                    <?php echo $smoking_status_value ?>
                                </div>
                            </div>
                        </div>

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