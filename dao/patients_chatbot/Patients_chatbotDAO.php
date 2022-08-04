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


         /**
         * El paciente comunica varias alarmas:
         *  Q4 -> p5= yes -> Sí
         *  Q5 -> p6 = yes -> Sí
         *  Q6 -> p7 = yes -> Sí
         *  Q7 -> p8 = yes -> Sí
         *  Q9 -> p10 = less -> Menos
         *  Q10 -> p11 = yes -> Sí
         *  Q11 -> p12 = yes -> Sí
         * @return Ambigous <multitype:, PatientsData>
         * 
         * OJO:
         * Prueba <=
         * Real >=
         */

        public function getAlarm_5_3_chatbot() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute(
                "SELECT * FROM patients JOIN patients_chatbot 
                    ON patients.id = patients_chatbot.id_patient
                    WHERE (

                            (
                                (patients_chatbot.pregunta = 5 AND (patients_chatbot.respuesta = 'Sí' || patients_chatbot.respuesta = 'Si') ) AND
                    
                                (patients_chatbot.create_ts >= (NOW() - INTERVAL 3 DAY))
                            
                            ) OR

                            (
                                (patients_chatbot.pregunta = 6 AND (patients_chatbot.respuesta = 'Sí' || patients_chatbot.respuesta = 'Si') ) AND
                    
                                (patients_chatbot.create_ts >= (NOW() - INTERVAL 3 DAY))
                            
                            ) OR
                            (
                                (patients_chatbot.pregunta = 7 AND (patients_chatbot.respuesta = 'Sí' || patients_chatbot.respuesta = 'Si') ) AND
                    
                                (patients_chatbot.create_ts >= (NOW() - INTERVAL 3 DAY))
                            
                            ) OR

                            (
                                (patients_chatbot.pregunta = 8 AND (patients_chatbot.respuesta = 'Sí' || patients_chatbot.respuesta = 'Si') ) AND
                    
                                (patients_chatbot.create_ts >= (NOW() - INTERVAL 3 DAY))
                            
                            ) OR

                            (
                                (patients_chatbot.pregunta = 10 AND patients_chatbot.respuesta = 'Menos' ) AND
                    
                                (patients_chatbot.create_ts >= (NOW() - INTERVAL 3 DAY))
                            
                            ) OR

                            (
                                (patients_chatbot.pregunta = 11 AND (patients_chatbot.respuesta = 'Sí' || patients_chatbot.respuesta = 'Si') ) AND
                    
                                (patients_chatbot.create_ts >= (NOW() - INTERVAL 3 DAY))
                            
                            ) OR

                            (
                                (patients_chatbot.pregunta = 12 AND (patients_chatbot.respuesta = 'Sí' || patients_chatbot.respuesta = 'Si') ) AND
                    
                                (patients_chatbot.create_ts >= (NOW() - INTERVAL 3 DAY))
                            
                            )

                            AND patients.id IN (SELECT patient_id FROM user_patients WHERE user_mail='".$_SESSION["user_name"]."')
                        
                        )
                " 
            );

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

        } // End function getAlarm_5_3_chatbot

    } // End Class

?>