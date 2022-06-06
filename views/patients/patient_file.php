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
        
        require_once("patient_blocks.php");
        //require_once("patient_functions.php");

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

                            <div class="form-group">
                                <label for="heart_rhythm">Heart Rhythm</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="heart_rhythm" id="heart_rhythm1" value="1" <?php  if ( isset($patients_historics) && $patients_historics -> getHeartRhythm() == "1") { echo "checked"; }  ?>>
                                    <label class="form-check-label" for="heart_rhythm1">
                                        Sinusual
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="heart_rhythm" id="heart_rhythm2" value="2" <?php  if ( isset($patients_historics) && $patients_historics -> getHeartRhythm() == "2") { echo "checked"; }  ?>>
                                    <label class="form-check-label" for="heart_rhythm2">
                                        No Sinusual
                                    </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="device_form">Device Type</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="device_type" id="device1" value=1 <?php  if ( isset($patients_historics) && $patients_historics -> getDeviceType() == "1") { echo "checked"; }  ?>>
                                    <label class="form-check-label" for="device1">
                                        Does not carry
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="device_type" id="device2" value=2 <?php  if ( isset($patients_historics) && $patients_historics -> getDeviceType() == "2") { echo "checked"; }  ?>>
                                    <label class="form-check-label" for="device2">
                                        MCP
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="device_type" id="device3" value=3 <?php  if ( isset($patients_historics) && $patients_historics -> getDeviceType() == "3") { echo "checked"; }  ?>>
                                    <label class="form-check-label" for="device3">
                                        DAI
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="device_type" id="device4" value=4 <?php  if ( isset($patients_historics) && $patients_historics -> getDeviceType() == "4") { echo "checked"; }  ?>>
                                    <label class="form-check-label" for="device4">
                                        TRC
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="device_type" id="device5" value=5 <?php  if ( isset($patients_historics) && $patients_historics -> getDeviceType() == "5") { echo "checked"; }  ?>>
                                    <label class="form-check-label" for="device5">
                                        DAI-TRC
                                    </label>
                                    </div>
                                </div>
                            </div>

                            <? //var_dump($patients_devices_w);?>
                            <div class="form-group">
                                <label>Current weight <?php echo $last_weigh; ?>kg</label><br>
                                <label for="weight">Initial Weight (Kg) </label>
                                <input class="form-control" type="text" placeholder="Kg" name="initial_weight" id="initial_weight" value = "<?php if ( isset($patients) ) { echo $patients -> getInitialWeight();} ?>">
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
                                            Ischaemic heart disease
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="heart_disease" id="heart_disease1" value="1" <?php  if ( isset($patients_historics) && $patients_historics -> getHeartDiseaseType() == "1") { echo "checked"; }  ?>>
                                        <label class="form-check-label" for="heart_disease1">
                                            Valvular heart disease
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="heart_disease" id="heart_disease2" value="2" <?php  if ( isset($patients_historics) && $patients_historics -> getHeartDiseaseType() == "2") { echo "checked"; }  ?>>
                                        <label class="form-check-label" for="heart_disease2">
                                            Hypertensive heart disease
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="heart_disease" id="heart_disease3" value="3" <?php  if ( isset($patients_historics) && $patients_historics -> getHeartDiseaseType() == "3") { echo "checked"; }  ?>>
                                        <label class="form-check-label" for="heart_disease3">
                                            Diopathic heart disease
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="heart_disease" id="heart_disease4" value="4" <?php  if ( isset($patients_historics) && $patients_historics -> getHeartDiseaseType() == "4") { echo "checked"; }  ?>>
                                        <label class="form-check-label" for="heart_disease4">
                                            Others
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lvef">Left ventricular ejection fraction</label>
                                <input class="form-control" type="text" placeholder="%" name="left_ventricular_ejection_fraction" id="left_ventricular_ejection_fraction" value="<?php if ( isset($patients_historics) ) { echo $patients_historics -> getLeftVentricularEjectionFraction(); } ?>">
                            </div>

                            <div class="form-group">
                                <label for="age">Years with HF</label>
                                <input class="form-control" type="text" placeholder="yyyy-mm-dd" name="non_hf_year" id="non_hf_year" value="<?php if ( isset($patients_historics) ) { echo $patients_historics -> getNonHfYear(); } ?>">
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

                            <?php
                            $non_hf_periherla_vd_value = $patients_historics -> getNonHfPeriherlaVd();
                            $non_hf_cerebral_vd_value = $patients_historics -> getNonHfCerebralVd();
                            $non_hf_COPD_value = $patients_historics -> getNonHfCOPD();
                            $non_hf_supplemental_oxygen_value = $patients_historics -> getNonHfSupplementalOxygen();
                            $non_hf_diabetes_melitus_value =$patients_historics -> getNonHfDiabetesMelitus();
                            $non_hf_chronic_renal_value = $patients_historics -> getNonHfChronicRenal();
                            ?>

                            <div class="form-group">
                                <label for="non_hf_periherla_vd_value">Periherla VD</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="non_hf_periherla_vd" id="periherla_vd1" value="0" <?php  if ( $non_hf_periherla_vd_value == "0") { echo "checked"; }  ?>>
                                    <label class="form-check-label" for="periherla_vd1">
                                        NO
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="non_hf_periherla_vd" id="periherla_vd2" value="1" <?php  if ( $non_hf_periherla_vd_value == "1") { echo "checked"; }  ?>>
                                    <label class="form-check-label" for="periherla_vd2">
                                        YES
                                    </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="non_hf_cerebral_vd_value">Cerebral VD</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="non_hf_cerebral_vd" id="cerebral_vd1" value="0" <?php  if ( $non_hf_cerebral_vd_value == "0") { echo "checked"; }  ?>>
                                    <label class="form-check-label" for="cerebral_vd1">
                                        NO
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="non_hf_cerebral_vd" id="cerebral_vd2" value="1" <?php  if ( $non_hf_cerebral_vd_value == "1") { echo "checked"; }  ?>>
                                    <label class="form-check-label" for="cerebral_vd2">
                                        YES
                                    </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="non_hf_COPD_value">COPD</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="non_hf_COPD" id="copd1" value="0" <?php  if ( $non_hf_COPD_value == "0") { echo "checked"; }  ?>>
                                    <label class="form-check-label" for="copd1">
                                        NO
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="non_hf_COPD" id="copd2" value="1" <?php  if ( $non_hf_COPD_value == "1") { echo "checked"; }  ?>>
                                    <label class="form-check-label" for="copd2">
                                        YES
                                    </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="non_hf_supplemental_oxygen_value">Supplemental Oxygen</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="non_hf_supplemental_oxygen" id="oxygen1" value="0" <?php  if ( $non_hf_supplemental_oxygen_value == "0") { echo "checked"; }  ?>>
                                    <label class="form-check-label" for="oxygen1">
                                        NO
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="non_hf_supplemental_oxygen" id="oxygen2" value="1" <?php  if ( $non_hf_supplemental_oxygen_value == "1") { echo "checked"; }  ?>>
                                    <label class="form-check-label" for="oxygen2">
                                        YES
                                    </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="non_hf_diabetes_melitus_value">Diabetes Melitus</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="non_hf_diabetes_melitus" id="diabetes1" value="0" <?php  if ( $non_hf_diabetes_melitus_value == "0") { echo "checked"; }  ?>>
                                    <label class="form-check-label" for="diabetes1">
                                        NO
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="non_hf_diabetes_melitus" id="diabetes2" value="1" <?php  if ( $non_hf_diabetes_melitus_value == "1") { echo "checked"; }  ?>>
                                    <label class="form-check-label" for="diabetes2">
                                        YES
                                    </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="non_hf_chronic_renal_value">Chronic kidney disease</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="non_hf_chronic_renal" id="renal1" value="0" <?php  if ( $non_hf_chronic_renal_value == "0") { echo "checked"; }  ?>>
                                    <label class="form-check-label" for="renal1">
                                        NO
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="non_hf_chronic_renal" id="renal2" value="1" <?php  if ( $non_hf_chronic_renal_value == "1") { echo "checked"; }  ?>>
                                    <label class="form-check-label" for="renal2">
                                        YES
                                    </label>
                                    </div>
                                </div>
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