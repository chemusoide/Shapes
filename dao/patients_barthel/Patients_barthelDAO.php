<?php

    require_once(DAO_DIR . "/GeneralDAO.php");
    require_once("Patients_barthelData.php");

    /**
     * 
     * Enter description here ...
     * @author Chema
     *
     */
    class Patients_barthelDAO {
    
        /**
         * Enter description here ...
         * @return Ambigous <multitype:, Patients_barthelData>
         */
        public function getAllregisters() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute( "SELECT * FROM patients_barthel" );
            
            while (!$rs->EOF) {

                $patients_barthelData = new Patients_barthelData();

                $patients_barthelData -> setId($rs -> fields["id"]);
                $patients_barthelData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_barthelData -> setBowels($rs -> fields["bowels"]);
                $patients_barthelData -> setBladder($rs -> fields["bladder"]);
                $patients_barthelData -> setGrooming($rs -> fields["grooming"]);
                $patients_barthelData -> setToiletUse($rs -> fields["toilet_use"]);
                $patients_barthelData -> setFeeding($rs -> fields["feeding"]);
                $patients_barthelData -> setTransfer($rs -> fields["transfer"]);
                $patients_barthelData -> setMobility($rs -> fields["mobility"]);
                $patients_barthelData -> setDressing($rs -> fields["dressing"]);
                $patients_barthelData -> setStairs($rs -> fields["stairs"]);
                $patients_barthelData -> setBathing($rs -> fields["bathing"]);
                $patients_barthelData -> setScore($rs -> fields["score"]);
                $patients_barthelData -> setCreateTs($rs -> fields["create_ts"]);
               

                $result[] = $patients_barthelData;
                $rs -> MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function

        /**
         * Enter description here ...
         * @param unknown_type $id
         * @return Patients_barthelData
         */
        public function getRegister($id) {

            $db = GeneralDAO::getConnection();
			
            $patients_barthelData = new Patients_barthelData();
            
       		$rs = $db->Execute( "SELECT * FROM patients_barthel WHERE id = ?",
       		    array($id) );
            
            if (!$rs->EOF) {

                $patients_barthelData -> setId($rs -> fields["id"]);
                $patients_barthelData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_barthelData -> setBowels($rs -> fields["bowels"]);
                $patients_barthelData -> setBladder($rs -> fields["bladder"]);
                $patients_barthelData -> setGrooming($rs -> fields["grooming"]);
                $patients_barthelData -> setToiletUse($rs -> fields["toilet_use"]);
                $patients_barthelData -> setFeeding($rs -> fields["feeding"]);
                $patients_barthelData -> setTransfer($rs -> fields["transfer"]);
                $patients_barthelData -> setMobility($rs -> fields["mobility"]);
                $patients_barthelData -> setDressing($rs -> fields["dressing"]);
                $patients_barthelData -> setStairs($rs -> fields["stairs"]);
                $patients_barthelData -> setBathing($rs -> fields["bathing"]);
                $patients_barthelData -> setScore($rs -> fields["score"]);
                $patients_barthelData -> setCreateTs($rs -> fields["create_ts"]);

            }
            
            GeneralDAO::closeConnection($db);
            
            return $patients_barthelData;

        } // End function

        /**
         * Enter description here ...
         * @return Ambigous <multitype:, Patients_barthelData>
         */
        public function getAllregistersForPatient($id) {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute( "SELECT * FROM patients_barthel WHERE id_patient = ? ORDER BY create_ts DESC",
            array($id) );
            
            while (!$rs->EOF) {

                $patients_barthelData = new Patients_barthelData();

                $patients_barthelData -> setId($rs -> fields["id"]);
                $patients_barthelData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_barthelData -> setBowels($rs -> fields["bowels"]);
                $patients_barthelData -> setBladder($rs -> fields["bladder"]);
                $patients_barthelData -> setGrooming($rs -> fields["grooming"]);
                $patients_barthelData -> setToiletUse($rs -> fields["toilet_use"]);
                $patients_barthelData -> setFeeding($rs -> fields["feeding"]);
                $patients_barthelData -> setTransfer($rs -> fields["transfer"]);
                $patients_barthelData -> setMobility($rs -> fields["mobility"]);
                $patients_barthelData -> setDressing($rs -> fields["dressing"]);
                $patients_barthelData -> setStairs($rs -> fields["stairs"]);
                $patients_barthelData -> setBathing($rs -> fields["bathing"]);
                $patients_barthelData -> setScore($rs -> fields["score"]);
                $patients_barthelData -> setCreateTs($rs -> fields["create_ts"]);
               

                $result[] = $patients_barthelData;
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
        public function alterReg(Patients_barthelData $reg) {

            $db = GeneralDAO::getConnection();
            
            $db -> Execute( "BEGIN" );

            $rs = $db -> Execute( "
            		
            			UPDATE 
                            patients_barthel 
            			SET 
                            id_patient = ?,
                            score = ?
            				
            			WHERE 
            				id = ? ",
                array(
                        $reg -> getIdPatient(),
                		$reg -> getScore()
            	)
            );
            
            $db->Execute( "COMMIT" );
                
            GeneralDAO::closeConnection($db);

        } // End function alterReg

        /**
         * 
         * Añade un registro barthel
         * @param unknown_type $reg
         */
        public function addReg(Patients_barthelData $reg) {

            $db = GeneralDAO::getConnection();
            
            $db -> Execute( "BEGIN" );

            $rs = $db -> Execute( "
            		
            	    INSERT INTO

                        patients_barthel(

                            id_patient,
                            score)

                    VALUES (?, ?)",

                array(
                    $reg -> getIdPatient(),
                	$reg -> getScore()
                    )
            );
            
            $db->Execute( "COMMIT" );
                
            GeneralDAO::closeConnection($db);

        } // End function addReg

    } // End Class

?>