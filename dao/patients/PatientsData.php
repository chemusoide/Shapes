<?php

// Convención: los nombres de las variables han de coincidir con las columnas de la BD
class PatientsData {
    private $id;
    private $id_string;
    private $id_ch;
    private $phone;
    private $education_contact_person;
    private $older_person_birth;
    private $older_person_sex;
    private $create_ts;
    private $update_ts;

    public function getId() {
        return $this -> id;
    }

    public function setId($id) {
        return $this -> id = $id;
    }

    public function getIdString() {
        return $this -> id_string;
    }

    public function setIdString($id_string) {
        return $this -> id_string = $id_string;
    }

    public function getIdCh() {
        return $this -> id_ch;
    }

    public function setIdCh($id_ch) {
        return $this -> id_ch = $id_ch;
    }
    
    public function getPhone() {
        return $this -> phone;
    }

    public function setPhone($phone) {
        return $this -> phone = $phone;
    }

    public function getEducationContactPerson() {
        return $this -> education_contact_person;
    }

    public function setEducationContactPerson($education_contact_person) {
        return $this -> education_contact_person = $education_contact_person;
    }

    public function getOlderPersonBirth() {
        return $this -> older_person_birth;
    }

    public function setOlderPersonBirth($older_person_birth) {
        return $this -> older_person_birth = $older_person_birth;
    }

    public function getOlderPersonSex() {
        return $this -> older_person_sex;
    }

    public function setOlderPersonSex($older_person_sex) {
        return $this -> older_person_sex = $older_person_sex;
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

} // End class Patients

?>