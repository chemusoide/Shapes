<?php

    class UserData {

        // Convención: los nombres de las variables han de coincidir con las columnas de la BD
        private $user_id;
        private $user_name;
        private $user_password;
        private $user_activated;

        public function getUserId() {
            return $this -> user_id;
        }

        public function setUserId($user_id) {
            $this -> user_id = $user_id;
        }

        public function getUserName() {
            return $this -> user_name;
        }

        public function setUserName($user_name) {
            $this -> user_name = $user_name;
        }

        public function getUserPassword() {
            return $this -> user_password;
        }

        public function setUserPassword($user_password) {
            $this -> user_password = $user_password;
        }

        public function getUserActivated() {
            return $this -> user_activated;
        }

        public function setUserActivated($user_activated) {
            $this -> user_activated = $user_activated;
        }

    }
    
?>