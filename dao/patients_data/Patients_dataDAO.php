<?php

    require_once(DAO_DIR . "/GeneralDAO.php");
    require_once("Patients_dataData.php");

    /**
     * 
     * Enter description here ...
     * @author Chema
     *
     */
    class Patients_dataDAO {
    
        /**
         * Enter description here ...
         * @return Ambigous <multitype:, Patients_dataData>
         */
        public function getAllregisters() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute( "SELECT * FROM patients_data" );
            
            while (!$rs->EOF) {

                $patients_dataData = new Patients_dataData();

                $patients_dataData -> setId($rs -> fields["id"]);
                $patients_dataData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_dataData -> setMetric($rs -> fields["metric"]);
                $patients_dataData -> setRecordDate($rs -> fields["record_date"]);
                $patients_dataData -> setDeviceValue($rs -> fields["device_value"]);
                $patients_dataData -> setUnit($rs -> fields["unit"]);
                $patients_dataData -> setSourceId($rs -> fields["source_id"]);
                $patients_dataData -> setDateReceived($rs -> fields["date_received"]);
                $patients_dataData -> setCreateTs($rs -> fields["create_ts"]);
                $patients_dataData -> setUpdateTs($rs -> fields["update_ts"]);


                $result[] = $patients_dataData;
                $rs -> MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function

        /**
         * Enter description here ...
         * @param unknown_type $id
         * @return Patients_dataData
         */
        public function getRegister($id) {

            $db = GeneralDAO::getConnection();
			
            $patients_dataData = new Patients_dataData();
            
       		$rs = $db->Execute( "SELECT * FROM patients_data WHERE id = ? ",
       		    array($id) );
            
            if (!$rs->EOF) {

                $patients_dataData -> setId($rs -> fields["id"]);
                $patients_dataData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_dataData -> setMetric($rs -> fields["metric"]);
                $patients_dataData -> setRecordDate($rs -> fields["record_date"]);
                $patients_dataData -> setDeviceValue($rs -> fields["device_value"]);
                $patients_dataData -> setUnit($rs -> fields["unit"]);
                $patients_dataData -> setSourceId($rs -> fields["source_id"]);
                $patients_dataData -> setDateReceived($rs -> fields["date_received"]);
                $patients_dataData -> setCreateTs($rs -> fields["create_ts"]);
                $patients_dataData -> setUpdateTs($rs -> fields["update_ts"]);

            }
            
            GeneralDAO::closeConnection($db);
            
            return $patients_dataData;

        } // End function

         /**
         * Enter description here ...
         * @return Ambigous <multitype:, Patients_devicesData>
         */
        public function getAllregistersForPatient($id) {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute( "SELECT * FROM patients_data WHERE id_patient = ? ORDER BY record_date DESC",
            array($id) );
            
            while (!$rs->EOF) {

                $patients_dataData = new Patients_dataData();

                $patients_dataData -> setId($rs -> fields["id"]);
                $patients_dataData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_dataData -> setMetric($rs -> fields["metric"]);
                $patients_dataData -> setRecordDate($rs -> fields["record_date"]);
                $patients_dataData -> setDeviceValue($rs -> fields["device_value"]);
                $patients_dataData -> setUnit($rs -> fields["unit"]);
                $patients_dataData -> setSourceId($rs -> fields["source_id"]);
                $patients_dataData -> setDateReceived($rs -> fields["date_receive"]);
                $patients_dataData -> setCreateTs($rs -> fields["create_ts"]);
                $patients_dataData -> setUpdateTs($rs -> fields["update_ts"]);

                $result[] = $patients_dataData;
                $rs -> MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function

        /**
         * Cogemos todos los registros de los pacientes que tienen peso ordenados por id de paciente
         * @return Ambigous <multitype:, Patients_devicesData>
         */
        public function getAllWeightRegister() {
        
            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute( "SELECT * FROM patients_data WHERE metric = 'body_weight' ORDER BY id_patient" );
            
            while (!$rs -> EOF) {

                $patients_dataData = new Patients_dataData();

                $patients_dataData -> setId($rs -> fields["id"]);
                $patients_dataData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_dataData -> setMetric($rs -> fields["metric"]);
                $patients_dataData -> setRecordDate($rs -> fields["record_date"]);
                $patients_dataData -> setDeviceValue($rs -> fields["device_value"]);
                $patients_dataData -> setUnit($rs -> fields["unit"]);
                $patients_dataData -> setSourceId($rs -> fields["source_id"]);
                $patients_dataData -> setDateReceived($rs -> fields["date_receive"]);
                $patients_dataData -> setCreateTs($rs -> fields["create_ts"]);
                $patients_dataData -> setUpdateTs($rs -> fields["update_ts"]);

                $result[] = $patients_dataData;
                $rs -> MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function

        /**
         * Cogemos todos los registros de los pacientes que tienen peso peso de los pacientes agrupados por id de paciente
         * @return Ambigous <multitype:, Patients_devicesData>
         */
        public function getAllWeightRegisterByID() {
        
            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute( "SELECT id_patient FROM patients_data WHERE metric = 'body_weight' ORDER BY id_patient" );
            
            while (!$rs -> EOF) {

                $patients_dataData = new Patients_dataData();

                $patients_dataData -> setId($rs -> fields["id"]);
                $patients_dataData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_dataData -> setMetric($rs -> fields["metric"]);
                $patients_dataData -> setRecordDate($rs -> fields["record_date"]);
                $patients_dataData -> setDeviceValue($rs -> fields["device_value"]);
                $patients_dataData -> setUnit($rs -> fields["unit"]);
                $patients_dataData -> setSourceId($rs -> fields["source_id"]);
                $patients_dataData -> setDateReceived($rs -> fields["date_receive"]);
                $patients_dataData -> setCreateTs($rs -> fields["create_ts"]);
                $patients_dataData -> setUpdateTs($rs -> fields["update_ts"]);

                $result[] = $patients_dataData;
                $rs -> MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function

        /**
         * Cogemos todos los registros de un paciente que tenga W ordenador descendientemente, el mas moderno arriba
         * @return Ambigous <multitype:, Patients_devicesData>
         */
        public function getAllregistersForPatientWithW($id) {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute( "SELECT * FROM patients_data WHERE id_patient = ? AND metric = 'body_weight' ORDER BY record_date DESC",
            array($id) );
            
            while (!$rs->EOF) {

                $patients_dataData = new Patients_dataData();

                $patients_dataData -> setId($rs -> fields["id"]);
                $patients_dataData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_dataData -> setMetric($rs -> fields["metric"]);
                $patients_dataData -> setRecordDate($rs -> fields["record_date"]);
                $patients_dataData -> setDeviceValue($rs -> fields["device_value"]);
                $patients_dataData -> setUnit($rs -> fields["unit"]);
                $patients_dataData -> setSourceId($rs -> fields["source_id"]);
                $patients_dataData -> setDateReceived($rs -> fields["date_receive"]);
                $patients_dataData -> setCreateTs($rs -> fields["create_ts"]);
                $patients_dataData -> setUpdateTs($rs -> fields["update_ts"]);

                $result[] = $patients_dataData;
                $rs -> MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function
        
         /**
         * Cogemos todos los registros de un paciente que tenga W ordenador descendientemente, el mas moderno arriba
         * @return Ambigous <multitype:, Patients_devicesData>
         */
        public function getAllRegistersForLastWeightByID($id) {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute( "SELECT * FROM patients_data WHERE id_patient = ? AND metric = 'body_weight' ORDER BY record_date DESC LIMIT 1",
            array($id) );
            
            while (!$rs->EOF) {

                $patients_dataData = new Patients_dataData();

                $patients_dataData -> setId($rs -> fields["id"]);
                $patients_dataData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_dataData -> setMetric($rs -> fields["metric"]);
                $patients_dataData -> setRecordDate($rs -> fields["record_date"]);
                $patients_dataData -> setDeviceValue($rs -> fields["device_value"]);
                $patients_dataData -> setUnit($rs -> fields["unit"]);
                $patients_dataData -> setSourceId($rs -> fields["source_id"]);
                $patients_dataData -> setDateReceived($rs -> fields["date_receive"]);
                $patients_dataData -> setCreateTs($rs -> fields["create_ts"]);
                $patients_dataData -> setUpdateTs($rs -> fields["update_ts"]);

                $result[] = $patients_dataData;
                $rs -> MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function

        /*MODIFICACIONES*/

        /**
         * 
         * Modificar registro persona
         * @param unknown_type $reg
         */
        public function alterReg(Patients_dataData $reg) {

            $db = GeneralDAO::getConnection();
            
            $db -> Execute( "BEGIN" );

            $rs = $db -> Execute( "
            		
            			UPDATE 
                            patients_data
            			SET 
                            id_patient = ?,
                            metric = ?,
                            device_value =?

            				
            			WHERE 
            				id = ? ",
                array(
                        $reg -> getIdPatient(),
                        $reg -> getMetric(),
                        $reg -> getDeviceValue()
            	)
            );
            
            $db->Execute( "COMMIT" );
                
            GeneralDAO::closeConnection($db);

        } // End function alterReg

        /**
         * 
         * Añadir registro peso
         * @param unknown_type $reg
         */
        public function addReg(Patients_dataData $reg) {

            $db = GeneralDAO::getConnection();
            
            $db -> Execute( "BEGIN" );

            $rs = $db -> Execute( "
            		
            	    INSERT INTO

                        patients_data(

                            id_patient,
                            metric,
                            device_value)

                    VALUES (?, ?, ?)",

                array(
                    $reg -> getIdPatient(),
                    $reg -> getMetric(),
                	$reg -> getDeviceValue()
                    )
            );
            
            $db->Execute( "COMMIT" );
                
            GeneralDAO::closeConnection($db);

        } // End function addReg


    } // End Class

?>