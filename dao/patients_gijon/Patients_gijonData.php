<?php

// Convención: los nombres de las variables han de coincidir con las columnas de la BD
class Patients_gijonData {

    private $id;
    private $id_patient;
    private $family_situation;
    private $economic_situation;
    private $living_place;
    private $social_relation;
    private $support_social;
    private $score;
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

    public function getFamilySituation() {
        return $this -> family_situation;
    }

    public function setFamilySituation($family_situation) {
        return $this -> family_situation = $family_situation;
    }

    public function getEconomicSituation() {
        return $this -> economic_situation;
    }

    public function setEconomicSituation($economic_situation) {
        return $this -> economic_situation = $economic_situation;
    }

    public function getLivingPlace() {
        return $this -> living_place;
    }

    public function setLivingPlace($living_place) {
        return $this -> living_place = $living_place;
    }

    public function getSocialRelation() {
        return $this -> social_relation;
    }

    public function setSocialRelation($social_relation) {
        return $this -> social_relation = $social_relation;
    }

    public function getSupportSocial() {
        return $this -> support_social;
    }

    public function setSupportSocial($support_social) {
        return $this -> support_social = $support_social;
    }

    public function getScore() {
        return $this -> score;
    }

    public function setScore($score) {
        return $this -> score = $score;
    }

    public function getCreateTs() {
        return $this -> create_ts;
    }

    public function setCreateTs($create_ts) {
        return $this -> create_ts = $create_ts;
    }

} // End Class Patients_gijonData