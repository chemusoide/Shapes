<?php

    require_once(DAO_DIR . "/GeneralDAO.php");
    require_once("Patients_devicesData.php");

    /**
     * 
     * Enter description here ...
     * @author Chema
     *
     */
    class Patients_devicesDAO {
    
        /**
         * Enter description here ...
         * @return Ambigous <multitype:, Patients_devicesData>
         */
        public function getAllregisters() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute( "SELECT * FROM patients_devices" );
            
            while (!$rs->EOF) {

                $patients_devicesData = new Patients_devicesData();

                $patients_devicesData -> setId($rs -> fields["id"]);
                $patients_devicesData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_devicesData -> setDeviceType($rs -> fields["device_type"]);
                $patients_devicesData -> setRecorDate($rs -> fields["record_date"]);
                $patients_devicesData -> setDeviceValue($rs -> fields["device_value"]);
                $patients_devicesData -> setUnit($rs -> fields["unit"]);
                $patients_devicesData -> setSourceId($rs -> fields["source_id"]);
                $patients_devicesData -> setDate_Receive($rs -> fields["date_receive"]);
                $patients_devicesData -> setCreateTs($rs -> fields["create_ts"]);

                $result[] = $patients_devicesData;
                $rs -> MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function

        /**
         * Enter description here ...
         * @param unknown_type $id
         * @return Patients_devicesData
         */
        public function getRegister($id) {

            $db = GeneralDAO::getConnection();
			
            $patients_devicesData = new Patients_devicesData();
            
       		$rs = $db->Execute( "SELECT * FROM patients_devices WHERE id_patient = ? ",
       		    array($id) );
            
            if (!$rs->EOF) {

                $patients_devicesData -> setId($rs -> fields["id"]);
                $patients_devicesData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_devicesData -> setDeviceType($rs -> fields["device_type"]);
                $patients_devicesData -> setRecorDate($rs -> fields["record_date"]);
                $patients_devicesData -> setDeviceValue($rs -> fields["device_value"]);
                $patients_devicesData -> setUnit($rs -> fields["unit"]);
                $patients_devicesData -> setSourceId($rs -> fields["source_id"]);
                $patients_devicesData -> setDate_Receive($rs -> fields["date_receive"]);
                $patients_devicesData -> setCreateTs($rs -> fields["create_ts"]);

            }
            
            GeneralDAO::closeConnection($db);
            
            return $patients_devicesData;

        } // End function

         /**
         * Enter description here ...
         * @return Ambigous <multitype:, Patients_devicesData>
         */
        public function getAllregistersForPatient($id) {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute( "SELECT * FROM patients_devices WHERE id_patient = ? ORDER BY record_date DESC",
            array($id) );
            
            while (!$rs->EOF) {

                $patients_devicesData = new Patients_devicesData();

                $patients_devicesData -> setId($rs -> fields["id"]);
                $patients_devicesData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_devicesData -> setDeviceType($rs -> fields["device_type"]);
                $patients_devicesData -> setRecorDate($rs -> fields["record_date"]);
                $patients_devicesData -> setDeviceValue($rs -> fields["device_value"]);
                $patients_devicesData -> setUnit($rs -> fields["unit"]);
                $patients_devicesData -> setSourceId($rs -> fields["source_id"]);
                $patients_devicesData -> setDate_Receive($rs -> fields["date_receive"]);
                $patients_devicesData -> setCreateTs($rs -> fields["create_ts"]);

                $result[] = $patients_devicesData;
                $rs -> MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function

         /**
         * Enter description here ...
         * @return Ambigous <multitype:, Patients_devicesData>
         */
        public function getAllregistersForPatientLimit($id) {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute( "SELECT * FROM patients_devices WHERE id_patient = ? ORDER BY record_date DESC LIMIT 1",
            array($id) );
            
            while (!$rs->EOF) {

                $patients_devicesData = new Patients_devicesData();

                $patients_devicesData -> setId($rs -> fields["id"]);
                $patients_devicesData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_devicesData -> setDeviceType($rs -> fields["device_type"]);
                $patients_devicesData -> setRecorDate($rs -> fields["record_date"]);
                $patients_devicesData -> setDeviceValue($rs -> fields["device_value"]);
                $patients_devicesData -> setUnit($rs -> fields["unit"]);
                $patients_devicesData -> setSourceId($rs -> fields["source_id"]);
                $patients_devicesData -> setDate_Receive($rs -> fields["date_receive"]);
                $patients_devicesData -> setCreateTs($rs -> fields["create_ts"]);

                $result[] = $patients_devicesData;
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

            $rs = $db->Execute( "SELECT * FROM patients_devices WHERE device_type = 'W' ORDER BY id_patient" );
            
            while (!$rs -> EOF) {

                $patients_devicesData = new Patients_devicesData();

                $patients_devicesData -> setId($rs -> fields["id"]);
                $patients_devicesData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_devicesData -> setDeviceType($rs -> fields["device_type"]);
                $patients_devicesData -> setRecorDate($rs -> fields["record_date"]);
                $patients_devicesData -> setDeviceValue($rs -> fields["device_value"]);
                $patients_devicesData -> setUnit($rs -> fields["unit"]);
                $patients_devicesData -> setSourceId($rs -> fields["source_id"]);
                $patients_devicesData -> setDate_Receive($rs -> fields["date_receive"]);
                $patients_devicesData -> setCreateTs($rs -> fields["create_ts"]);

                $result[] = $patients_devicesData;
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

            $rs = $db->Execute( "SELECT id_patient FROM patients_devices WHERE device_type = 'W' GROUP BY id_patient" );
            
            while (!$rs -> EOF) {

                $patients_devicesData = new Patients_devicesData();

                $patients_devicesData -> setId($rs -> fields["id"]);
                $patients_devicesData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_devicesData -> setDeviceType($rs -> fields["device_type"]);
                $patients_devicesData -> setRecorDate($rs -> fields["record_date"]);
                $patients_devicesData -> setDeviceValue($rs -> fields["device_value"]);
                $patients_devicesData -> setUnit($rs -> fields["unit"]);
                $patients_devicesData -> setSourceId($rs -> fields["source_id"]);
                $patients_devicesData -> setDate_Receive($rs -> fields["date_receive"]);
                $patients_devicesData -> setCreateTs($rs -> fields["create_ts"]);

                $result[] = $patients_devicesData;
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

            $rs = $db->Execute( "SELECT * FROM patients_devices WHERE id_patient = ? AND device_type = 'W' ORDER BY record_date DESC",
            array($id) );
            
            while (!$rs->EOF) {

                $patients_devicesData = new Patients_devicesData();

                $patients_devicesData -> setId($rs -> fields["id"]);
                $patients_devicesData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_devicesData -> setDeviceType($rs -> fields["device_type"]);
                $patients_devicesData -> setRecorDate($rs -> fields["record_date"]);
                $patients_devicesData -> setDeviceValue($rs -> fields["device_value"]);
                $patients_devicesData -> setUnit($rs -> fields["unit"]);
                $patients_devicesData -> setSourceId($rs -> fields["source_id"]);
                $patients_devicesData -> setDate_Receive($rs -> fields["date_receive"]);
                $patients_devicesData -> setCreateTs($rs -> fields["create_ts"]);

                $result[] = $patients_devicesData;
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

            $rs = $db->Execute( "SELECT * FROM patients_devices WHERE id_patient = ? AND device_type = 'W' ORDER BY record_date DESC LIMIT 1",
            array($id) );
            
            while (!$rs->EOF) {

                $patients_devicesData = new Patients_devicesData();

                $patients_devicesData -> setId($rs -> fields["id"]);
                $patients_devicesData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_devicesData -> setDeviceType($rs -> fields["device_type"]);
                $patients_devicesData -> setRecorDate($rs -> fields["record_date"]);
                $patients_devicesData -> setDeviceValue($rs -> fields["device_value"]);
                $patients_devicesData -> setUnit($rs -> fields["unit"]);
                $patients_devicesData -> setSourceId($rs -> fields["source_id"]);
                $patients_devicesData -> setDate_Receive($rs -> fields["date_receive"]);
                $patients_devicesData -> setCreateTs($rs -> fields["create_ts"]);

                $result[] = $patients_devicesData;
                $rs -> MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function

        /**
         * 
         * Modificar registro persona
         * @param unknown_type $reg
         */
        public function alterReg(Patients_devicesData $reg) {

            $db = GeneralDAO::getConnection();
            
            $db -> Execute( "BEGIN" );

            $rs = $db -> Execute( "
            		
            			UPDATE 
                            patients_devices
            			SET 
                            id_patient = ?,
                            device_type = ?,
                            device_value =?

            				
            			WHERE 
            				id = ? ",
                array(
                        $reg -> getIdPatient(),
                        $reg -> getDeviceType(),
                        $reg -> ggetDeviceValue()
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
        public function addReg(Patients_devicesData $reg) {

            $db = GeneralDAO::getConnection();
            
            $db -> Execute( "BEGIN" );

            $rs = $db -> Execute( "
            		
            	    INSERT INTO

                        patients_devices(

                            id_patient,
                            device_type,
                            device_value)

                    VALUES (?, ?, ?)",

                array(
                    $reg -> getIdPatient(),
                    $reg -> getDeviceType(),
                	$reg -> getDeviceValue()
                    )
            );
            
            $db->Execute( "COMMIT" );
                
            GeneralDAO::closeConnection($db);

        } // End function addReg

    } // End Class

?>