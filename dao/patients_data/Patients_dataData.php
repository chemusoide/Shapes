<?php

// Convención: los nombres de las variables han de coincidir con las columnas de la BD
class Patients_dataData {

    private $id;
    private $id_patient;
    private $metric;
    private $record_date;
    private $device_value;
    private $unit;
    private $source_id;
    private $date_received;
    private $create_ts;
    private $update_ts;

    public function getId() {
        return $this -> id;
    }

    public function setId($id) {
        return $this -> id = $id;
    }

    public function getidPatient() {
        return $this -> id_patient;
    }

    public function setIdPatient($id_patient) {
        return $this -> id_patient = $id_patient;
    }

    public function getMetric() {
        return $this -> metric;
    }

    public function setMetric($metric) {
        return $this -> metric = $metric;
    }

    public function getRecordDate() {
        return $this -> record_date;
    }

    public function setRecordDate($record_date) {
        return $this -> record_date = $record_date;
    }

    public function getDeviceValue() {
        return $this -> device_value;
    }

    public function setDeviceValue($device_value) {
        return $this -> device_value = $device_value;
    }

    public function getUnit() {
        return $this -> unit;
    }

    public function setUnit($unit) {
        return $this -> unit = $unit;
    }

    public function getSourceId() {
        return $this -> source_id;
    }

    public function setSourceId($source_id) {
        return $this -> source_id = $source_id;
    }

    public function getDateReceived() {
        return $this -> date_received;
    }

    public function setDateReceived($date_received) {
        return $this -> date_received = $date_received;
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

} // End Class Patients_dataData