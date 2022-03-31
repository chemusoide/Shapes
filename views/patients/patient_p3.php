<?php

    if (defined("SECURITY_CONSTANT")) {

        $bodyId = "patient_p3";
        $pageTitle_01 = "Questionaries";
        $pageTitle_02 = "ChatBot";

        require_once(SKEL_DIR . "/cabecera.php");
        
        require_once(SKEL_DIR . "/headStart.php");
        
        require_once(SKEL_DIR . "/headEnd.php");
        
        require_once(SKEL_DIR . "/bodyStart.php");
        
        require_once(SKEL_DIR . "/sidebar.php");
        
        require_once(SKEL_DIR . "/contentWrapper.php");

        // Creamos la función fcolor para cambiar el color de las casillas en las tablas según la numeración
        // si es tipo 3 son valores del 0..3 y el resto valores del 0..5
        function fcolor ($value, $tipo) {

            if ($tipo == 3) {

                switch ($value) {
                    case "0":
                        $text_color = "text-success";
                        break;
                            
                    case "1":
                        $text_color = "text-primary";
                        break;
                    
                    case "2":
                        $text_color = "text-warning";
                        break;

                    case "3":
                        $text_color = "text-danger";
                        break;
                    
                } //End switch
            } else {
            
                switch ($value) {
                    case "0":
                        $text_color = "text-success";
                        break;
                            
                    case "1":
                        $text_color = "text-success";
                        break;
                    
                    case "2":
                        $text_color = "text-primary";
                        break;

                    case "3":
                        $text_color = "text-warning";
                        break;

                    case "4":
                        $text_color = "text-warning";
                        break;

                    case "5":
                        $text_color = "text-danger";
                        break;
                    
                } //End switch
                
            }//End if
            return $text_color;

        }// End function

?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"> ID Patient: <?php echo $patients->getIdString() ?></h1>

            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $pageTitle_01 ?></h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php
                            
                            //Contamos las líneas de barthel de un usuario
                            $num_patients_barthel = count($patients_barthel);
                            
                            for ($i = 0; $i < $num_patients_barthel; $i++) {

                                $patients_barthel_object = (object)$patients_barthel[$i];

                                //guardamos la fecha
                                $patients_barthel_time_stamp = $patients_barthel_object -> getCreateTs();

                                #Creamos el objeto
                                $patients_barthel_time_stamp_object =new DateTime($patients_barthel_time_stamp);
                                
                                //Lo vamos guardoad en el formato deseado en un array (quedan todas las líneas guardadas y por tanto hay repetido)
                                //Fuera del for quitamos las repetidas
                                $patients_barthel_date_dd_mm_yyyy_raw[] = $patients_barthel_time_stamp_object->format("j/m/Y"); 
                                
                                //obtenemos la puntación de barthel
                                $patients_barthel_score[] = $patients_barthel_object -> getScore();

                                //Obtenemos el resto de datos
                                $patien_barthel_bowels[] = $patients_barthel_object -> getBowels();
                                $patien_barthel_bladder[] = $patients_barthel_object -> getBladder();
                                $patien_barthel_grooming[] = $patients_barthel_object -> getGrooming();
                                $patien_barthel_toilet_use[] = $patients_barthel_object -> getToiletUse();
                                $patien_barthel_feeding[] = $patients_barthel_object -> getFeeding();
                                $patien_barthel_transfer[] = $patients_barthel_object -> getTransfer();
                                $patien_barthel_mobility[] = $patients_barthel_object -> getMobility();
                                $patien_barthel_dressing[] = $patients_barthel_object -> getDressing();
                                $patien_barthel_stairs[] = $patients_barthel_object -> getStairs();
                                $patien_barthel_bathing[] = $patients_barthel_object -> getBathing();

                            } //end for

                            //Contamos las líneas de ecfs de un usuario
                            $num_patients_ecfs = count($patients_ecfs);
                            
                            for ($i = 0; $i < $num_patients_ecfs; $i++) {

                                $patients_ecfs_object = (object)$patients_ecfs[$i];

                                //guardamos la fecha
                                $patients_ecfs_time_stamp = $patients_ecfs_object -> getCreateTs();

                                #Creamos el objeto
                                $patients_ecfs_time_stamp_object =new DateTime($patients_ecfs_time_stamp);
                                
                                //Lo vamos guardoad en el formato deseado en un array (quedan todas las líneas guardadas y por tanto hay repetido)
                                //Fuera del for quitamos las repetidas
                                $patients_ecfs_date_dd_mm_yyyy_raw[] = $patients_ecfs_time_stamp_object->format("j/m/Y"); 
                                
                                //obtenemos la puntación de ecfs
                                $patients_ecfs_score[] = $patients_ecfs_object -> getScore();

                                //Obtenemos el resto de datos
                                $patients_ecfs_weigh[] = $patients_ecfs_object -> getWeigh();
                                $patients_ecfs_shortBreath[] = $patients_ecfs_object -> getShortBreath();
                                $patients_ecfs_shortBreathIncrease[] = $patients_ecfs_object -> getShortBreathIncrease();
                                $patients_ecfs_feetSwollen[] = $patients_ecfs_object -> getFeetSwollen();
                                $patients_ecfs_twoKg[] = $patients_ecfs_object -> getTwoKg();
                                $patients_ecfs_fluidsLimit[] = $patients_ecfs_object -> getFluidsLimit();
                                $patients_ecfs_restDay[] = $patients_ecfs_object -> getRestDay();
                                $patients_ecfs_increaseFatigue[] = $patients_ecfs_object -> getIncreaseFatigue();
                                $patients_ecfs_lowSaltDiet[] = $patients_ecfs_object -> getLowSaltDiet();
                                $patients_ecfs_medicine[] = $patients_ecfs_object -> getMedicine();
                                $patients_ecfs_fluShot[] = $patients_ecfs_object -> getFluShot();
                                $patients_ecfs_exercise[] = $patients_ecfs_object -> getExercise();

                            } //End for

                            //Contamos las líneas de gijon de un usuario
                            $num_patients_gijon = count($patients_gijon);
                            
                            for ($i = 0; $i < $num_patients_gijon; $i++) {

                                $patients_gijon_object = (object)$patients_gijon[$i];

                                //guardamos la fecha
                                $patients_gijon_time_stamp = $patients_gijon_object -> getCreateTs();

                                #Creamos el objeto
                                $patients_gijon_time_stamp_object =new DateTime($patients_gijon_time_stamp);
                                
                                //Lo vamos guardoad en el formato deseado en un array (quedan todas las líneas guardadas y por tanto hay repetido)
                                //Fuera del for quitamos las repetidas
                                $patients_gijon_date_dd_mm_yyyy_raw[] = $patients_gijon_time_stamp_object->format("j/m/Y"); 
                                
                                //obtenemos la puntación de gijon
                                $patients_gijon_score[] = $patients_gijon_object -> getScore();

                                //Obtenemos el resto de datos
                                $patients_gijon_familySituation[] = $patients_gijon_object -> getFamilySituation();
                                $patients_gijon_economicSituation[] = $patients_gijon_object -> getEconomicSituation();
                                $patients_gijon_livingPlace[] = $patients_gijon_object -> getLivingPlace();
                                $patients_gijon_socialRelation[] = $patients_gijon_object -> getSocialRelation();
                                $patients_gijon_supportSocial[] = $patients_gijon_object -> getSupportSocial();

                            } //End for

                        ?>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    BARTHEL INDEX <?php echo "($patients_barthel_date_dd_mm_yyyy_raw[0])";?>
                                </div>
                                <div class="card-body">
                                    <?php
                                        echo $patients_barthel_score[0];
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    ECFSCBS <?php echo "($patients_ecfs_date_dd_mm_yyyy_raw[0])";?>
                                </div>
                                <div class="card-body">
                                    <?php
                                        echo $patients_ecfs_score[0];
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    GIJON SOCIO-FAMILY ASSESSMENT SCALE <?php echo "($patients_gijon_date_dd_mm_yyyy_raw[0])";?>
                                </div>
                                <div class="card-body">
                                    <?php
                                        echo $patients_gijon_score[0];
                                    ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-row -->

                </div> 
                <!-- /.card-body --> 
            </div>
            <!-- /.card-shadow -->
            

            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $pageTitle_02; ?></h6>
                </div>
                <div class="card-body">
                    
                    <div class="row">    

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    CHATBOT 1
                                </div>
                                
                                <div class="card-body">
                                    <?php

                                        switch ($num_patients_barthel){

                                            case 1:

                                                ?>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered"  width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>Questions</th>
                                                                <th><?php echo $patients_barthel_date_dd_mm_yyyy_raw[0];?></th>
                                                            </tr>
                                                        </thead>
                                                        
                                                        <tbody>
                                                        
                                                            <tr>
                                                                <td>
                                                                    <strong>Bowels</strong> 
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_bowels[0], 3); ?>><?php echo $patien_barthel_bowels[0]; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Bladder</strong> 
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_bladder[0], 3); ?>><?php echo $patien_barthel_bladder[0]; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Grooming</strong> 
                                                                </td>
                                                                <td>
                                                                <p class = <?php echo fcolor ($patien_barthel_grooming[0], 3); ?>><?php echo $patien_barthel_grooming[0]; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Toilet use</strong> 
                                                                </td>
                                                                <td>
                                                                <p class = <?php echo fcolor ($patien_barthel_toilet_use[0], 3); ?>><?php echo $patien_barthel_toilet_use[0]; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Feeding</strong> 
                                                                </td>
                                                                <td>
                                                                <p class = <?php echo fcolor ($patien_barthel_feeding[0], 3); ?>><?php echo $patien_barthel_feeding[0]; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Transfer</strong> 
                                                                </td>
                                                                <td>
                                                                <p class = <?php echo fcolor ($patien_barthel_feeding[0], 3); ?>><?php echo $patien_barthel_feeding[0]; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Mobility</strong> 
                                                                </td>
                                                                <td>
                                                                <p class = <?php echo fcolor ($patien_barthel_mobility[0], 3); ?>><?php echo $patien_barthel_mobility[0]; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Dressing</strong> 
                                                                </td>
                                                                <td>
                                                                <p class = <?php echo fcolor ($patien_barthel_dressing[0], 3); ?>> <?php echo $patien_barthel_dressing[0]; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Stairs</strong> 
                                                                </td>
                                                                <td>
                                                                <p class = <?php echo fcolor ($patien_barthel_stairs[0], 3); ?>><?php echo $patien_barthel_stairs[0]; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Bathing</strong> 
                                                                </td>
                                                                <td>
                                                                <p class = <?php echo fcolor ($patien_barthel_bathing[0], 3); ?>><?php echo $patien_barthel_bathing[0]; ?>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.table-responsive -->
                                                <?php
                                                break;


                                            case 2:
                                                
                                                ?>

                                                <div class="table-responsive">
                                                    <table class="table table-bordered"  width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>Questions</th>
                                                                <th><?php echo $patients_barthel_date_dd_mm_yyyy_raw[0];?></th>
                                                                <th><?php echo $patients_barthel_date_dd_mm_yyyy_raw[1];?></th>
                                                            </tr>
                                                        </thead>
                                                        
                                                        <tbody>
                                                        
                                                            <tr>
                                                                <td>
                                                                    <strong>Bowels</strong> 
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_bowels[0], 3); ?>><?php echo $patien_barthel_bowels[0]; ?></p>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_bowels[1], 3); ?>><?php echo $patien_barthel_bowels[1]; ?></p>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Bladder</strong> 
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_bladder[0], 3); ?>><?php echo $patien_barthel_bladder[0]; ?></p>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_bladder[1], 3); ?>><?php echo $patien_barthel_bladder[1]; ?></p>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Grooming</strong> 
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_grooming[0], 3); ?>><?php echo $patien_barthel_grooming[0]; ?>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_grooming[1], 3); ?>><?php echo $patien_barthel_grooming[1]; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Toilet use</strong> 
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_toilet_use[0], 3); ?>><?php echo $patien_barthel_toilet_use[0]; ?>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_toilet_use[1], 3); ?>><?php echo $patien_barthel_toilet_use[1]; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Feeding</strong> 
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_feeding[0], 3); ?>><?php echo $patien_barthel_feeding[0]; ?>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_feeding[1], 3); ?>><?php echo $patien_barthel_feeding[1]; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Transfer</strong> 
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_transfer[0], 3); ?>><?php echo $patien_barthel_transfer[0]; ?>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_transfer[1], 3); ?>><?php echo $patien_barthel_transfer[1]; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Mobility</strong> 
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_mobility[0], 3); ?>><?php echo $patien_barthel_mobility[0]; ?>
                                                                </td>
                                                                <td>
                                                                <p class = <?php echo fcolor ($patien_barthel_mobility[1], 3); ?>><?php echo $patien_barthel_mobility[1]; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Dressing</strong> 
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_dressing[0], 3); ?>><?php echo $patien_barthel_dressing[0]; ?>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_dressing[1], 3); ?>><?php echo $patien_barthel_dressing[1]; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Stairs</strong> 
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_stairs[0], 3); ?>><?php echo $patien_barthel_stairs[0]; ?>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_stairs[1], 3); ?>><?php echo $patien_barthel_stairs[1]; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Bathing</strong> 
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_bathing[0], 3); ?>><?php echo $patien_barthel_bathing[0]; ?>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_bathing[1], 3); ?>><?php echo $patien_barthel_bathing[1]; ?>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.table-responsive -->
                                                <?php
                                                break;
                                            
                                            case ($num_patients_barthel >= 3):
                                                ?>

                                                <div class="table-responsive">
                                                    <table class="table table-bordered"  width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>Questions</th>
                                                                <th><?php echo $patients_barthel_date_dd_mm_yyyy_raw[0];?></th>
                                                                <th><?php echo $patients_barthel_date_dd_mm_yyyy_raw[1];?></th>
                                                                <th><?php echo $patients_barthel_date_dd_mm_yyyy_raw[2];?></th>
                                                            </tr>
                                                        </thead>
                                                        
                                                        <tbody>
                                                        
                                                            <tr>
                                                                <td>
                                                                    <strong>Bowels</strong> 
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_bowels[0], 3); ?>><?php echo $patien_barthel_bowels[0]; ?></p>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_bowels[1], 3); ?>><?php echo $patien_barthel_bowels[1]; ?></p>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_bowels[2], 3); ?>><?php echo $patien_barthel_bowels[2]; ?></p>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Bladder</strong> 
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_bladder[0], 3); ?>><?php echo $patien_barthel_bladder[0]; ?></p>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_bladder[1], 3); ?>><?php echo $patien_barthel_bladder[1]; ?></p>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_bladder[2], 3); ?>><?php echo $patien_barthel_bladder[2]; ?></p>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Grooming</strong> 
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_grooming[0], 3); ?>><?php echo $patien_barthel_grooming[0]; ?>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_grooming[1], 3); ?>><?php echo $patien_barthel_grooming[1]; ?>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_grooming[2], 3); ?>><?php echo $patien_barthel_grooming[2]; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Toilet use</strong> 
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_toilet_use[0], 3); ?>><?php echo $patien_barthel_toilet_use[0]; ?>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_toilet_use[1], 3); ?>><?php echo $patien_barthel_toilet_use[1]; ?>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_toilet_use[2], 3); ?>><?php echo $patien_barthel_toilet_use[2]; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Feeding</strong> 
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_feeding[0], 3); ?>><?php echo $patien_barthel_feeding[0]; ?>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_feeding[1], 3); ?>><?php echo $patien_barthel_feeding[1]; ?>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_feeding[2], 3); ?>><?php echo $patien_barthel_feeding[2]; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Transfer</strong> 
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_transfer[0], 3); ?>><?php echo $patien_barthel_transfer[0]; ?>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_transfer[1], 3); ?>><?php echo $patien_barthel_transfer[1]; ?>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_transfer[2], 3); ?>><?php echo $patien_barthel_transfer[2]; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Mobility</strong> 
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_mobility[0], 3); ?>><?php echo $patien_barthel_mobility[0]; ?>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_mobility[1], 3); ?>><?php echo $patien_barthel_mobility[1]; ?>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_mobility[2], 3); ?>><?php echo $patien_barthel_mobility[2]; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Dressing</strong> 
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_dressing[0], 3); ?>><?php echo $patien_barthel_dressing[0]; ?>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_dressing[1], 3); ?>><?php echo $patien_barthel_dressing[1]; ?>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_dressing[2], 3); ?>><?php echo $patien_barthel_dressing[2]; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Stairs</strong> 
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_stairs[0], 3); ?>><?php echo $patien_barthel_stairs[0]; ?>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_stairs[1], 3); ?>><?php echo $patien_barthel_stairs[1]; ?>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_stairs[2], 3); ?>><?php echo $patien_barthel_stairs[2]; ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <strong>Bathing</strong> 
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_bathing[0], 3); ?>><?php echo $patien_barthel_bathing[0]; ?>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_bathing[1], 3); ?>><?php echo $patien_barthel_bathing[1]; ?>
                                                                </td>
                                                                <td>
                                                                    <p class = <?php echo fcolor ($patien_barthel_bathing[2], 3); ?>><?php echo $patien_barthel_bathing[2]; ?>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.table-responsive -->
                                                <?php
                                                break;
                                            
                                            default:
                                                echo "N/D";
                                        } // End switch
                                        
                                    ?>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    CHATBOT 2
                                </div>
                                <div class="card-body">
                                    <?php

                                        switch ($num_patients_ecfs){

                                            case 1:
                                                ?>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered"  width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>Questions</th>
                                                                <th><?php echo $patients_ecfs_date_dd_mm_yyyy_raw[0];?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><strong>Weigh</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_weigh[0], 5); ?>><?php echo $patients_ecfs_weigh[0];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Short Breath</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_shortBreath[0], 5); ?>><?php echo $patients_ecfs_shortBreath[0];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Short Breath Increase</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_shortBreathIncrease[0], 5); ?>><?php echo $patients_ecfs_shortBreathIncrease[0];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Fellt Swollen</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_feetSwollen[0], 5); ?>><?php echo $patients_ecfs_feetSwollen[0];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Two Kg</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_twoKg[0], 5); ?>><?php echo $patients_ecfs_twoKg[0];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Fluids Limit</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_fluidsLimit[0], 5); ?>><?php echo $patients_ecfs_fluidsLimit[0];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Rest Day</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_restDay[0], 5); ?>><?php echo $patients_ecfs_restDay[0];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Increase Fatigue</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_increaseFatigue[0], 5); ?>><?php echo $patients_ecfs_increaseFatigue[0];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Low Salt Diet</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_lowSaltDiet[0], 5); ?>><?php echo $patients_ecfs_lowSaltDiet[0];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Medicine</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_medicine[0], 5); ?>><?php echo $patients_ecfs_medicine[0];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Flu Shot</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_fluShot[0], 5); ?>><?php echo $patients_ecfs_fluShot[0];?></p><td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Exercise</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_exercise[0], 5); ?>><?php echo $patients_ecfs_exercise[0];?></p></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php
                                                break;

                                            case 2:
                                                ?>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered"  width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>Questions</th>
                                                                <th><?php echo $patients_ecfs_date_dd_mm_yyyy_raw[0];?></th>
                                                                <th><?php echo $patients_ecfs_date_dd_mm_yyyy_raw[1];?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><strong>Weigh</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_weigh[0], 5); ?>><?php echo $patients_ecfs_weigh[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_weigh[1], 5); ?>><?php echo $patients_ecfs_weigh[1];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Short Breath</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_shortBreath[0], 5); ?>><?php echo $patients_ecfs_shortBreath[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_shortBreath[1], 5); ?>><?php echo $patients_ecfs_shortBreath[1];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Short Breath Increase</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_shortBreathIncrease[0], 5); ?>><?php echo $patients_ecfs_shortBreathIncrease[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_shortBreathIncrease[1], 5); ?>><?php echo $patients_ecfs_shortBreathIncrease[1];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Fellt Swollen</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_feetSwollen[0], 5); ?>><?php echo $patients_ecfs_feetSwollen[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_feetSwollen[1], 5); ?>><?php echo $patients_ecfs_feetSwollen[1];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Two Kg</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_twoKg[0], 5); ?>><?php echo $patients_ecfs_twoKg[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_twoKg[1], 5); ?>><?php echo $patients_ecfs_twoKg[1];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Fluids Limit</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_fluidsLimit[0], 5); ?>><?php echo $patients_ecfs_fluidsLimit[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_fluidsLimit[1], 5); ?>><?php echo $patients_ecfs_fluidsLimit[1];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Rest Day</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_restDay[0], 5); ?>><?php echo $patients_ecfs_restDay[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_restDay[1], 5); ?>><?php echo $patients_ecfs_restDay[1];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Increase Fatigue</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_increaseFatigue[0], 5); ?>><?php echo $patients_ecfs_increaseFatigue[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_increaseFatigue[1], 5); ?>><?php echo $patients_ecfs_increaseFatigue[1];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Low Salt Diet</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_lowSaltDiet[0], 5); ?>><?php echo $patients_ecfs_lowSaltDiet[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_lowSaltDiet[1], 5); ?>><?php echo $patients_ecfs_lowSaltDiet[1];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Medicine</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_medicine[0], 5); ?>><?php echo $patients_ecfs_medicine[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_medicine[1], 5); ?>><?php echo $patients_ecfs_medicine[1];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Flu Shot</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_fluShot[0], 5); ?>><?php echo $patients_ecfs_fluShot[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_fluShot[1], 5); ?>><?php echo $patients_ecfs_fluShot[1];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Exercise</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_exercise[0], 5); ?>><?php echo $patients_ecfs_exercise[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_exercise[1], 5); ?>><?php echo $patients_ecfs_exercise[1];?></p></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php
                                                break;

                                            case ($num_patients_barthel >= 3):
                                                ?>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered"  width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>Questions</th>
                                                                <th><?php echo $patients_ecfs_date_dd_mm_yyyy_raw[0];?></th>
                                                                <th><?php echo $patients_ecfs_date_dd_mm_yyyy_raw[1];?></th>
                                                                <th><?php echo $patients_ecfs_date_dd_mm_yyyy_raw[2];?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><strong>Weigh</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_weigh[0], 5); ?>><?php echo $patients_ecfs_weigh[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_weigh[1], 5); ?>><?php echo $patients_ecfs_weigh[1];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_weigh[2], 5); ?>><?php echo $patients_ecfs_weigh[2];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Short Breath</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_shortBreath[0], 5); ?>><?php echo $patients_ecfs_shortBreath[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_shortBreath[1], 5); ?>><?php echo $patients_ecfs_shortBreath[1];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_shortBreath[2], 5); ?>><?php echo $patients_ecfs_shortBreath[2];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Short Breath Increase</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_shortBreathIncrease[0], 5); ?>><?php echo $patients_ecfs_shortBreathIncrease[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_shortBreathIncrease[1], 5); ?>><?php echo $patients_ecfs_shortBreathIncrease[1];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_shortBreathIncrease[2], 5); ?>><?php echo $patients_ecfs_shortBreathIncrease[2];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Fellt Swollen</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_feetSwollen[0], 5); ?>><?php echo $patients_ecfs_feetSwollen[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_feetSwollen[1], 5); ?>><?php echo $patients_ecfs_feetSwollen[1];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_feetSwollen[2], 5); ?>><?php echo $patients_ecfs_feetSwollen[2];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Two Kg</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_twoKg[0], 5); ?>><?php echo $patients_ecfs_twoKg[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_twoKg[1], 5); ?>><?php echo $patients_ecfs_twoKg[1];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_twoKg[2], 5); ?>><?php echo $patients_ecfs_twoKg[2];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Fluids Limit</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_fluidsLimit[0], 5); ?>><?php echo $patients_ecfs_fluidsLimit[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_fluidsLimit[1], 5); ?>><?php echo $patients_ecfs_fluidsLimit[1];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_fluidsLimit[2], 5); ?>><?php echo $patients_ecfs_fluidsLimit[2];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Rest Day</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_restDay[0], 5); ?>><?php echo $patients_ecfs_restDay[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_restDay[1], 5); ?>><?php echo $patients_ecfs_restDay[1];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_restDay[2], 5); ?>><?php echo $patients_ecfs_restDay[2];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Increase Fatigue</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_increaseFatigue[0], 5); ?>><?php echo $patients_ecfs_increaseFatigue[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_increaseFatigue[1], 5); ?>><?php echo $patients_ecfs_increaseFatigue[1];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_increaseFatigue[2], 5); ?>><?php echo $patients_ecfs_increaseFatigue[2];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Low Salt Diet</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_lowSaltDiet[0], 5); ?>><?php echo $patients_ecfs_lowSaltDiet[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_lowSaltDiet[1], 5); ?>><?php echo $patients_ecfs_lowSaltDiet[1];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_lowSaltDiet[2], 5); ?>><?php echo $patients_ecfs_lowSaltDiet[2];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Medicine</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_medicine[0], 5); ?>><?php echo $patients_ecfs_medicine[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_medicine[1], 5); ?>><?php echo $patients_ecfs_medicine[1];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_medicine[2], 5); ?>><?php echo $patients_ecfs_medicine[2];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Flu Shot</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_fluShot[0], 5); ?>><?php echo $patients_ecfs_fluShot[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_fluShot[1], 5); ?>><?php echo $patients_ecfs_fluShot[1];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_fluShot[2], 5); ?>><?php echo $patients_ecfs_fluShot[2];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Exercise</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_exercise[0], 5); ?>><?php echo $patients_ecfs_exercise[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_exercise[1], 5); ?>><?php echo $patients_ecfs_exercise[1];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_ecfs_exercise[2], 5); ?>><?php echo $patients_ecfs_exercise[2];?></p></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php
                                                break;

                                            default:
                                                echo "N/D";

                                        } // End switch
                                    ?>
                                </div>
                                <!--End Card Body-->
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    CHATBOT 3
                                </div>
                                <div class="card-body">
                                    <?php

                                        switch ($num_patients_gijon){

                                            case 1:
                                                ?>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered"  width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>Questions</th>
                                                                <th><?php echo $patients_gijon_date_dd_mm_yyyy_raw[0];?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><strong>Family Situation</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_familySituation[0], 5); ?>><?php echo $patients_gijon_familySituation[0];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Economic Situation</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_economicSituation[0], 5); ?>><?php echo $patients_gijon_economicSituation[0];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Living Place</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_livingPlace[0], 5); ?>><?php echo $patients_gijon_livingPlace[0];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Social Relation</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_socialRelation[0], 5); ?>><?php echo $patients_gijon_socialRelation[0];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Support Social</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_supportSocial[0], 5); ?>><?php echo $patients_gijon_supportSocial[0];?></p></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php
                                                break;

                                            case 2:
                                                ?>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered"  width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>Questions</th>
                                                                <th><?php echo $patients_gijon_date_dd_mm_yyyy_raw[0];?></th>
                                                                <th><?php echo $patients_gijon_date_dd_mm_yyyy_raw[1];?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><strong>Family Situation</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_familySituation[0], 5); ?>><?php echo $patients_gijon_familySituation[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_familySituation[1], 5); ?>><?php echo $patients_gijon_familySituation[1];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Economic Situation</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_economicSituation[0], 5); ?>><?php echo $patients_gijon_economicSituation[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_economicSituation[1], 5); ?>><?php echo $patients_gijon_economicSituation[1];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Living Place</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_livingPlace[0], 5); ?>><?php echo $patients_gijon_livingPlace[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_livingPlace[1], 5); ?>><?php echo $patients_gijon_livingPlace[1];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Social Relation</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_socialRelation[0], 5); ?>><?php echo $patients_gijon_socialRelation[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_socialRelation[1], 5); ?>><?php echo $patients_gijon_socialRelation[1];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Support Social</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_supportSocial[0], 5); ?>><?php echo $patients_gijon_supportSocial[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_supportSocial[1], 5); ?>><?php echo $patients_gijon_supportSocial[1];?></p></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php
                                                break;

                                            case ($num_patients_barthel >= 3):
                                                ?>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered"  width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>Questions</th>
                                                                <th><?php echo $patients_gijon_date_dd_mm_yyyy_raw[0];?></th>
                                                                <th><?php echo $patients_gijon_date_dd_mm_yyyy_raw[1];?></th>
                                                                <th><?php echo $patients_gijon_date_dd_mm_yyyy_raw[2];?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><strong>Family Situation</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_familySituation[0], 5); ?>><?php echo $patients_gijon_familySituation[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_familySituation[1], 5); ?>><?php echo $patients_gijon_familySituation[1];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_familySituation[2], 5); ?>><?php echo $patients_gijon_familySituation[2];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Economic Situation</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_economicSituation[0], 5); ?>><?php echo $patients_gijon_economicSituation[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_economicSituation[1], 5); ?>><?php echo $patients_gijon_economicSituation[1];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_economicSituation[2], 5); ?>><?php echo $patients_gijon_economicSituation[2];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Living Place</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_livingPlace[0], 5); ?>><?php echo $patients_gijon_livingPlace[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_livingPlace[1], 5); ?>><?php echo $patients_gijon_livingPlace[1];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_livingPlace[2], 5); ?>><?php echo $patients_gijon_livingPlace[2];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Social Relation</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_socialRelation[0], 5); ?>><?php echo $patients_gijon_socialRelation[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_socialRelation[1], 5); ?>><?php echo $patients_gijon_socialRelation[1];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_socialRelation[2], 5); ?>><?php echo $patients_gijon_socialRelation[2];?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Support Social</strong></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_supportSocial[0], 5); ?>><?php echo $patients_gijon_supportSocial[0];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_supportSocial[1], 5); ?>><?php echo $patients_gijon_supportSocial[1];?></p></td>
                                                                <td><p class = <?php echo fcolor ($patients_gijon_supportSocial[2], 5); ?>><?php echo $patients_gijon_supportSocial[2];?></p></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php
                                                break;

                                            default:
                                                echo "N/D";

                                        } // End switch
                                    ?>
                                </div>
                                <!--End Card Body-->
                            </div>
                        </div>

                       

                    </div>
                    <!-- /.card-row -->
                                
                </div> 
                <!-- /.card-body -->      
            </div>
            <!-- /.card-shadow -->
            <!-- /.data table -->

        </div>
        <!-- /.container-fluid -->            

<?php

        require_once(SKEL_DIR . "/bodyEnd.php");

        require_once(SKEL_DIR . "/pie.php");

    }
?>