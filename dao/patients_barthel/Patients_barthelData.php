<?php

// Convención: los nombres de las variables han de coincidir con las columnas de la BD
class Patients_barthelData {

    private $id;
    private $id_patient;
    private $bowels;
    private $bladder;
    private $grooming;
    private $toilet_use;
    private $feeding;
    private $transfer;
    private $mobility;
    private $dressing;
    private $stairs;
    private $bathing;
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

    public function getBowels() {
        return $this -> bowels;
    }

    public function setBowels($bowels) {
        return $this -> bowels = $bowels;
    }

    public function getBladder() {
        return $this -> bladder;
    }

    public function setBladder($bladder) {
        return $this -> bladder = $bladder;
    }

    public function getGrooming() {
        return $this -> grooming;
    }

    public function setGrooming($grooming) {
        return $this -> grooming = $grooming;
    }

    public function getToiletUse() {
        return $this -> toilet_use;
    }

    public function setToiletUse($toilet_use) {
        return $this -> toilet_use = $toilet_use;
    }

    public function getFeeding() {
        return $this -> feeding;
    }

    public function setFeeding($feeding) {
        return $this -> feeding = $feeding;
    }

    public function getTransfer() {
        return $this -> transfer;
    }

    public function setTransfer($transfer) {
        return $this -> transfer = $transfer;
    }

    public function getMobility() {
        return $this -> mobility;
    }

    public function setMobility($mobility) {
        return $this -> mobility = $mobility;
    }

    public function getDressing() {
        return $this -> dressing;
    }

    public function setDressing($dressing) {
        return $this -> dressing = $dressing;
    }

    public function getStairs() {
        return $this -> stairs;
    }

    public function setStairs($stairs) {
        return $this -> stairs = $stairs;
    }

    public function getBathing() {
        return $this -> bathing;
    }

    public function setBathing($bathing) {
        return $this -> bathing = $bathing;
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

} // End Class Patients_barthelData