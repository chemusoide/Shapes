<?php

    // Convención: los nombres de las variables han de coincidir con las columnas de la BD
    class Patients_devicesData {

        private $id;
        private $id_patient;
        private $device_type;
        private $record_date;
        private $device_value;
        private $unit;
        private $source_id;
        private $date_receive;
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

        public function getDeviceType() {
            return $this -> device_type;
        }

        public function setDeviceType($device_type) {
            return $this -> device_type = $device_type;
        }

        public function getRecordDate() {
            return $this -> record_date;
        }

        public function setRecorDate($record_date) {
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

        public function getDateReceive() {
            return $this -> date_receive;
        }

        public function setDate_Receive($date_receive) {
            return $this -> date_receive = $date_receive;
        }

        public function getCreateTs() {
            return $this -> create_ts;
        }

        public function setCreateTs($create_ts) {
            return $this -> create_ts = $create_ts;
        }

    } // End Class Patients_deviceslData