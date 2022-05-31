<?php

    require_once(DAO_DIR . "/GeneralDAO.php");
    require_once("Patients_lab_analyticsData.php");

    /**
     * 
     * Enter description here ...
     * @author Chema
     * 
     */
    class Patients_lab_analyticsDAO {
    
        /**
         * Enter description here ...
         * @return Ambigous <multitype:, Patients_lab_analyticsData>
         */
        public function getAllregisters() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute( "SELECT * FROM patients_lab_analytics" );
            
            while (!$rs->EOF) {

                $patients_lab_analyticsData = new Patients_lab_analyticsData();

                $patients_lab_analyticsData -> setId($rs -> fields["id"]);
                $patients_lab_analyticsData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_lab_analyticsData -> setLabParam($rs -> fields["lab_param"]);
                $patients_lab_analyticsData -> setRecordDate($rs -> fields["record_date"]);
                $patients_lab_analyticsData -> setLabvalue($rs -> fields["lab_value"]);
                $patients_lab_analyticsData -> setCreateTs($rs -> fields["create_ts"]);

                $result[] = $patients_lab_analyticsData;
                $rs -> MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function

        /**
         * Enter description here ...
         * @param unknown_type $id
         * @return Patients_lab_analyticsData
         */
        public function getRegister($id) {

            $db = GeneralDAO::getConnection();
			
            $patients_lab_analyticsData = new Patients_lab_analyticsData();
            
       		$rs = $db->Execute( "SELECT * FROM patients_lab_analytics WHERE id_patient = ?",
       		    array($id) );

            if (!$rs->EOF) {

                $patients_lab_analyticsData -> setId($rs -> fields["id"]);
                $patients_lab_analyticsData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_lab_analyticsData -> setLabParam($rs -> fields["lab_param"]);
                $patients_lab_analyticsData -> setRecordDate($rs -> fields["record_date"]);
                $patients_lab_analyticsData -> setLabvalue($rs -> fields["lab_value"]);
                $patients_lab_analyticsData -> setCreateTs($rs -> fields["create_ts"]);

            }
            
            GeneralDAO::closeConnection($db);
            
            return $patients_lab_analyticsData;

        } // End function


         /**
         * Coge datos de un pacientes y los mete en un array
         * @return Ambigous <multitype:, Patients_lab_analyticsData>
         */
        public function getAllregistersForPatient($id) {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute( "SELECT * FROM patients_lab_analytics WHERE id_patient = ? ORDER BY create_ts DESC",
            array($id) );
            
            while (!$rs->EOF) {

                $patients_lab_analyticsData = new Patients_lab_analyticsData();

                $patients_lab_analyticsData -> setId($rs -> fields["id"]);
                $patients_lab_analyticsData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_lab_analyticsData -> setLabParam($rs -> fields["lab_param"]);
                $patients_lab_analyticsData -> setRecordDate($rs -> fields["record_date"]);
                $patients_lab_analyticsData -> setLabvalue($rs -> fields["lab_value"]);
                $patients_lab_analyticsData -> setCreateTs($rs -> fields["create_ts"]);

                $result[] = $patients_lab_analyticsData;
                $rs -> MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function

        /**
         * coge los registros de un paciente ordenado descendientemente
         * @param unknown_type $id
         * @return Patients_lab_analyticsData
         */
        public function getRegistersForPatient($id) {

            $db = GeneralDAO::getConnection();
			
            $patients_lab_analyticsData = new Patients_lab_analyticsData();
            
       		$rs = $db->Execute( "SELECT * FROM patients_lab_analytics WHERE id_patient = ? ORDER BY create_ts DESC",
       		    array($id) );

            if (!$rs->EOF) {

                $patients_lab_analyticsData -> setId($rs -> fields["id"]);
                $patients_lab_analyticsData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_lab_analyticsData -> setLabParam($rs -> fields["lab_param"]);
                $patients_lab_analyticsData -> setRecordDate($rs -> fields["record_date"]);
                $patients_lab_analyticsData -> setLabvalue($rs -> fields["lab_value"]);
                $patients_lab_analyticsData -> setCreateTs($rs -> fields["create_ts"]);

            }
            
            GeneralDAO::closeConnection($db);
            
            return $patients_lab_analyticsData;

        } // End function

        /**
         * 
         * añade un registro analytics
         * @param unknown_type $reg
         */
        public function addReg(Patients_lab_analyticsData $reg) {

            $db = GeneralDAO::getConnection();
            
            $db -> Execute( "BEGIN" );

            $rs = $db -> Execute( "
            		
            			INSERT INTO 
                            patients_lab_analytics(

                                id_patient,
                                lab_param,
                                lab_value)
 
                        VALUES (?, ?, ?)",

                array(
                        $reg -> getIdPatient(),
                        $reg -> getLabParam(),
                        $reg -> getLabvalue()

            	)
            );
            
            $db->Execute( "COMMIT" );
                
            GeneralDAO::closeConnection($db);

        } // End function addReg

         /**
         * 
         * modifica un registro analytics
         * @param unknown_type $reg
         */
        public function alterReg(Patients_lab_analyticsData $reg) {

            $db = GeneralDAO::getConnection();
            
            $db -> Execute( "BEGIN" );

            $rs = $db -> Execute( "
            		
            			UPDATE 
                            patients_lab_analytics
            			SET 
                            id_patient = ?,
                            lab_param = ?,
                            lab_value = ?,

                            id_patient = ?,
                            lab_param = ?,
                            lab_value = ?,

                            id_patient = ?,
                            lab_param = ?,
                            lab_value = ?,

                            id_patient = ?,
                            lab_param = ?,
                            lab_value = ?,

                            id_patient = ?,
                            lab_param = ?,
                            lab_value = ?
            				
            			WHERE 
            				id = ?",

                array(
                        $reg -> getIdPatient(),
                        $reg -> getDeviceType(),
                        $reg -> getDeviceValue(),

                        $reg -> getIdPatient(),
                        $reg -> getDeviceType(),
                        $reg -> getDeviceValue(),

                        $reg -> getIdPatient(),
                        $reg -> getDeviceType(),
                        $reg -> getDeviceValue(),

                        $reg -> getIdPatient(),
                        $reg -> getDeviceType(),
                        $reg -> getDeviceValue(),

                        $reg -> getIdPatient(),
                        $reg -> getDeviceType(),
                        $reg -> getDeviceValue(),

                        $reg -> getId()
            	)
            );
            
            $db->Execute( "COMMIT" );
                
            GeneralDAO::closeConnection($db);

        } // End function alterReg


    } // End Class

?>