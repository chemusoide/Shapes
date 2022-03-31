<?php

    require_once(DAO_DIR . "/GeneralDAO.php");
    require_once("Patients_ecfsData.php");

    /**
     * 
     * Enter description here ...
     * @author Chema
     */
    class Patients_ecfsDAO {
    
        /**
         * Enter description here ...
         * @return Ambigous <multitype:, Patients_ecfsData>
         */
        public function getAllregisters() {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute( "SELECT * FROM patients_ecfs" );
            
            while (!$rs->EOF) {

                $patients_ecfsData = new Patients_ecfsData();

                $patients_ecfsData -> setId($rs -> fields["id"]);
                $patients_ecfsData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_ecfsData -> setWeigh($rs -> fields["weigh"]);
                $patients_ecfsData -> setShortBreath($rs -> fields["short_breath"]);
                $patients_ecfsData -> setShortBreathIncrease($rs -> fields["short_breath_increase"]);
                $patients_ecfsData -> setFeetSwollen($rs -> fields["feet_swollen"]);
                $patients_ecfsData -> setTwoKg($rs -> fields["two_kg"]);
                $patients_ecfsData -> setFluidsLimit($rs -> fields["fluids_limit"]);
                $patients_ecfsData -> setRestDay($rs -> fields["rest_day"]);
                $patients_ecfsData -> setIncreaseFatigue($rs -> fields["increase_fatigue"]);
                $patients_ecfsData -> setLowSaltDiet($rs -> fields["low_salt_diet"]);
                $patients_ecfsData -> setMedicine($rs -> fields["medicine"]);
                $patients_ecfsData -> setFluShot($rs -> fields["flu_shot"]);
                $patients_ecfsData -> setExercise($rs -> fields["exercise"]);
                $patients_ecfsData -> setScore($rs -> fields["score"]);
                $patients_ecfsData -> setCreateTs($rs -> fields["create_ts"]);

                $result[] = $patients_ecfsData;
                $rs -> MoveNext();

            }
            
            GeneralDAO::closeConnection($db);

            return $result;

        } // End function

        /**
         * Enter description here ...
         * @param unknown_type $id
         * @return Patients_ecfsData
         */
        public function getRegister($id) {

            $db = GeneralDAO::getConnection();
			
            $patients_ecfsData = new Patients_ecfsData();
            
       		$rs = $db->Execute( "SELECT * FROM patients_ecfs WHERE id = ? ",
       		    array($id) );
            
            if (!$rs->EOF) {

                $patients_ecfsData -> setId($rs -> fields["id"]);
                $patients_ecfsData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_ecfsData -> setWeigh($rs -> fields["weigh"]);
                $patients_ecfsData -> setShortBreath($rs -> fields["short_breath"]);
                $patients_ecfsData -> setShortBreathIncrease($rs -> fields["short_breath_increase"]);
                $patients_ecfsData -> setFeetSwollen($rs -> fields["feet_swollen"]);
                $patients_ecfsData -> setTwoKg($rs -> fields["two_kg"]);
                $patients_ecfsData -> setFluidsLimit($rs -> fields["fluids_limit"]);
                $patients_ecfsData -> setRestDay($rs -> fields["rest_day"]);
                $patients_ecfsData -> setIncreaseFatigue($rs -> fields["increase_fatigue"]);
                $patients_ecfsData -> setLowSaltDiet($rs -> fields["low_salt_diet"]);
                $patients_ecfsData -> setMedicine($rs -> fields["medicine"]);
                $patients_ecfsData -> setFluShot($rs -> fields["flu_shot"]);
                $patients_ecfsData -> setExercise($rs -> fields["exercise"]);
                $patients_ecfsData -> setScore($rs -> fields["score"]);
                $patients_ecfsData -> setCreateTs($rs -> fields["create_ts"]);
            }
            
            GeneralDAO::closeConnection($db);
            
            return $patients_ecfsData;

        } // End function

        /**
         * Enter description here ...
         * @return Ambigous <multitype:, Patients_ecfsData>
         */
        public function getAllregistersForPatient($id) {

            $db = GeneralDAO::getConnection();

            $result = array();

            $rs = $db->Execute( "SELECT * FROM patients_ecfs WHERE id_patient = ? ORDER BY create_ts DESC",
            array($id) );
            
            while (!$rs->EOF) {

                $patients_ecfsData = new Patients_ecfsData();

                $patients_ecfsData -> setId($rs -> fields["id"]);
                $patients_ecfsData -> setIdPatient($rs -> fields["id_patient"]);
                $patients_ecfsData -> setWeigh($rs -> fields["weigh"]);
                $patients_ecfsData -> setShortBreath($rs -> fields["short_breath"]);
                $patients_ecfsData -> setShortBreathIncrease($rs -> fields["short_breath_increase"]);
                $patients_ecfsData -> setFeetSwollen($rs -> fields["feet_swollen"]);
                $patients_ecfsData -> setTwoKg($rs -> fields["two_kg"]);
                $patients_ecfsData -> setFluidsLimit($rs -> fields["fluids_limit"]);
                $patients_ecfsData -> setRestDay($rs -> fields["rest_day"]);
                $patients_ecfsData -> setIncreaseFatigue($rs -> fields["increase_fatigue"]);
                $patients_ecfsData -> setLowSaltDiet($rs -> fields["low_salt_diet"]);
                $patients_ecfsData -> setMedicine($rs -> fields["medicine"]);
                $patients_ecfsData -> setFluShot($rs -> fields["flu_shot"]);
                $patients_ecfsData -> setExercise($rs -> fields["exercise"]);
                $patients_ecfsData -> setScore($rs -> fields["score"]);
                $patients_ecfsData -> setCreateTs($rs -> fields["create_ts"]);

                $result[] = $patients_ecfsData;
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
        public function alterReg(Patients_ecfsData $reg) {

            $db = GeneralDAO::getConnection();
            
            $db -> Execute( "BEGIN" );

            $rs = $db -> Execute( "
            		
            			UPDATE 
                            patients_ecfs 
            			SET 
                            id_patient = ?,
                            score = ?
            				
            			WHERE 
            				id = ? ",
                array(
                        $reg -> getHeight(),
                		$reg -> getScore(),
                        $reg -> getId()
            	)
            );
            
            $db->Execute( "COMMIT" );
                
            GeneralDAO::closeConnection($db);

        } // End function alterReg

                /**
         * 
         * Añade un registro ecfs
         * @param unknown_type $reg
         */
        public function addReg(Patients_ecfsData $reg) {

            $db = GeneralDAO::getConnection();
            
            $db -> Execute( "BEGIN" );

            $rs = $db -> Execute( "
            		
            	    INSERT INTO

                        patients_ecfs(

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