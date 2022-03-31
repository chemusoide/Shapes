<?php

    require_once(DAO_DIR . "/GeneralDAO.php");
    require_once("Patients_medicinesData.php");

    /**
     * 
     * Enter description here ...
     * @author Chema
     *
     */
    class Patients_medicinesDAO {
    
        /**
         * Enter description here ...
         * @return Ambigous <multitype:, Patients_medicinesData>
         */
        public function getAllregisters() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute( "SELECT * FROM patients_medicines" );
            
            while (!$rs->EOF) {

                $patients_medicinesData = new Patients_medicinesData();

                $patients_medicinesData -> setId($rs -> fields["id"]);
                $patients_medicinesData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_medicinesData -> setMedicineName($rs -> fields["medicine_name"]);
                $patients_medicinesData -> setMedicineStrenght($rs -> fields["medicine_strenght"]);
                $patients_medicinesData -> setMedicineUnits($rs -> fields["medicine_units"]);
                $patients_medicinesData -> setMedicineFrequency($rs -> fields["medicine_frequency"]);
                $patients_medicinesData -> setMedicineDateStarted($rs -> fields["medicine_date_started"]);
                $patients_medicinesData -> setMedicineDateStopped($rs -> fields["medicine_date_stopped"]);
                $patients_medicinesData -> setMedicineChronic($rs -> fields["medicine_chronic"]);
                $patients_medicinesData -> setNumberMedicines($rs -> fields["number_medicines"]);
                $patients_medicinesData -> setCreateTs($rs -> fields["create_ts"]);

                $result[] = $patients_medicinesData;
                $rs -> MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function

        /**
         * Enter description here ...
         * @param unknown_type $id
         * @return Patients_medicinesData
         */
        public function getRegister($id) {

            $db = GeneralDAO::getConnection();
			
            $patients_medicinesData = new Patients_medicinesData();
            
       		$rs = $db->Execute( "SELECT * FROM patients_medicines WHERE id = ? ",
       		    array($id) );
            
            if (!$rs->EOF) {

                $patients_medicinesData -> setId($rs -> fields["id"]);
                $patients_medicinesData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_medicinesData -> setMedicineName($rs -> fields["medicine_name"]);
                $patients_medicinesData -> setMedicineStrenght($rs -> fields["medicine_strenght"]);
                $patients_medicinesData -> setMedicineUnits($rs -> fields["medicine_units"]);
                $patients_medicinesData -> setMedicineFrequency($rs -> fields["medicine_frequency"]);
                $patients_medicinesData -> setMedicineDateStarted($rs -> fields["medicine_date_started"]);
                $patients_medicinesData -> setMedicineDateStopped($rs -> fields["medicine_date_stopped"]);
                $patients_medicinesData -> setMedicineChronic($rs -> fields["medicine_chronic"]);
                $patients_medicinesData -> setNumberMedicines($rs -> fields["number_medicines"]);
                $patients_medicinesData -> setCreateTs($rs -> fields["create_ts"]);

            }
            
            GeneralDAO::closeConnection($db);
            
            return $patients_medicinesData;

        } // End function


    } // End Class

?>