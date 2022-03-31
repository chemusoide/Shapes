<?php

    require_once(DAO_DIR . "/GeneralDAO.php");
    require_once("Patients_chatbotData.php");

    /**
     * 
     * Enter description here ...
     * @author Chema
     *
     */
    class Patients_chatbotDAO {
    
        /**
         * Enter description here ...
         * @return Ambigous <multitype:, Patients_chatbotData>
         */
        public function getAllregisters() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute( "SELECT * FROM patients_chatbot" );
            
            while (!$rs->EOF) {

                $patients_chatbotData = new Patients_chatbotData();

                $patients_chatbotData -> setId($rs -> fields["id"]);
                $patients_chatbotData -> setUserId($rs -> fields["user_id"]);
                $patients_chatbotData -> setDialogId($rs -> fields["dialog_id"]);
                $patients_chatbotData -> setIntentName($rs -> fields["intent_name"]);
                $patients_chatbotData -> setEntityValue($rs -> fields["entity_value"]);
                $patients_chatbotData -> setText($rs -> fields["text"]);
                $patients_chatbotData -> setCreateTs($rs -> fields["create_ts"]);
                $patients_chatbotData -> setCuestionario($rs -> fields["cuestionario"]);
                $patients_chatbotData -> setPregunta($rs -> fields["pregunta"]);
                

                $result[] = $patients_chatbotData;
                $rs -> MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function

        /**
         * Enter description here ...
         * @param unknown_type $id
         * @return UserData
         */
        public function getRegister($id) {

            $db = GeneralDAO::getConnection();
			
            $patients_chatbotData = new Patients_chatbotData();
            
       		$rs = $db->Execute( "SELECT * FROM patients_chatbot WHERE id = ? ",
       		    array($id) );
            
            if (!$rs->EOF) {

                $patients_chatbotData -> setId($rs -> fields["id"]);
                $patients_chatbotData -> setUserId($rs -> fields["user_id"]);
                $patients_chatbotData -> setDialogId($rs -> fields["dialog_id"]);
                $patients_chatbotData -> setIntentName($rs -> fields["intent_name"]);
                $patients_chatbotData -> setEntityValue($rs -> fields["entity_value"]);
                $patients_chatbotData -> setText($rs -> fields["text"]);
                $patients_chatbotData -> setCreateTs($rs -> fields["create_ts"]);
                $patients_chatbotData -> setCuestionario($rs -> fields["cuestionario"]);
                $patients_chatbotData -> setPregunta($rs -> fields["pregunta"]);

            }
            
            GeneralDAO::closeConnection($db);
            
            return $patients_chatbotData;

        } // End function

    } // End Class

?>