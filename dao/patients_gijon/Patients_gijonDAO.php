<?php

    require_once(DAO_DIR . "/GeneralDAO.php");
    require_once("Patients_gijonData.php");

    /**
     * 
     * Enter description here ...
     * @author Chema
     */
    class Patients_gijonDAO {
    
        /**
         * Enter description here ...
         * @return Ambigous <multitype:, Patients_gijonData>
         */
        public function getAllregisters() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute( "SELECT * FROM patients_gijon" );
            
            while (!$rs->EOF) {

                $patients_gijonData = new Patients_gijonData();

                $patients_gijonData -> setId($rs -> fields["id"]);
                $patients_gijonData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_gijonData -> setFamilySituation($rs -> fields["family_situation"]);
                $patients_gijonData -> setEconomicSituation($rs -> fields["economic_situation"]);
                $patients_gijonData -> setLivingPlace($rs -> fields["living_place"]);
                $patients_gijonData -> setSocialRelation($rs -> fields["social_relation"]);
                $patients_gijonData -> setSupportSocial($rs -> fields["support_social"]);
                $patients_gijonData -> setScore($rs -> fields["score"]);
                $patients_gijonData -> setCreateTs($rs -> fields["create_ts"]);

                $result[] = $patients_gijonData;
                $rs -> MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function

        /**
         * Enter description here ...
         * @param unknown_type $id
         * @return Patients_gijonData
         */
        public function getRegister($id) {

            $db = GeneralDAO::getConnection();
			
            $patients_gijonData = new Patients_gijonData();
            
       		$rs = $db->Execute( "SELECT * FROM patients_gijon id = ? ",
       		    array($id) );
            
            if (!$rs->EOF) {

                $patients_gijonData -> setId($rs -> fields["id"]);
                $patients_gijonData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_gijonData -> setFamilySituation($rs -> fields["family_situation"]);
                $patients_gijonData -> setEconomicSituation($rs -> fields["economic_situation"]);
                $patients_gijonData -> setLivingPlace($rs -> fields["living_place"]);
                $patients_gijonData -> setSocialRelation($rs -> fields["social_relation"]);
                $patients_gijonData -> setSupportSocial($rs -> fields["support_social"]);
                $patients_gijonData -> setScore($rs -> fields["score"]);
                $patients_gijonData -> setCreateTs($rs -> fields["create_ts"]);

            }
            
            GeneralDAO::closeConnection($db);
            
            return $patients_gijonData;

        } // End function

        /**
         * Enter description here ...
         * @return Ambigous <multitype:, Patients_gijonData>
         */
        public function getAllregistersForPatient($id) {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute( "SELECT * FROM patients_gijon WHERE id_patient = ?  ORDER BY create_ts DESC",
            array($id) );
            
            while (!$rs->EOF) {

                $patients_gijonData = new Patients_gijonData();

                $patients_gijonData -> setId($rs -> fields["id"]);
                $patients_gijonData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_gijonData -> setFamilySituation($rs -> fields["family_situation"]);
                $patients_gijonData -> setEconomicSituation($rs -> fields["economic_situation"]);
                $patients_gijonData -> setLivingPlace($rs -> fields["living_place"]);
                $patients_gijonData -> setSocialRelation($rs -> fields["social_relation"]);
                $patients_gijonData -> setSupportSocial($rs -> fields["support_social"]);
                $patients_gijonData -> setScore($rs -> fields["score"]);
                $patients_gijonData -> setCreateTs($rs -> fields["create_ts"]);

                $result[] = $patients_gijonData;
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
        public function alterReg(Patients_gijonData $reg) {

            $db = GeneralDAO::getConnection();
            
            $db -> Execute( "BEGIN" );

            $rs = $db -> Execute( "
            		
            			UPDATE 
                            patients_gijon 
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
        public function addReg(Patients_gijonData $reg) {

            $db = GeneralDAO::getConnection();
            
            $db -> Execute( "BEGIN" );

            $rs = $db -> Execute( "
            		
            	    INSERT INTO

                        patients_gijon(

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