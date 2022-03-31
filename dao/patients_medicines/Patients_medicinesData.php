<?php

// Convención: los nombres de las variables han de coincidir con las columnas de la BD
class Patients_medicinesData {

    private $id;
    private $id_patient;
    private $medicine_name;
    private $medicine_strenght;
    private $medicine_units;
    private $medicine_frequency;
    private $medicine_date_started;
    private $medicine_date_stopped;
    private $medicine_chronic;
    private $number_medicines;
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

    public function getMedicineName() {
        return $this -> medicine_name;
    }

    public function setMedicineName($medicine_name) {
        return $this -> medicine_name = $medicine_name;
    }

    public function getMedicineStrenght() {
        return $this -> medicine_strenght;
    }

    public function setMedicineStrenght($medicine_strenght) {
        return $this -> medicine_strenght = $medicine_strenght;
    }

    public function getMedicineUnits() {
        return $this -> medicine_units;
    }

    public function setMedicineUnits($medicine_units) {
        return $this -> medicine_units = $medicine_units;
    }

    public function getMedicineFrequency() {
        return $this -> medicine_frequency;
    }

    public function setMedicineFrequency($medicine_frequency) {
        return $this -> medicine_frequency = $medicine_frequency;
    }

    public function getMedicineDateStarted() {
        return $this -> medicine_date_started;
    }

    public function setMedicineDateStarted($medicine_date_started) {
        return $this -> medicine_date_started = $medicine_date_started;
    }

    public function getMedicineDateStopped() {
        return $this -> medicine_date_stopped;
    }

    public function setMedicineDateStopped($medicine_date_stopped) {
        return $this -> medicine_date_stopped = $medicine_date_stopped;
    }

    public function getMedicineChronic() {
        return $this -> medicine_chronic;
    }

    public function setMedicineChronic($medicine_chronic) {
        return $this -> medicine_chronic = $medicine_chronic;
    }

    public function getNumberMedicines() {
        return $this -> number_medicines;
    }

    public function setNumberMedicines($number_medicines) {
        return $this -> number_medicines = $number_medicines;
    }

    public function getCreateTs() {
        return $this -> create_ts;
    }

    public function setCreateTs($create_ts) {
        return $this -> create_ts = $create_ts;
    }
} // End Class Patients_medicinesData