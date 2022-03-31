<?php

// Convención: los nombres de las variables han de coincidir con las columnas de la BD
class Patients_lab_analyticsData {

    private $id;
    private $id_patient;
    private $lab_param;
    private $record_date;
    private $lab_value;
    private $create_ts;

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

    public function getLabParam() {
        return $this -> lab_param;
    }

    public function setLabParam($lab_param) {
        return $this -> lab_param = $lab_param;
    }

    public function getRecordDate() {
        return $this -> record_date;
    }

    public function setRecordDate($record_date) {
        return $this -> record_date = $record_date;
    }

    public function getLabvalue() {
        return $this -> lab_value;
    }

    public function setLabvalue($lab_value) {
        return $this -> lab_value = $lab_value;
    }

    public function getCreateTs() {
        return $this -> create_ts;
    }

    public function setCreateTs($create_ts) {
        return $this -> create_ts = $create_ts;
    }

} // End Class Patients_lab_analyticsData