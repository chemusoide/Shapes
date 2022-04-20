<?php

    require_once(DAO_DIR . "/GeneralDAO.php");
    require_once("PatientsData.php");

    /**
     * 
     * Enter description here ...
     * @author Chema
     *
     */
    class PatientsDAO {
    
        /**
         * Enter description here ...
         * @return Ambigous <multitype:, PatientsData>
         */
        public function getAllregisters() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute( "SELECT * FROM patients ORDER BY id ASC" );
            
            while (!$rs->EOF) {

                $patientsData = new PatientsData();

                $patientsData -> setId($rs->fields["id"]);
                $patientsData -> setIdString($rs->fields["id_string"]);
                $patientsData -> setIdCh($rs->fields["id_ch"]);
                $patientsData -> setEducationContactPerson($rs->fields["education_contact_person"]);
                $patientsData -> setOlderPersonBirth($rs->fields["older_person_birth"]);
                $patientsData -> setOlderPersonSex($rs->fields["older_person_sex"]);
                $patientsData -> setCreateTs($rs->fields["create_ts"]);
                $patientsData -> setUpdateTs($rs->fields["update_ts"]);

                $result[] = $patientsData;
                $rs->MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function getAllRegisters


        /**
         * Enter description here ...
         * @return Ambigous <multitype:, PatientsData>
         */
        public function getAllEmails() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute( "SELECT id_string FROM patients ORDER BY id ASC" );
            
            while (!$rs->EOF) {

                $patientsData = new PatientsData();
                $patientsData->setIdString($rs->fields["id_string"]);

                $result[] = $patientsData;
                $rs->MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function getAllEmails


         /**
         * Enter description here ...
         * @param unknown_type $id
         * @return UserData
         */
        public function getRegister($id) {

            $db = GeneralDAO::getConnection();
			
            $patientsData = new PatientsData();
            
       		$rs = $db->Execute( "SELECT * FROM patients WHERE id = ?",
       		    array($id) );
            
            if (!$rs->EOF) {

                $patientsData ->setId($rs->fields["id"]);
                $patientsData->setIdString($rs->fields["id_string"]);
                $patientsData->setIdCh($rs->fields["id_ch"]);
                $patientsData->setEducationContactPerson($rs->fields["education_contact_person"]);
                $patientsData->setOlderPersonBirth($rs->fields["older_person_birth"]);
                $patientsData->setOlderPersonSex($rs->fields["older_person_sex"]);
                $patientsData->setCreateTs($rs->fields["create_ts"]);
                $patientsData->setUpdateTs($rs->fields["update_ts"]);

            }
            
            GeneralDAO::closeConnection($db);
            
            return $patientsData;

        } // End function getRegister by id
    
        /**
         * No hay datos en la pregunta de ejercicio o en la de dieta en los últimos tres días ->
         * Negada de (Hay datos en la pregunta de dieta y en la de ejercicio en los últimos 3 días):
         * @return Ambigous <multitype:, PatientsData>
         */
        public function getAlarm_1_1() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute(
                "SELECT *
                    FROM patients WHERE patients.id_string NOT IN (
                        SELECT patients.id_string FROM patients JOIN patients_chatbot 
                            ON patients.id = patients_chatbot.user_id
                        WHERE (
                            (patients_chatbot.pregunta = 8 AND idcuestionario = 1 AND patients_chatbot.respuesta IS NOT NULL) AND
                
                            (patients_chatbot.create_ts + 2592000) >= CURRENT_TIMESTAMP
                
                        )
                    )
                " 
            );
            
            while (!$rs->EOF) {

                $patientsData = new PatientsData();

                $patientsData -> setId($rs->fields["id"]);
                $patientsData -> setIdString($rs->fields["id_string"]);
                $patientsData -> setIdCh($rs->fields["id_ch"]);
                $patientsData -> setEducationContactPerson($rs->fields["education_contact_person"]);
                $patientsData -> setOlderPersonBirth($rs->fields["older_person_birth"]);
                $patientsData -> setOlderPersonSex($rs->fields["older_person_sex"]);
                $patientsData -> setCreateTs($rs->fields["create_ts"]);
                $patientsData -> setUpdateTs($rs->fields["update_ts"]);

                $result[] = $patientsData;
                $rs->MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function getAlarm_1_1

        /**
         *  NO hay datos de peso registrados del dispositivo tres días antes -->
         *  Negadad de (Hay datos de peso los tres últimos días)
         * @return Ambigous <multitype:, PatientsData>
         */
        public function getAlarm_1_2() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute(
                "SELECT *
                    FROM patients WHERE patients.id_string NOT IN (
                        SELECT patients.id_string FROM patients JOIN patients_devices 
                            ON patients.id = patients_devices.id_patient
                        WHERE (
                            (patients_devices.device_type = 'W') AND
                    
                            (patients_devices.record_date + 2592000) >= CURRENT_TIMESTAMP
                        )
                
                    )
               " 
            );
            
            while (!$rs->EOF) {

                $patientsData = new PatientsData();

                $patientsData -> setId($rs->fields["id"]);
                $patientsData -> setIdString($rs->fields["id_string"]);
                $patientsData -> setIdCh($rs->fields["id_ch"]);
                $patientsData -> setEducationContactPerson($rs->fields["education_contact_person"]);
                $patientsData -> setOlderPersonBirth($rs->fields["older_person_birth"]);
                $patientsData -> setOlderPersonSex($rs->fields["older_person_sex"]);
                $patientsData -> setCreateTs($rs->fields["create_ts"]);
                $patientsData -> setUpdateTs($rs->fields["update_ts"]);

                $result[] = $patientsData;
                $rs->MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function getAlarm_1_2

        /**
         * NO hay datos registrados del dispositivo tres días antes -->
         * Negadad de (Hay datos los tres últimos días)
         * @return Ambigous <multitype:, PatientsData>
         */
        public function getAlarm_1_3() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute(
                "SELECT *
                    FROM patients WHERE patients.id_string NOT IN (
                        SELECT patients.id_string FROM patients JOIN patients_chatbot 
                            ON patients.id = patients_chatbot.user_id
                        WHERE (
                            (patients_chatbot.create_ts + 2592000) >= CURRENT_TIMESTAMP
                    
                        )
                    )
               " 
            );
            
            while (!$rs->EOF) {

                $patientsData = new PatientsData();

                $patientsData -> setId($rs->fields["id"]);
                $patientsData -> setIdString($rs->fields["id_string"]);
                $patientsData -> setIdCh($rs->fields["id_ch"]);
                $patientsData -> setEducationContactPerson($rs->fields["education_contact_person"]);
                $patientsData -> setOlderPersonBirth($rs->fields["older_person_birth"]);
                $patientsData -> setOlderPersonSex($rs->fields["older_person_sex"]);
                $patientsData -> setCreateTs($rs->fields["create_ts"]);
                $patientsData -> setUpdateTs($rs->fields["update_ts"]);

                $result[] = $patientsData;
                $rs->MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function getAlarm_1_3

        /**
         * Pacientes con nuevos resultados, los tres últimos días - Análisis
         * @return Ambigous <multitype:, PatientsData>
         */
        public function getAlarm_2_1() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute(
                "SELECT * FROM patients JOIN patients_chatbot 
                    ON patients.id = patients_chatbot.user_id
                WHERE (
                    (patients_chatbot.pregunta = 2 AND idcuestionario = 3 AND patients_chatbot.respuesta = 'Sí') AND
            
                    (patients_chatbot.create_ts + 2592000) >= CURRENT_TIMESTAMP
            
                )
                " 
            );

            //Cambiar  (patients_chatbot.create_ts + 2592000) <= CURRENT_TIMESTAMP ->  (patients_chatbot.create_ts + 2592000) >= CURRENT_TIMESTAMP
            
            while (!$rs->EOF) {

                $patientsData = new PatientsData();

                $patientsData -> setId($rs->fields["id"]);
                $patientsData -> setIdString($rs->fields["id_string"]);
                $patientsData -> setIdCh($rs->fields["id_ch"]);
                $patientsData -> setEducationContactPerson($rs->fields["education_contact_person"]);
                $patientsData -> setOlderPersonBirth($rs->fields["older_person_birth"]);
                $patientsData -> setOlderPersonSex($rs->fields["older_person_sex"]);
                $patientsData -> setCreateTs($rs->fields["create_ts"]);
                $patientsData -> setUpdateTs($rs->fields["update_ts"]);

                $result[] = $patientsData;
                $rs->MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function getAlarm_2_1

        /**
         * Pacientes con nuevos resultados, los tres últimos días - Visita médica
         * @return Ambigous <multitype:, PatientsData>
         */
        public function getAlarm_2_2() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute(
                "SELECT patients.id_string FROM patients JOIN patients_chatbot 
                ON patients.id = patients_chatbot.user_id
                WHERE (
                    (patients_chatbot.pregunta = 3 AND idcuestionario = 3 AND patients_chatbot.respuesta = 'Sí') AND
            
                    (patients_chatbot.create_ts + 2592000) >= CURRENT_TIMESTAMP
            
                )
                " 
            );

            while (!$rs->EOF) {

                $patientsData = new PatientsData();

                $patientsData -> setId($rs->fields["id"]);
                $patientsData -> setIdString($rs->fields["id_string"]);
                $patientsData -> setIdCh($rs->fields["id_ch"]);
                $patientsData -> setEducationContactPerson($rs->fields["education_contact_person"]);
                $patientsData -> setOlderPersonBirth($rs->fields["older_person_birth"]);
                $patientsData -> setOlderPersonSex($rs->fields["older_person_sex"]);
                $patientsData -> setCreateTs($rs->fields["create_ts"]);
                $patientsData -> setUpdateTs($rs->fields["update_ts"]);

                $result[] = $patientsData;
                $rs->MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function getAlarm_2_2

        /**
         * Pacientes con nuevos resultados, los tres últimos días - Ingreso hospital
         * @return Ambigous <multitype:, PatientsData>
         */
        public function getAlarm_2_3() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute(
                "SELECT patients.id_string FROM patients JOIN patients_chatbot 
                ON patients.id = patients_chatbot.user_id
                WHERE (
                    (patients_chatbot.pregunta = 4 AND idcuestionario = 3 AND patients_chatbot.respuesta = 'Sí') AND
            
                    (patients_chatbot.create_ts + 2592000) >= CURRENT_TIMESTAMP
            
                )
                " 
            );

            while (!$rs->EOF) {

                $patientsData = new PatientsData();

                $patientsData -> setId($rs->fields["id"]);
                $patientsData -> setIdString($rs->fields["id_string"]);
                $patientsData -> setIdCh($rs->fields["id_ch"]);
                $patientsData -> setEducationContactPerson($rs->fields["education_contact_person"]);
                $patientsData -> setOlderPersonBirth($rs->fields["older_person_birth"]);
                $patientsData -> setOlderPersonSex($rs->fields["older_person_sex"]);
                $patientsData -> setCreateTs($rs->fields["create_ts"]);
                $patientsData -> setUpdateTs($rs->fields["update_ts"]);

                $result[] = $patientsData;
                $rs->MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function getAlarm_2_3

        /**
         * Pacientes con nuevos resultados, los tres últimos días - Cambio en la medicación
         * @return Ambigous <multitype:, PatientsData>
         */
        public function getAlarm_2_4() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute(
                "SELECT patients.id_string FROM patients JOIN patients_chatbot 
                ON patients.id = patients_chatbot.user_id
                WHERE (
                    (patients_chatbot.pregunta = 1 AND idcuestionario = 3 AND patients_chatbot.respuesta = 'Sí') AND
            
                    (patients_chatbot.create_ts + 2592000) >= CURRENT_TIMESTAMP
            
                )
                " 
            );

            while (!$rs->EOF) {

                $patientsData = new PatientsData();

                $patientsData -> setId($rs->fields["id"]);
                $patientsData -> setIdString($rs->fields["id_string"]);
                $patientsData -> setIdCh($rs->fields["id_ch"]);
                $patientsData -> setEducationContactPerson($rs->fields["education_contact_person"]);
                $patientsData -> setOlderPersonBirth($rs->fields["older_person_birth"]);
                $patientsData -> setOlderPersonSex($rs->fields["older_person_sex"]);
                $patientsData -> setCreateTs($rs->fields["create_ts"]);
                $patientsData -> setUpdateTs($rs->fields["update_ts"]);

                $result[] = $patientsData;
                $rs->MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function getAlarm_2_4

        /**
         * El paciente comunica que se siente peor
         * @return Ambigous <multitype:, PatientsData>
         */
        public function getAlarm_3_1() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute(
                "SELECT patients.id_string FROM patients JOIN patients_chatbot 
                ON patients.id = patients_chatbot.user_id
                WHERE (
                    (patients_chatbot.pregunta = 2 AND idcuestionario = 1 AND patients_chatbot.respuesta = 'peor') AND
            
                    (patients_chatbot.create_ts + 2592000) >= CURRENT_TIMESTAMP
            
                )
                " 
            );

            while (!$rs->EOF) {

                $patientsData = new PatientsData();

                $patientsData -> setId($rs->fields["id"]);
                $patientsData -> setIdString($rs->fields["id_string"]);
                $patientsData -> setIdCh($rs->fields["id_ch"]);
                $patientsData -> setEducationContactPerson($rs->fields["education_contact_person"]);
                $patientsData -> setOlderPersonBirth($rs->fields["older_person_birth"]);
                $patientsData -> setOlderPersonSex($rs->fields["older_person_sex"]);
                $patientsData -> setCreateTs($rs->fields["create_ts"]);
                $patientsData -> setUpdateTs($rs->fields["update_ts"]);

                $result[] = $patientsData;
                $rs->MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function getAlarm_3_1

        /**
         * El paciente comunica palpitaciones
         * @return Ambigous <multitype:, PatientsData>
         */
        public function getAlarm_4_1() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute(
                "SELECT patients.id_string FROM patients JOIN patients_chatbot 
                ON patients.id = patients_chatbot.user_id
                WHERE (
                    (patients_chatbot.pregunta = 10 AND idcuestionario = 1 AND patients_chatbot.respuesta = 'YES') AND
            
                    (patients_chatbot.create_ts + 2592000) >= CURRENT_TIMESTAMP
            
                )
                " 
            );

            while (!$rs->EOF) {

                $patientsData = new PatientsData();

                $patientsData -> setId($rs->fields["id"]);
                $patientsData -> setIdString($rs->fields["id_string"]);
                $patientsData -> setIdCh($rs->fields["id_ch"]);
                $patientsData -> setEducationContactPerson($rs->fields["education_contact_person"]);
                $patientsData -> setOlderPersonBirth($rs->fields["older_person_birth"]);
                $patientsData -> setOlderPersonSex($rs->fields["older_person_sex"]);
                $patientsData -> setCreateTs($rs->fields["create_ts"]);
                $patientsData -> setUpdateTs($rs->fields["update_ts"]);

                $result[] = $patientsData;
                $rs->MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function getAlarm_4_1

        /**
         * El paciente comunica decremento de la cantidad urinaria
         * @return Ambigous <multitype:, PatientsData>
         */
        public function getAlarm_4_2() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute(
                "SELECT patients.id_string FROM patients JOIN patients_chatbot 
                ON patients.id = patients_chatbot.user_id
                WHERE (
                    (patients_chatbot.pregunta = 9 AND idcuestionario = 1 AND patients_chatbot.respuesta = 'menos') AND
            
                    (patients_chatbot.create_ts + 2592000) >= CURRENT_TIMESTAMP
            
                )
                " 
            );

            while (!$rs->EOF) {

                $patientsData = new PatientsData();

                $patientsData -> setId($rs->fields["id"]);
                $patientsData -> setIdString($rs->fields["id_string"]);
                $patientsData -> setIdCh($rs->fields["id_ch"]);
                $patientsData -> setEducationContactPerson($rs->fields["education_contact_person"]);
                $patientsData -> setOlderPersonBirth($rs->fields["older_person_birth"]);
                $patientsData -> setOlderPersonSex($rs->fields["older_person_sex"]);
                $patientsData -> setCreateTs($rs->fields["create_ts"]);
                $patientsData -> setUpdateTs($rs->fields["update_ts"]);

                $result[] = $patientsData;
                $rs->MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function getAlarm_4_2

        /**
         * El paciente comunica efectos secundarios en medicamentos
         * @return Ambigous <multitype:, PatientsData>
         */
        public function getAlarm_4_3() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute(
                "SELECT patients.id_string FROM patients JOIN patients_chatbot 
                ON patients.id = patients_chatbot.user_id
                WHERE (
                    (patients_chatbot.pregunta = 7 AND idcuestionario = 1 AND patients_chatbot.respuesta = 'SÍ') AND
            
                    (patients_chatbot.create_ts + 2592000) >= CURRENT_TIMESTAMP
            
                )
                " 
            );

            while (!$rs->EOF) {

                $patientsData = new PatientsData();

                $patientsData -> setId($rs->fields["id"]);
                $patientsData -> setIdString($rs->fields["id_string"]);
                $patientsData -> setIdCh($rs->fields["id_ch"]);
                $patientsData -> setEducationContactPerson($rs->fields["education_contact_person"]);
                $patientsData -> setOlderPersonBirth($rs->fields["older_person_birth"]);
                $patientsData -> setOlderPersonSex($rs->fields["older_person_sex"]);
                $patientsData -> setCreateTs($rs->fields["create_ts"]);
                $patientsData -> setUpdateTs($rs->fields["update_ts"]);

                $result[] = $patientsData;
                $rs->MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function getAlarm_4_3

        /**
         * El paciente indica que empieza a toser
         * @return Ambigous <multitype:, PatientsData>
         */
        public function getAlarm_4_4() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute(
                "SELECT patients.id_string FROM patients JOIN patients_chatbot 
                ON patients.id = patients_chatbot.user_id
                WHERE (
                    (patients_chatbot.pregunta = 6 AND idcuestionario = 1 AND patients_chatbot.respuesta = 'SÍ') AND
            
                    (patients_chatbot.create_ts + 2592000) >= CURRENT_TIMESTAMP
            
                )
                " 
            );

            while (!$rs->EOF) {

                $patientsData = new PatientsData();

                $patientsData -> setId($rs->fields["id"]);
                $patientsData -> setIdString($rs->fields["id_string"]);
                $patientsData -> setIdCh($rs->fields["id_ch"]);
                $patientsData -> setEducationContactPerson($rs->fields["education_contact_person"]);
                $patientsData -> setOlderPersonBirth($rs->fields["older_person_birth"]);
                $patientsData -> setOlderPersonSex($rs->fields["older_person_sex"]);
                $patientsData -> setCreateTs($rs->fields["create_ts"]);
                $patientsData -> setUpdateTs($rs->fields["update_ts"]);

                $result[] = $patientsData;
                $rs->MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function getAlarm_4_4

        /**
         * El paciente comunica que el cuesta respirar en la cama:
         * @return Ambigous <multitype:, PatientsData>
         */
        public function getAlarm_5_1() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute(
                "SELECT patients.id_string FROM patients JOIN patients_chatbot 
                ON patients.id = patients_chatbot.user_id
                WHERE (
                    (patients_chatbot.pregunta = 5 AND idcuestionario = 1 AND patients_chatbot.respuesta = 'SÍ') AND
            
                    (patients_chatbot.create_ts + 2592000) >= CURRENT_TIMESTAMP
            
                )
                " 
            );

            while (!$rs->EOF) {

                $patientsData = new PatientsData();

                $patientsData -> setId($rs->fields["id"]);
                $patientsData -> setIdString($rs->fields["id_string"]);
                $patientsData -> setIdCh($rs->fields["id_ch"]);
                $patientsData -> setEducationContactPerson($rs->fields["education_contact_person"]);
                $patientsData -> setOlderPersonBirth($rs->fields["older_person_birth"]);
                $patientsData -> setOlderPersonSex($rs->fields["older_person_sex"]);
                $patientsData -> setCreateTs($rs->fields["create_ts"]);
                $patientsData -> setUpdateTs($rs->fields["update_ts"]);

                $result[] = $patientsData;
                $rs->MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function getAlarm_5_1

        /**
         * El paciente comunica que el cuesta respirar en la cama:
         * @return Ambigous <multitype:, PatientsData>
         */
        public function getAlarm_5_2() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute(
                "SELECT patients.id_string FROM patients JOIN patients_chatbot 
                ON patients.id = patients_chatbot.user_id
                WHERE (
                    (patients_chatbot.pregunta = 4 AND idcuestionario = 1 AND patients_chatbot.respuesta = 'SÍ') AND
            
                    (patients_chatbot.create_ts + 2592000) >= CURRENT_TIMESTAMP
            
                )
                " 
            );

            while (!$rs->EOF) {

                $patientsData = new PatientsData();

                $patientsData -> setId($rs->fields["id"]);
                $patientsData -> setIdString($rs->fields["id_string"]);
                $patientsData -> setIdCh($rs->fields["id_ch"]);
                $patientsData -> setEducationContactPerson($rs->fields["education_contact_person"]);
                $patientsData -> setOlderPersonBirth($rs->fields["older_person_birth"]);
                $patientsData -> setOlderPersonSex($rs->fields["older_person_sex"]);
                $patientsData -> setCreateTs($rs->fields["create_ts"]);
                $patientsData -> setUpdateTs($rs->fields["update_ts"]);

                $result[] = $patientsData;
                $rs->MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function getAlarm_5_2

        /**
         * El paciente es paciente potencial de edema:
         * @return Ambigous <multitype:, PatientsData>
         */
        public function getAlarm_edema() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute(
                "SELECT patients.id_string FROM patients JOIN patients_chatbot 
                ON patients.id = patients_chatbot.user_id
                WHERE (
                    (patients_chatbot.pregunta = 1 AND idcuestionario = 1 AND (patients_chatbot.respuesta = 'peor' || patients_chatbot.respuesta = 'igual') ) AND
            
                    (patients_chatbot.create_ts + 2592000) >= CURRENT_TIMESTAMP
            
                )
                " 
            );

            while (!$rs->EOF) {

                $patientsData = new PatientsData();

                $patientsData -> setId($rs->fields["id"]);
                $patientsData -> setIdString($rs->fields["id_string"]);
                $patientsData -> setIdCh($rs->fields["id_ch"]);
                $patientsData -> setEducationContactPerson($rs->fields["education_contact_person"]);
                $patientsData -> setOlderPersonBirth($rs->fields["older_person_birth"]);
                $patientsData -> setOlderPersonSex($rs->fields["older_person_sex"]);
                $patientsData -> setCreateTs($rs->fields["create_ts"]);
                $patientsData -> setUpdateTs($rs->fields["update_ts"]);

                $result[] = $patientsData;
                $rs->MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function getAlarm_edema

        /**
         * 
         * Modificar registro persona
         * @param unknown_type $reg
         */
        public function alterReg(PatientsData $reg) {

            $db = GeneralDAO::getConnection();
            
            $db -> Execute( "BEGIN" );

            $rs = $db -> Execute( "
            		
            			UPDATE 
            				patients 
            			SET 
                            older_person_birth = ?,
                            older_person_sex = ?
            				
            			WHERE 
            				id = ? ",
                array(
                        $reg -> getOlderPersonBirth(),
                		$reg -> getOlderPersonSex(),
                        $reg -> getId()
            	)
            );
            
            $db->Execute( "COMMIT" );
                
            GeneralDAO::closeConnection($db);

        } // End function alterReg

    } // End PatientsDAO

?>