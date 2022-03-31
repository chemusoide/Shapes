<?php

// Convención: los nombres de las variables han de coincidir con las columnas de la BD
class Patients_ecfsData {

    private $id;
    private $id_patient;
    private $weigh;
    private $short_breath;
    private $short_breath_increase;
    private $feet_swollen;
    private $two_kg;
    private $fluids_limit;
    private $rest_day;
    private $increase_fatigue;
    private $low_salt_diet;
    private $medicine;
    private $flu_shot;
    private $exercise;
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

    public function getWeigh() {
        return $this -> weigh;
    }

    public function setWeigh($weigh) {
        return $this -> weigh = $weigh;
    }

    public function getShortBreath() {
        return $this -> short_breath;
    }

    public function setShortBreath($short_breath) {
        return $this -> short_breath = $short_breath;
    }

    public function getShortBreathIncrease() {
        return $this -> short_breath_increase;
    }

    public function setShortBreathIncrease($short_breath_increase) {
        return $this -> short_breath_increase = $short_breath_increase;
    }

    public function getFeetSwollen() {
        return $this -> feet_swollen;
    }

    public function setFeetSwollen($feet_swollen) {
        return $this -> feet_swollen = $feet_swollen;
    }

    public function getTwoKg() {
        return $this -> two_kg;
    }

    public function setTwoKg($two_kg) {
        return $this -> two_kg = $two_kg;
    }

    public function getFluidsLimit() {
        return $this -> fluids_limit;
    }

    public function setFluidsLimit($fluids_limit) {
        return $this -> fluids_limit = $fluids_limit;
    }

    public function getRestDay() {
        return $this -> rest_day;
    }

    public function setRestDay($rest_day) {
        return $this -> rest_day = $rest_day;
    }

    public function getIncreaseFatigue() {
        return $this -> increase_fatigue;
    }

    public function setIncreaseFatigue($increase_fatigue) {
        return $this -> increase_fatigue = $increase_fatigue;
    }

    public function getLowSaltDiet() {
        return $this -> low_salt_diet;
    }

    public function setLowSaltDiet($low_salt_diet) {
        return $this -> low_salt_diet = $low_salt_diet;
    }

    public function getMedicine() {
        return $this -> medicine;
    }

    public function setMedicine($medicine) {
        return $this -> medicine = $medicine;
    }

    public function getFluShot() {
        return $this -> flu_shot;
    }

    public function setFluShot($flu_shot) {
        return $this -> flu_shot = $flu_shot;
    }

    public function getExercise() {
        return $this -> exercise;
    }

    public function setExercise($exercise) {
        return $this -> exercise = $exercise;
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

} // End Class Patients_ecfs