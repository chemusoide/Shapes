<?php

// Convención: los nombres de las variables han de coincidir con las columnas de la BD
class Patients_chatbotData {

    private $id;
    private $user_id;
    private $id_patient;
    private $cuestionario;
    private $id_cuestionario;
    private $pregunta;
    private $respuesta;
    private $create_ts;

    public function getId() {
        return $this -> id;
    }

    public function setId($id) {
        return $this -> id = $id;
    }

    public function getUserId() {
        return $this -> user_id;
    }

    public function setUserId($user_id) {
        return $this -> user_id = $user_id;
    }

    public function getId_patient() {
        return $this -> id_patient;
    }

    public function setId_patient($id_patient) {
        return $this -> id_patient = $id_patient;
    }

    public function getCuestionario() {
        return $this -> cuestionario;
    }

    public function setCuestionario($cuestionario) {
        return $this -> cuestionario = $cuestionario;
    }

    public function getId_cuestionario() {
        return $this -> id_cuestionario;
    }

    public function setId_cuestionario($id_cuestionario) {
        return $this -> id_cuestionario = $id_cuestionario;
    }

    public function getPregunta() {
        return $this -> pregunta;
    }

    public function setPregunta($pregunta) {
        return $this -> pregunta = $pregunta;
    }

    public function getRespuesta() {
        return $this -> respuesta;
    }

    public function setRespuesta($respuesta) {
        return $this -> respuesta = $respuesta;
    }

    public function getCreateTs() {
        return $this -> create_ts;
    }

    public function setCreateTs($create_ts) {
        return $this -> create_ts = $create_ts;
    }

} // End Class Patients_chatbotData