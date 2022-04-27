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

        $num_patients_historics = count($patients_historics);

?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"> ID Patient: <?php echo $patients->getIdString() ?></h1>

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
                                    HEIGHT
                                </div>
                                <div class="card-body">
                                    <?php echo $patients_historics -> getHeight() ?> cm
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">    
                            <div class="card mb-4">
                                <div class="card-header">
                                    CURRENT WEIGH
                                </div>
                                <div class="card-body">
                                   <?php 
                                    
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
                                    echo "$last_weigh Kg";
                                   ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    LEFT VENTRICULAR EJECTION FRACTION
                                </div>
                                <div class="card-body">
                                    <?php echo $patients_historics -> getLeftVentricularEjectionFraction() ?> %
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    HEART RHYTHM
                                </div>
                                <div class="card-body">
                                    <?php 
                                    if ( $patients_historics -> getHeartRhythm() == "S"){
                                        $heart_rhythm = "SINUSUAL";
                                    }elseif ($patients_historics[0] -> getHeartRhythm() == "N"){
                                        $heart_rhythm = "NO SINUSUAL";
                                    }else {
                                        $heart_rhythm = "Input Data Error";
                                    }
                                    echo $heart_rhythm;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    HEART RHYTHM - ATRIAL FIBRILLATION
                                </div>
                                <div class="card-body">
                                    <?php 
                                    if ( $patients_historics -> getHeartRhythmAtrialFibrillation() == "y"){
                                        $heart_rhythm = "YES";
                                    }elseif ($patients_historics -> getHeartRhythmAtrialFibrillation() == "n"){
                                        $heart_rhythm = "NO";
                                    }else {
                                        $heart_rhythm = "Input Data Error";
                                    }
                                    echo $heart_rhythm;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    HEART RHYTHM - FLUTTER
                                </div>
                                <div class="card-body">
                                    <?php 
                                    if ( $patients_historics -> getHeartRhythmFlutter() == "y"){
                                        $heart_rhythm = "YES";
                                    }elseif ($patients_historics -> getHeartRhythmFlutter() == "n"){
                                        $heart_rhythm = "NO";
                                    }else {
                                        $heart_rhythm = "Input Data Error";
                                    }
                                    echo $heart_rhythm;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    DEVICE TYPE
                                </div>
                                <div class="card-body">

                                    <?php 
                                    $device = $patients_historics -> getDeviceType();

                                    switch ($device){

                                        case "n":
                                            $device_type = "Does not carry";
                                            break;

                                        case "a":
                                            $device_type = "MCP";
                                            break;
                                        
                                        case "b":
                                            $device_type = "DAI";
                                            break;

                                        case "c":
                                            $device_type = "TRC";
                                            break;

                                        case "d":
                                            $device_type = "DAI-TRC";
                                            break;
                                        
                                        default:
                                        echo "Input Data Error";

                                    } // End Switch
                             
                                    echo $device_type;

                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    TYPE OF HEART DISEASE
                                </div>
                                <div class="card-body">

                                    <?php 
                                    $heart_disease = $patients_historics -> getHeartDiseaseType();

                                    switch ($heart_disease){

                                        case "A":
                                            $heart_disease_type = "Ischaemic heart disease";
                                            break;

                                        case "B":
                                            $heart_disease_type = "Valvular heart disease";
                                            break;
                                        
                                        case "C":
                                            $heart_disease_type = "Hypertensive heart disease";
                                            break;

                                        case "D":
                                            $heart_disease_type = "Idiopathic heart disease";
                                            break;

                                        case "E":
                                            $heart_disease_type = "Others";
                                            break;

                                        default:
                                        echo "Input Data Error";

                                    } // End Switch
                             
                                    echo $heart_disease_type;

                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    OTHER TYPE OF HEART DISEASE
                                </div>
                                <div class="card-body">
                                    <?php 
                                    echo $patients_historics -> getHeartDiseaseTypeOther();
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    YEAR OF DIAGNOSIS OF 'HF'
                                </div>
                                <div class="card-body">
                                    <?php 
                                    $diagnostic_hf_year= $patients_historics -> getHfDiagnosisYear();
                                    echo $diagnostic_hf_year;
                                    ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    SOURCE DATA OF 'YEARS OF DIAGNOSIS OF HF'
                                </div>
                                <div class="card-body">

                                    <?php 
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
                                        echo "Input Data Error";

                                    } // End Switch
                             
                                    echo $year_source_diagnosis_value;

                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    YEARS WITH HF
                                </div>
                                <div class="card-body">
                                    <?php 
                                    $year_with_hf = date('Y') - $diagnostic_hf_year;
                                    echo $year_with_hf;
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    HEART FAILURE STAGE (SYMPTOMATOLOGY)
                                </div>
                                <div class="card-body">
                                    <?php
                                    $hf_symptomatology = $patients_historics -> getHfStageSymptomatology();
                                    echo $hf_symptomatology;
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    LIST OF RELEVANT, NON HF, MEDICAL CONDITIONS
                                </div>
                                <div class="card-body">

                                    <?php 
                                    $non_hf = $patients_historics -> getNonHf();

                                    switch ($non_hf){

                                        case "A":
                                            $non_hf_value = "Peripheral vascular disease (PVD)";
                                            break;

                                        case "B":
                                            $non_hf_value = "Cerebral vascular disease (both ischemia and hemorrhage)";
                                            break;
                                        
                                        case "C":
                                            $non_hf_value = "COPD";
                                            break;

                                        case "D":
                                            $non_hf_value = "Diabetes Mellitus";
                                            break;

                                        case "E":
                                            $non_hf_value = "Cancer";
                                            break;

                                        case "F":
                                            $non_hf_value = "Neurodegenerative disease";
                                            break;

                                        case "G":
                                            $non_hf_value = "Supplemental oxygen";
                                            break;

                                        case "H":
                                            $non_hf_value = "Chronic kidney disease";
                                            break;

                                        case "I":
                                            $non_hf_value = "Heart attack";
                                            break;

                                        case "J":
                                            $non_hf_value = "Hypertension";
                                            break;

                                        default:
                                            echo "Input Data Error";

                                    } // End Switch
                             
                                    echo $non_hf_value;

                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    YEARS OF DIAGNOSIS/EVEN OF NON-HF MEDICAL CONDITIONS
                                </div>
                                <div class="card-body">
                                    <?php 
                                    $date_non_hf = $patients_historics -> getNonHfYear();
                                    $date_non_hf_parts = explode ("-", $date_non_hf);
                                    $year_non_hf = $date_non_hf_parts[0];
                                    echo $year_non_hf 
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    OTHER RELEVANT MEDICAL CONDITIONS AND DATA
                                </div>
                                <div class="card-body">
                                    <?php
                                    $other_relevant_medical_conditions = $patients_historics -> getMedicalConditionsOther();
                                    echo $other_relevant_medical_conditions;
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    NO. OF MEDICAL CONDITIONS
                                </div>
                                <div class="card-body">
                                    <?php
                                    $no_medical_conditions = $patients_historics -> getMedicalConditionsNumber();
                                    echo $no_medical_conditions;
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    DYSNOEA LEVER
                                </div>
                                <div class="card-body">
                                    <?php
                                    $dyspnoealevel = $patients_historics -> getDyspnoeaLevel();
                                    echo $dyspnoealevel;
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    SMOKING STATUS
                                </div>
                                <div class="card-body">

                                    <?php 
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
                                        echo "Input Data Error";

                                    } // End Switch
                             
                                    echo $smoking_status_value;

                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    RESPONSE TO STOPS WALKINGS
                                </div>
                                <div class="card-body">
                                    
                                    <?php 
                                    if ( $patients_historics -> getStopWalking() == 0){
                                        $stop_walking = "NO";
                                    }elseif ($patients_historics -> getStopWalking() == 1){
                                        $stop_walking = "YES";
                                    }else {
                                        $stop_walking = "Input Data Error";
                                    }
                                    echo $stop_walking;
                                    ?>

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