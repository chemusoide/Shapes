<?php

// Convención: los nombres de las variables han de coincidir con las columnas de la BD
class Patients_chatbotData {

    private $id;
    private $user_id;
    private $cuestionario;
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

    public function getCuestionario() {
        return $this -> cuestionario;
    }

    public function setCuestionario($cuestionario) {
        return $this -> cuestionario = $cuestionario;
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