<?php

    require_once(DAO_DIR . "/GeneralDAO.php");
    require_once("UserData.php");

    /**
     * 
     * Enter description here ...
     * @author Chema
     *
     */
    class UserDAO {
    
        /**
         * Enter description here ...
         * @return Ambigous <multitype:, UserData>
         */
        public function getAllregisters() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute( "SELECT * FROM user WHERE user_activated = 1 ORDER BY user_name DESC" );
            
            while (!$rs->EOF) {

                $userData = new UserData();
                $userData -> setUserId($rs -> fields["user_id"]);
                $userData -> setUserName($rs -> fields["user_name"]);
                $userData -> setUserPassword($rs -> fields["user_password"]);
                $userData -> setUserActivated($rs -> fields["user_activated"]);

                $result[] = $userData;
                $rs -> MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        }

        /**
         * Enter description here ...
         * @param unknown_type $id
         * @return UserData
         */
        public function getRegister($id) {

            $db = GeneralDAO::getConnection();
			
            $userData = new UserData();
            
       		$rs = $db->Execute( "SELECT * FROM user WHERE user_id = ? && user_activated = 1",
       		    array($id) );
            
            if (!$rs->EOF) {

                $userData ->setUserId($rs->fields["user_id"]);
                $userData->setUserName($rs->fields["user_name"]);
                $userData->setUserPassword($rs->fields["user_password"]);

            }
            
            GeneralDAO::closeConnection($db);
            
            return $userData;

        }

        /**
         * Enter description here ...
         * @param unknown_type $id
         * @return UserData
         */
        public function getRegisterByName($user_name) {

            $db = GeneralDAO::getConnection();
			
            $userData = new UserData();
            
       		$rs = $db->Execute( "SELECT * FROM user WHERE user_name = ?",
       		    array($user_name) );
            
            if (!$rs->EOF) {

                $userData ->setUserId($rs->fields["user_id"]);
                $userData->setUserName($rs->fields["user_name"]);
                $userData->setUserPassword($rs->fields["user_password"]);

            }
            
            GeneralDAO::closeConnection($db);
            
            return $userData;

        }
        
        public function getRegisterName($name, $password) {

            $db = GeneralDAO::getConnection();
			
            $userData = new UserData();
            
       		$rs = $db->Execute( "SELECT * FROM user WHERE user_name = ? AND user_password = SHA1(?) AND user_activated = 1",
       		    array($name, $password) );
            
            if (!$rs->EOF) {

                $userData->setUserId($rs->fields["user_id"]);
                $userData->setUserName($rs->fields["user_name"]);
                $userData->setUserPassword($rs->fields["user_password"]);

            }
            
            GeneralDAO::closeConnection($db);
            
            return $userData;

        }

        public function createRegister(UserData $register) {

            $db = GeneralDAO::getConnection();
            
            //echo $register->getuserNombre() . "<br>";
            //echo $register->getuserPassword() . "<br>";
            
            $rs = $db->Execute( "INSERT INTO user (user_name, user_password) VALUES (?, ?)",
                array($register->getUserName(), sha1($register->getUserPassword())) );
            
            GeneralDAO::closeConnection($db);

        }

        public function modifyRegister(UserData $register) {

            $db = GeneralDAO::getConnection();

            $rs = $db->Execute( "UPDATE user SET user_name=?, user_password=? WHERE user_id=?",
                array($register->getUserName(), sha1($register->getUserPassword()), $register->getUserId()) );
            
            GeneralDAO::closeConnection($db);

        }

        public function deleteRegister($id) {

            $db = GeneralDAO::getConnection();

            $rs = $db->Execute( "UPDATE user SET user_activated = 0 WHERE user_id = ?",
                array($id) );
            
            GeneralDAO::closeConnection($db);

        }

    }

?>