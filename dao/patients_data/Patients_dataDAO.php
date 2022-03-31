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


    } // End Class

?>