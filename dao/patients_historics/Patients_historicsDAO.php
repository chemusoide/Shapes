<?php

    require_once(DAO_DIR . "/GeneralDAO.php");
    require_once("Patients_historicsData.php");

    /**
     * 
     * Enter description here ...
     * @author Chema
     *
     */
    class Patients_historicsDAO {
    
        /**
         * Enter description here ...
         * @return Ambigous <multitype:, Patients_historicsData>
         */
        public function getAllregisters() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute( "SELECT * FROM patients_historics" );
            
            while (!$rs->EOF) {

                $patients_historicsData = new Patients_historicsData();

                $patients_historicsData -> setId($rs -> fields["id"]);
                $patients_historicsData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_historicsData -> setHeight($rs -> fields["height"]);
                $patients_historicsData -> setHeightDate($rs -> fields["height_date"]);
                $patients_historicsData -> setLeftVentricularEjectionFraction($rs -> fields["left_ventricular_ejection_fraction"]);
                $patients_historicsData -> setLeftVentricularEjectionFractionDate($rs -> fields["left_ventricular_ejection_fraction_date"]);
                $patients_historicsData -> setHeartRhythm($rs -> fields["heart_rhythm"]);
                $patients_historicsData -> setHeartRhythmAtrialFibrillation($rs -> fields["heart_rhythm_atrial_fibrillation"]);
                $patients_historicsData -> setHeartRhythmFlutter($rs -> fields["heart_rhythm_flutter"]);
                $patients_historicsData -> setHeartRhythmDate($rs -> fields["heart_rhythm_date"]);
                $patients_historicsData -> setDeviceType($rs -> fields["device_type"]);
                $patients_historicsData -> setDeviceTypeDate($rs -> fields["device_type_date"]);
                $patients_historicsData -> setHeartDiseaseType($rs -> fields["heart_disease_type"]);
                $patients_historicsData -> setHeartDiseaseTypeOther($rs -> fields["heart_disease_type_other"]);
                $patients_historicsData -> setHfDiagnosisYear($rs -> fields["hf_diagnosis_year"]);
                $patients_historicsData -> setHfDiagnosisYearSource($rs -> fields["hf_diagnosis_year_source"]);
                $patients_historicsData -> setHfDiagnosisYearConfidence($rs -> fields["hf_diagnosis_year_confidence"]);
                $patients_historicsData -> setHfStageSymptomatology($rs -> fields["hf_stage_symptomatology"]);
                $patients_historicsData -> setHfStageStructuralAnomaly($rs -> fields["hf_stage_structural_anomaly"]);
                $patients_historicsData -> setHfStageStructuralAnomalyDate($rs -> fields["hf_stage_structural_anomaly_date"]);
                $patients_historicsData -> setNonHf($rs -> fields["non_hf"]);
                $patients_historicsData -> setNonHfPeriherlaVd($rs -> fields["non_hf_periherla_vd"]);
                $patients_historicsData -> setNonHfCerebralVd($rs -> fields["non_hf_cerebral_vd"]);
                $patients_historicsData -> setNonHfCOPD($rs -> fields["non_hf_COPD"]);
                $patients_historicsData -> setNonHfSupplementalOxygen($rs -> fields["non_hf_supplemental_oxygen"]);
                $patients_historicsData -> setNonHfDiabetesMelitus($rs -> fields["non_hf_diabetes_melitus"]);
                $patients_historicsData -> setNonHfChronicRenal($rs -> fields["non_hf_chronic_renal"]);
                $patients_historicsData -> setNonHfYear($rs -> fields["non_hf_year"]);
                $patients_historicsData -> setMedicalConditionsOther($rs -> fields["medical_conditions_other"]);
                $patients_historicsData -> setMedicalConditionsNumber($rs -> fields["medical_conditions_number"]);
                $patients_historicsData -> setDyspnoeaLevel($rs -> fields["dyspnoea_level"]);
                $patients_historicsData -> setSmokingStatus($rs -> fields["smoking_status"]);
                $patients_historicsData -> setStopWalking($rs -> fields["stop_walking"]);
                $patients_historicsData -> setCreateTs($rs -> fields["create_ts"]);
                $patients_historicsData -> setUpdateTs($rs -> fields["update_ts"]);

                $result[] = $patients_historicsData;
                $rs -> MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function

        //Obtenemos todos los registros de un paciente y los guardamos todos
        
        public function getAllRegistersForPatient($id) {

            $db = GeneralDAO::getConnection();
			
            $patients_historicsData = new Patients_historicsData();
            
       		$rs = $db->Execute( "SELECT * FROM patients_historics WHERE id_patient = ? ORDER BY create_ts DESC");
            
            while (!$rs->EOF) {

                $patients_historicsData -> setId($rs -> fields["id"]);
                $patients_historicsData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_historicsData -> setHeight($rs -> fields["height"]);
                $patients_historicsData -> setHeightDate($rs -> fields["height_date"]);
                $patients_historicsData -> setLeftVentricularEjectionFraction($rs -> fields["left_ventricular_ejection_fraction"]);
                $patients_historicsData -> setLeftVentricularEjectionFractionDate($rs -> fields["left_ventricular_ejection_fraction_date"]);
                $patients_historicsData -> setHeartRhythm($rs -> fields["heart_rhythm"]);
                $patients_historicsData -> setHeartRhythmAtrialFibrillation($rs -> fields["heart_rhythm_atrial_fibrillation"]);
                $patients_historicsData -> setHeartRhythmFlutter($rs -> fields["heart_rhythm_flutter"]);
                $patients_historicsData -> setHeartRhythmDate($rs -> fields["heart_rhythm_date"]);
                $patients_historicsData -> setDeviceType($rs -> fields["device_type"]);
                $patients_historicsData -> setDeviceTypeDate($rs -> fields["device_type_date"]);
                $patients_historicsData -> setHeartDiseaseType($rs -> fields["heart_disease_type"]);
                $patients_historicsData -> setHeartDiseaseTypeOther($rs -> fields["heart_disease_type_other"]);
                $patients_historicsData -> setHfDiagnosisYear($rs -> fields["hf_diagnosis_year"]);
                $patients_historicsData -> setHfDiagnosisYearSource($rs -> fields["hf_diagnosis_year_source"]);
                $patients_historicsData -> setHfDiagnosisYearConfidence($rs -> fields["hf_diagnosis_year_confidence"]);
                $patients_historicsData -> setHfStageSymptomatology($rs -> fields["hf_stage_symptomatology"]);
                $patients_historicsData -> setHfStageStructuralAnomaly($rs -> fields["hf_stage_structural_anomaly"]);
                $patients_historicsData -> setHfStageStructuralAnomalyDate($rs -> fields["hf_stage_structural_anomaly_date"]);
                $patients_historicsData -> setNonHf($rs -> fields["non_hf"]);
                $patients_historicsData -> setNonHfPeriherlaVd($rs -> fields["non_hf_periherla_vd"]);
                $patients_historicsData -> setNonHfCerebralVd($rs -> fields["non_hf_cerebral_vd"]);
                $patients_historicsData -> setNonHfCOPD($rs -> fields["non_hf_COPD"]);
                $patients_historicsData -> setNonHfSupplementalOxygen($rs -> fields["non_hf_supplemental_oxygen"]);
                $patients_historicsData -> setNonHfDiabetesMelitus($rs -> fields["non_hf_diabetes_melitus"]);
                $patients_historicsData -> setNonHfChronicRenal($rs -> fields["non_hf_chronic_renal"]);
                $patients_historicsData -> setNonHfYear($rs -> fields["non_hf_year"]);
                $patients_historicsData -> setMedicalConditionsOther($rs -> fields["medical_conditions_other"]);
                $patients_historicsData -> setMedicalConditionsNumber($rs -> fields["medical_conditions_number"]);
                $patients_historicsData -> setDyspnoeaLevel($rs -> fields["dyspnoea_level"]);
                $patients_historicsData -> setSmokingStatus($rs -> fields["smoking_status"]);
                $patients_historicsData -> setStopWalking($rs -> fields["stop_walking"]);
                $patients_historicsData -> setCreateTs($rs -> fields["create_ts"]);
                $patients_historicsData -> setUpdateTs($rs -> fields["update_ts"]);

                $result[] = $patients_historicsData;
                $rs -> MoveNext();

            }
            
            GeneralDAO::closeConnection($db);
            
            return $patients_historicsData;
        } // End function
        
         //Obtenemos todos los registros de un paciente y nos quedamos el último
        public function getRegistersForPatient($id) {

            $db = GeneralDAO::getConnection();
			
            $patients_historicsData = new Patients_historicsData();
            
       		$rs = $db->Execute( "SELECT * FROM patients_historics WHERE id_patient = ? ORDER BY create_ts DESC",
       		    array($id) );
            
            if (!$rs->EOF) {

                $patients_historicsData -> setId($rs -> fields["id"]);
                $patients_historicsData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_historicsData -> setHeight($rs -> fields["height"]);
                $patients_historicsData -> setHeightDate($rs -> fields["height_date"]);
                $patients_historicsData -> setLeftVentricularEjectionFraction($rs -> fields["left_ventricular_ejection_fraction"]);
                $patients_historicsData -> setLeftVentricularEjectionFractionDate($rs -> fields["left_ventricular_ejection_fraction_date"]);
                $patients_historicsData -> setHeartRhythm($rs -> fields["heart_rhythm"]);
                $patients_historicsData -> setHeartRhythmAtrialFibrillation($rs -> fields["heart_rhythm_atrial_fibrillation"]);
                $patients_historicsData -> setHeartRhythmFlutter($rs -> fields["heart_rhythm_flutter"]);
                $patients_historicsData -> setHeartRhythmDate($rs -> fields["heart_rhythm_date"]);
                $patients_historicsData -> setDeviceType($rs -> fields["device_type"]);
                $patients_historicsData -> setDeviceTypeDate($rs -> fields["device_type_date"]);
                $patients_historicsData -> setHeartDiseaseType($rs -> fields["heart_disease_type"]);
                $patients_historicsData -> setHeartDiseaseTypeOther($rs -> fields["heart_disease_type_other"]);
                $patients_historicsData -> setHfDiagnosisYear($rs -> fields["hf_diagnosis_year"]);
                $patients_historicsData -> setHfDiagnosisYearSource($rs -> fields["hf_diagnosis_year_source"]);
                $patients_historicsData -> setHfDiagnosisYearConfidence($rs -> fields["hf_diagnosis_year_confidence"]);
                $patients_historicsData -> setHfStageSymptomatology($rs -> fields["hf_stage_symptomatology"]);
                $patients_historicsData -> setHfStageStructuralAnomaly($rs -> fields["hf_stage_structural_anomaly"]);
                $patients_historicsData -> setHfStageStructuralAnomalyDate($rs -> fields["hf_stage_structural_anomaly_date"]);
                $patients_historicsData -> setNonHf($rs -> fields["non_hf"]);
                $patients_historicsData -> setNonHfPeriherlaVd($rs -> fields["non_hf_periherla_vd"]);
                $patients_historicsData -> setNonHfCerebralVd($rs -> fields["non_hf_cerebral_vd"]);
                $patients_historicsData -> setNonHfCOPD($rs -> fields["non_hf_COPD"]);
                $patients_historicsData -> setNonHfSupplementalOxygen($rs -> fields["non_hf_supplemental_oxygen"]);
                $patients_historicsData -> setNonHfDiabetesMelitus($rs -> fields["non_hf_diabetes_melitus"]);
                $patients_historicsData -> setNonHfChronicRenal($rs -> fields["non_hf_chronic_renal"]);
                $patients_historicsData -> setNonHfYear($rs -> fields["non_hf_year"]);
                $patients_historicsData -> setMedicalConditionsOther($rs -> fields["medical_conditions_other"]);
                $patients_historicsData -> setMedicalConditionsNumber($rs -> fields["medical_conditions_number"]);
                $patients_historicsData -> setDyspnoeaLevel($rs -> fields["dyspnoea_level"]);
                $patients_historicsData -> setSmokingStatus($rs -> fields["smoking_status"]);
                $patients_historicsData -> setStopWalking($rs -> fields["stop_walking"]);
                $patients_historicsData -> setCreateTs($rs -> fields["create_ts"]);
                $patients_historicsData -> setUpdateTs($rs -> fields["update_ts"]);

            }
            
            GeneralDAO::closeConnection($db);
            
            return $patients_historicsData;
        } // End function


        /**
         * Enter description here ...
         * @param unknown_type $id
         * @return Patients_historicsData
         */

        public function getRegister($id) {

            $db = GeneralDAO::getConnection();
			
            $patients_historicsData = new Patients_historicsData();
            
       		$rs = $db->Execute( "SELECT * FROM patients_historics WHERE id_patient = ? ",
       		    array($id) );
            
            if (!$rs->EOF) {

                $patients_historicsData -> setId($rs -> fields["id"]);
                $patients_historicsData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_historicsData -> setHeight($rs -> fields["height"]);
                $patients_historicsData -> setHeightDate($rs -> fields["height_date"]);
                $patients_historicsData -> setLeftVentricularEjectionFraction($rs -> fields["left_ventricular_ejection_fraction"]);
                $patients_historicsData -> setLeftVentricularEjectionFractionDate($rs -> fields["left_ventricular_ejection_fraction_date"]);
                $patients_historicsData -> setHeartRhythm($rs -> fields["heart_rhythm"]);
                $patients_historicsData -> setHeartRhythmAtrialFibrillation($rs -> fields["heart_rhythm_atrial_fibrillation"]);
                $patients_historicsData -> setHeartRhythmFlutter($rs -> fields["heart_rhythm_flutter"]);
                $patients_historicsData -> setHeartRhythmDate($rs -> fields["heart_rhythm_date"]);
                $patients_historicsData -> setDeviceType($rs -> fields["device_type"]);
                $patients_historicsData -> setDeviceTypeDate($rs -> fields["device_type_date"]);
                $patients_historicsData -> setHeartDiseaseType($rs -> fields["heart_disease_type"]);
                $patients_historicsData -> setHeartDiseaseTypeOther($rs -> fields["heart_disease_type_other"]);
                $patients_historicsData -> setHfDiagnosisYear($rs -> fields["hf_diagnosis_year"]);
                $patients_historicsData -> setHfDiagnosisYearSource($rs -> fields["hf_diagnosis_year_source"]);
                $patients_historicsData -> setHfDiagnosisYearConfidence($rs -> fields["hf_diagnosis_year_confidence"]);
                $patients_historicsData -> setHfStageSymptomatology($rs -> fields["hf_stage_symptomatology"]);
                $patients_historicsData -> setHfStageStructuralAnomaly($rs -> fields["hf_stage_structural_anomaly"]);
                $patients_historicsData -> setHfStageStructuralAnomalyDate($rs -> fields["hf_stage_structural_anomaly_date"]);
                $patients_historicsData -> setNonHf($rs -> fields["non_hf"]);
                $patients_historicsData -> setNonHfPeriherlaVd($rs -> fields["non_hf_periherla_vd"]);
                $patients_historicsData -> setNonHfCerebralVd($rs -> fields["non_hf_cerebral_vd"]);
                $patients_historicsData -> setNonHfCOPD($rs -> fields["non_hf_COPD"]);
                $patients_historicsData -> setNonHfSupplementalOxygen($rs -> fields["non_hf_supplemental_oxygen"]);
                $patients_historicsData -> setNonHfDiabetesMelitus($rs -> fields["non_hf_diabetes_melitus"]);
                $patients_historicsData -> setNonHfChronicRenal($rs -> fields["non_hf_chronic_renal"]);
                $patients_historicsData -> setNonHfYear($rs -> fields["non_hf_year"]);
                $patients_historicsData -> setMedicalConditionsOther($rs -> fields["medical_conditions_other"]);
                $patients_historicsData -> setMedicalConditionsNumber($rs -> fields["medical_conditions_number"]);
                $patients_historicsData -> setDyspnoeaLevel($rs -> fields["dyspnoea_level"]);
                $patients_historicsData -> setSmokingStatus($rs -> fields["smoking_status"]);
                $patients_historicsData -> setStopWalking($rs -> fields["stop_walking"]);
                $patients_historicsData -> setCreateTs($rs -> fields["create_ts"]);
                $patients_historicsData -> setUpdateTs($rs -> fields["update_ts"]);

            }
            
            GeneralDAO::closeConnection($db);
            
            return $patients_historicsData;

        } // End function

        /**
         * 
         * Modificar registro persona
         * @param unknown_type $reg
         */
        public function alterReg(Patients_historicsData $reg) {

            $db = GeneralDAO::getConnection();
            
            $db -> Execute( "BEGIN" );

            $rs = $db -> Execute( "
            		
            			UPDATE 
                            patients_historics 
            			SET 
                            id_patient = ?,
                            height = ?,
                            smoking_status = ?,
                            heart_rhythm = ?,
                            device_type = ?,
                            left_ventricular_ejection_fraction = ?,
                            heart_disease_type = ?,
                            non_hf_periherla_vd = ?,
                            non_hf_cerebral_vd = ?,
                            non_hf_COPD = ?,
                            non_hf_supplemental_oxygen = ?,
                            non_hf_diabetes_melitus = ?,
                            non_hf_chronic_renal = ?, 
                            non_hf_year = ?
            				
            			WHERE 
            				id = ? ",
                array(
                        $reg -> getIdPatient(),
                        $reg -> getHeight(),
                		$reg -> getSmokingStatus(),
                        $reg -> getHeartRhythm(),
                        $reg -> getDeviceType(),
                        $reg -> getLeftVentricularEjectionFraction(),
                        $reg -> getHeartDiseaseType(),
                        $reg -> getNonHfPeriherlaVd(),
                        $reg -> getNonHfCerebralVd(),
                        $reg -> getNonHfCOPD(),
                        $reg -> getNonHfSupplementalOxygen(),
                        $reg -> getNonHfDiabetesMelitus(),
                        $reg -> getNonHfChronicRenal(),
                        $reg -> getNonHfYear(),

                        $reg -> getId()
            	)
            );
            
            $db->Execute( "COMMIT" );
                
            GeneralDAO::closeConnection($db);

        } // End function alterReg

        public function addReg(Patients_historicsData $reg) {
            echo "HOLA";

            $db = GeneralDAO::getConnection();
            
            $db -> Execute( "BEGIN" );

            $rs = $db -> Execute(

                 "INSERT INTO

                    patients_historics(

                        id_patient,
                        height,
                        smoking_status,
                        heart_rhythm,
                        device_type,
                        left_ventricular_ejection_fraction,
                        heart_disease_type,
                        non_hf_periherla_vd,
                        non_hf_cerebral_vd,
                        non_hf_COPD,
                        non_hf_supplemental_oxygen,
                        non_hf_diabetes_melitus,
                        non_hf_chronic_renal,
                        non_hf_year
                        )

                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",

                array(
                    $reg -> getIdPatient(),
                    $reg -> getHeight(),
                	$reg -> getSmokingStatus(),
                    $reg -> getHeartRhythm(),
                    $reg -> getDeviceType(),
                    $reg -> getLeftVentricularEjectionFraction(),
                    $reg -> getHeartDiseaseType(),
                    $reg -> getNonHfPeriherlaVd(),
                    $reg -> getNonHfCerebralVd(),
                    $reg -> getNonHfCOPD(),
                    $reg -> getNonHfSupplementalOxygen(),
                    $reg -> getNonHfDiabetesMelitus(),
                    $reg -> getNonHfChronicRenal(),
                    $reg -> getNonHfYear(),
                    )
            );
                        
            $db->Execute( "COMMIT" );
                
            GeneralDAO::closeConnection($db);
        } // End function addreg


    } // End Class

?>