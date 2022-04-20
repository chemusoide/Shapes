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
                $patients_chatbotData -> setId_patient($rs -> fields["id_patient"]);
                $patients_chatbotData -> setCuestionario($rs -> fields["cuestionario"]);
                $patients_chatbotData -> setId_cuestionario($rs -> fields["idcuestionario"]);
                $patients_chatbotData -> setPregunta($rs -> fields["pregunta"]);
                $patients_chatbotData -> setRespuesta($rs -> fields["respuesta"]);
                $patients_chatbotData -> setCreateTs($rs -> fields["create_ts"]);

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
                $patients_chatbotData -> setId_patient($rs -> fields["id_patient"]);
                $patients_chatbotData -> setCuestionario($rs -> fields["cuestionario"]);
                $patients_chatbotData -> setId_cuestionario($rs -> fields["idcuestionario"]);
                $patients_chatbotData -> setPregunta($rs -> fields["pregunta"]);
                $patients_chatbotData -> setRespuesta($rs -> fields["respuesta"]);
                $patients_chatbotData -> setCreateTs($rs -> fields["create_ts"]);

            }
            
            GeneralDAO::closeConnection($db);
            
            return $patients_chatbotData;

        } // End function

         /**
         * Enter description here ...
         * @return Ambigous <multitype:, Patients_chatbotData>
         */
        public function getAllregistersForPatient($id) {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute( "SELECT * FROM patients_chatbot WHERE id_patient = ? ORDER BY create_ts DESC",
            array($id) );
            
            while (!$rs->EOF) {

                $patients_chatbotData = new Patients_chatbotData();

                $patients_chatbotData -> setId($rs -> fields["id"]);
                $patients_chatbotData -> setUserId($rs -> fields["user_id"]);
                $patients_chatbotData -> setId_patient($rs -> fields["id_patient"]);
                $patients_chatbotData -> setCuestionario($rs -> fields["cuestionario"]);
                $patients_chatbotData -> setId_cuestionario($rs -> fields["idcuestionario"]);
                $patients_chatbotData -> setPregunta($rs -> fields["pregunta"]);
                $patients_chatbotData -> setRespuesta($rs -> fields["respuesta"]);
                $patients_chatbotData -> setCreateTs($rs -> fields["create_ts"]);

                $result[] = $patients_chatbotData;
                $rs -> MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function

    } // End Class

?>