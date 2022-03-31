<?php

// Convención: los nombres de las variables han de coincidir con las columnas de la BD
class Patients_historicsData {

    private $id;
    private $id_patient;
    private $height;
    private $height_date;
    private $left_ventricular_ejection_fraction;
    private $left_ventricular_ejection_fraction_date;
    private $heart_rhythm;
    private $heart_rhythm_atrial_fibrillation;
    private $heart_rhythm_flutter;
    private $heart_rhythm_date;
    private $device_type;
    private $device_type_date;
    private $heart_disease_type;
    private $heart_disease_type_other;
    private $hf_diagnosis_year;
    private $hf_diagnosis_year_source;
    private $hf_diagnosis_year_confidence;
    private $hf_stage_symptomatology;
    private $hf_stage_structural_anomaly;	
    private $hf_stage_structural_anomaly_date;
    private $non_hf;
    private $non_hf_year;
    private $medical_conditions_other;
    private $medical_conditions_number;
    private $dyspnoea_level;
    private $smoking_status;
    private $stop_walking;
    private $create_ts;
    private $update_ts;

    public function getId() {
        return $this -> id;
    }

    public function setId($id) {
        return $this -> id = $id;
    }

    public function getIdPatient() {
        return $this -> id_patient;
    }

    public function setIdPatient($id_patient) {
        return $this -> id_patient = $id_patient;
    }

    public function getHeight() {
        return $this -> height;
    }

    public function setHeight($height) {
        return $this -> height = $height;
    }
    
    public function getHeightDate() {
        return $this -> height_date;
    }

    public function setHeightDate($height_date) {
        return $this -> height_date = $height_date;
    }

    public function getLeftVentricularEjectionFraction() {
        return $this -> left_ventricular_ejection_fraction;
    }

    public function setLeftVentricularEjectionFraction($left_ventricular_ejection_fraction) {
        return $this -> left_ventricular_ejection_fraction = $left_ventricular_ejection_fraction;
    }

    public function getLeftVentricularEjectionFractionDate() {
        return $this -> left_ventricular_ejection_fraction_date;
    }

    public function setLeftVentricularEjectionFractionDate($left_ventricular_ejection_fraction_date) {
        return $this -> left_ventricular_ejection_fraction_date = $left_ventricular_ejection_fraction_date;
    }

    public function getHeartRhythm() {
        return $this -> heart_rhythm;
    }

    public function setHeartRhythm($heart_rhythm) {
        return $this -> heart_rhythm = $heart_rhythm;
    }

    public function getHeartRhythmAtrialFibrillation() {
        return $this -> heart_rhythm_atrial_fibrillation;
    }

    public function setHeartRhythmAtrialFibrillation($heart_rhythm_atrial_fibrillation) {
        return $this -> heart_rhythm_atrial_fibrillation = $heart_rhythm_atrial_fibrillation;
    }

    public function getHeartRhythmFlutter() {
        return $this -> heart_rhythm_flutter;
    }

    public function setHeartRhythmFlutter($heart_rhythm_flutter) {
        return $this -> heart_rhythm_flutter = $heart_rhythm_flutter;
    }

    public function getHeartRhythmDate() {
        return $this -> heart_rhythm_date;
    }

    public function setHeartRhythmDate($heart_rhythm_date) {
        return $this -> heart_rhythm_date = $heart_rhythm_date;
    }

    public function getDeviceType() {
        return $this -> device_type;
    }

    public function setDeviceType($device_type) {
        return $this -> device_type = $device_type;
    }

    public function getDeviceTypeDate() {
        return $this -> device_type_date;
    }

    public function setDeviceTypeDate($device_type_date) {
        return $this -> device_type_date = $device_type_date;
    }

    public function getHeartDiseaseType() {
        return $this -> heart_disease_type;
    }

    public function setHeartDiseaseType($heart_disease_type) {
        return $this -> heart_disease_type = $heart_disease_type;
    }

    public function getHeartDiseaseTypeOther() {
        return $this -> heart_disease_type_other;
    }

    public function setHeartDiseaseTypeOther($heart_disease_type_other) {
        return $this -> heart_disease_type_other = $heart_disease_type_other;
    }

    public function getHfDiagnosisYear() {
        return $this -> hf_diagnosis_year;
    }

    public function setHfDiagnosisYear($hf_diagnosis_year) {
        return $this -> hf_diagnosis_year = $hf_diagnosis_year;
    }

    public function getHfDiagnosisYearSource() {
        return $this -> hf_diagnosis_year_source;
    }

    public function setHfDiagnosisYearSource($hf_diagnosis_year_source) {
        return $this -> hf_diagnosis_year_source = $hf_diagnosis_year_source;
    }

    public function getHfDiagnosisYearConfidence() {
        return $this -> hf_diagnosis_year_confidence;
    }

    public function setHfDiagnosisYearConfidence($hf_diagnosis_year_confidence) {
        return $this -> hf_diagnosis_year_confidence = $hf_diagnosis_year_confidence;
    }

    public function getHfStageSymptomatology() {
        return $this -> hf_stage_symptomatology;
    }

    public function setHfStageSymptomatology($hf_stage_symptomatology) {
        return $this -> hf_stage_symptomatology = $hf_stage_symptomatology;
    }

    public function getHfStageStructuralAnomaly() {
        return $this -> hf_stage_structural_anomaly;
    }

    public function setHfStageStructuralAnomaly($hf_stage_structural_anomaly) {
        return $this -> hf_stage_structural_anomaly = $hf_stage_structural_anomaly;
    }

    public function getHfStageStructuralAnomalyDate() {
        return $this -> hf_stage_structural_anomaly_date;
    }

    public function setHfStageStructuralAnomalyDate($hf_stage_structural_anomaly_date) {
        return $this -> hf_stage_structural_anomaly_date = $hf_stage_structural_anomaly_date;
    }

    public function getNonHf() {
        return $this -> non_hf;
    }

    public function setNonHf($non_hf) {
        return $this -> non_hf = $non_hf;
    }

    public function getNonHfYear() {
        return $this -> non_hf_year;
    }

    public function setNonHfYear($non_hf_year) {
        return $this -> non_hf_year = $non_hf_year;
    }

    public function getMedicalConditionsOther() {
        return $this -> medical_conditions_other;
    }

    public function setMedicalConditionsOther($medical_conditions_other) {
        return $this -> medical_conditions_other = $medical_conditions_other;
    }

    public function getMedicalConditionsNumber() {
        return $this -> medical_conditions_number;
    }

    public function setMedicalConditionsNumber($medical_conditions_number) {
        return $this -> medical_conditions_number = $medical_conditions_number;
    }

    public function getDyspnoeaLevel() {
        return $this -> dyspnoea_level;
    }

    public function setDyspnoeaLevel($dyspnoea_level) {
        return $this -> dyspnoea_level = $dyspnoea_level;
    }

    public function getSmokingStatus() {
        return $this -> smoking_status;
    }

    public function setSmokingStatus($smoking_status) {
        return $this -> smoking_status = $smoking_status;
    }

    public function getStopWalking() {
        return $this -> stop_walking;
    }

    public function setStopWalking($stop_walking) {
        return $this -> stop_walking = $stop_walking;
    }
    
    public function getCreateTs() {
        return $this -> create_ts;
    }

    public function setCreateTs($create_ts) {
        return $this -> create_ts = $create_ts;
    }

    public function getUpdateTs() {
        return $this -> update_ts;
    }

    public function setUpdateTs($update_ts) {
        return $this -> update_ts = $update_ts;
    }

} // End Class Patients_historicsData