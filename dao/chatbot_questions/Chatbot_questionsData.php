<?php

// Convención: los nombres de las variables han de coincidir con las columnas de la BD
class Chatbot_questionData {

    private $id;
    private $cuestionario;
    private $question;
    private $language;

    public function getId() {
        return $this -> id;
    }

    public function setId($id) {
        return $this -> id = $id;
    }

    public function getCuestionario() {
        return $this -> cuestionario;
    }

    public function setCuestionario($cuestionario) {
        return $this -> cuestionario = $cuestionario;
    }

    public function getQuestion() {
        return $this -> question;
    }

    public function setquestion($question) {
        return $this -> question = $question;
    }

    public function getLanguage() {
        return $this -> language;
    }

    public function setLanguage($language) {
        return $this -> language = $language;
    }

} // End Class Patients_chatbotData