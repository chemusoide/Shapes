<?php

// Convención: los nombres de las variables han de coincidir con las columnas de la BD
class Patients_chatbotData {

    private $id;
    private $user_id;
    private $dialog_id;
    private $intent_name;
    private $entity_name;
    private $entity_value;
    private $text;
    private $create_ts;
    private $cuestionario;
    private $pregunta;

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

    public function getDialogId() {
        return $this -> dialog_id;
    }

    public function setDialogId($dialog_id) {
        return $this -> dialog_id = $dialog_id;
    }

    public function getIntentName() {
        return $this -> intent_name;
    }

    public function setIntentName($intent_name) {
        return $this -> intent_name = $intent_name;
    }

    public function getEntityName() {
        return $this -> entity_name;
    }

    public function setEntityName($entity_name) {
        return $this -> entity_name = $entity_name;
    }

    public function getEntityValue() {
        return $this -> entity_value;
    }

    public function setEntityValue($entity_value) {
        return $this -> entity_value = $entity_value;
    }

    public function getText() {
        return $this -> text;
    }

    public function setText($text) {
        return $this -> text = $text;
    }

    public function getCreateTs() {
        return $this -> create_ts;
    }

    public function setCreateTs($create_ts) {
        return $this -> create_ts = $create_ts;
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

} // End Class Patients_chatbotData