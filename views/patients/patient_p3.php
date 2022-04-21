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

        require_once("patient_blocks.php");
        
        require_once("patient_functions.php");

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
                        
                        <!-- Indicie barthel -->
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
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#barthel_panel">
                                More Barthel info...
                            </button>
                        </div>

                        <!-- Panel modal barthel -->
                        <div class="modal fade" id="barthel_panel" tabindex="-1" role="dialog" aria-labelledby="barthel_panel_title" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="barthel_panel_title">Barthel</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    
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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
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
                             <!-- Button trigger modal -->
                             <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#ecfs_panel">
                                More ECFSCBS info...
                            </button>
                        </div>

                        <!-- Panel modal ecfs -->
                        <div class="modal fade" id="ecfs_panel" tabindex="-1" role="dialog" aria-labelledby="ecfs_panel_title" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ecfs_panel_title">ECFSCBS</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
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

                                                case ($num_patients_ecfs >= 3):
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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
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
                             <!-- Button trigger modal -->
                             <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#gijon_panel">
                                More Gijon info...
                            </button>
                        </div>

                        <!-- Panel modal gijon -->
                        <div class="modal fade" id="gijon_panel" tabindex="-1" role="dialog" aria-labelledby="gijon_panel_title" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="gijon_panel_title">Gijon</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
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

                                                case ($num_patients_gijon >= 3):
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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
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

                                    switch ($num_patients_chatbot){

                                        case 1:

                                            ?>
                                            <div class="table-responsive">
                                                <table class="table table-bordered"  width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Questions</th>
                                                            <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw[0];?></th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                    
                                                        <tr>
                                                            <td>
                                                                <strong>Compared to the last 3 days, your legs-feet or any other part of the body are?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_2[0], 2); ?>><?php echo $patients_chatbot_respuesta_1_2[0]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Compared to the last 3 days, you feel?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_3[0], 2); ?>><?php echo $patients_chatbot_respuesta_1_3[0]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong> In the last 3 days, did you take any additional medication without supervision?</strong> 
                                                            </td>
                                                            <td>
                                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_4[0], 1); ?>><?php echo $patients_chatbot_respuesta_1_4[0]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Could you take walks like the previous days?</strong> 
                                                            </td>
                                                            <td>
                                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_5[0], 1); ?>><?php echo $patients_chatbot_respuesta_1_5[0]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Did you have a choking feeling or shortness of breath when you lay in bed?</strong> 
                                                            </td>
                                                            <td>
                                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_6[0], 1); ?>><?php echo $patients_chatbot_respuesta_1_6[0]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Did you cough more or have more phlegm?</strong> 
                                                            </td>
                                                            <td>
                                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_7[0], 1); ?>><?php echo $patients_chatbot_respuesta_1_7[0]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Does your medication make you feel bad, such as dizzy or makes your blood pressure drop, or any other side effect?</strong> 
                                                            </td>
                                                            <td>
                                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_8[0], 1); ?>><?php echo $patients_chatbot_respuesta_1_8[0]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>For the last 3 days, did you follow the diet and exercise recommendations given by your doctor and nurse?</strong> 
                                                            </td>
                                                            <td>
                                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_9[0], 1); ?>> <?php echo $patients_chatbot_respuesta_1_9[0]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Do you notice you urinate less, more or the same?</strong> 
                                                            </td>
                                                            <td>
                                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_10[0], 2); ?>><?php echo $patients_chatbot_respuesta_1_10[0]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Did you have chest o neck palpitations recently?</strong> 
                                                            </td>
                                                            <td>
                                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_11[0], 1); ?>><?php echo $patients_chatbot_respuesta_1_11[0]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Do you feel that you have more day drowsiness?</strong> 
                                                            </td>
                                                            <td>
                                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_12[0], 1); ?>><?php echo $patients_chatbot_respuesta_1_12[0]; ?>
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
                                                            <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw[0];?></th>
                                                            <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw[1];?></th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                    
                                                        <tr>
                                                            <td>
                                                                <strong>Compared to the last 3 days, your legs-feet or any other part of the body are?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_2[0], 2); ?>><?php echo $patients_chatbot_respuesta_1_2[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_2[1], 2); ?>><?php echo $patients_chatbot_respuesta_1_2[1]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Compared to the last 3 days, you feel?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_3[0], 2); ?>><?php echo $patients_chatbot_respuesta_1_3[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_3[1], 2); ?>><?php echo $patients_chatbot_respuesta_1_3[1]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong> In the last 3 days, did you take any additional medication without supervision?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_4[0], 1); ?>><?php echo $patients_chatbot_respuesta_1_4[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_4[1], 1); ?>><?php echo $patients_chatbot_respuesta_1_4[1]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Could you take walks like the previous days?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_5[0], 1); ?>><?php echo $patients_chatbot_respuesta_1_5[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_5[1], 1); ?>><?php echo $patients_chatbot_respuesta_1_5[1]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Did you have a choking feeling or shortness of breath when you lay in bed?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_6[0], 1); ?>><?php echo $patients_chatbot_respuesta_1_6[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_6[1], 1); ?>><?php echo $patients_chatbot_respuesta_1_6[1]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Did you cough more or have more phlegm?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_7[0], 1); ?>><?php echo $patients_chatbot_respuesta_1_7[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_7[1], 1); ?>><?php echo $patients_chatbot_respuesta_1_7[1]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Does your medication make you feel bad, such as dizzy or makes your blood pressure drop, or any other side effect?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_8[0], 1); ?>><?php echo $patients_chatbot_respuesta_1_8[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_8[1], 1); ?>><?php echo $patients_chatbot_respuesta_1_8[1]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>For the last 3 days, did you follow the diet and exercise recommendations given by your doctor and nurse?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_9[0], 1); ?>> <?php echo $patients_chatbot_respuesta_1_9[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_9[1], 1); ?>> <?php echo $patients_chatbot_respuesta_1_9[1]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Do you notice you urinate less, more or the same?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_10[0], 2); ?>><?php echo $patients_chatbot_respuesta_1_10[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_10[1], 2); ?>><?php echo $patients_chatbot_respuesta_1_10[1]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Did you have chest o neck palpitations recently?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_11[0], 1); ?>><?php echo $patients_chatbot_respuesta_1_11[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_11[1], 1); ?>><?php echo $patients_chatbot_respuesta_1_11[1]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Do you feel that you have more day drowsiness?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_12[0], 1); ?>><?php echo $patients_chatbot_respuesta_1_12[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_12[1], 1); ?>><?php echo $patients_chatbot_respuesta_1_12[1]; ?>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                            <?php
                                            break;
                                        
                                        case ($num_patients_chatbot >= 3):
                                            ?>

                                            <div class="table-responsive">
                                            <table class="table table-bordered"  width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Questions</th>
                                                            <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw[0];?></th>
                                                            <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw[1];?></th>
                                                            <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw[2];?></th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                    
                                                        <tr>
                                                            <td>
                                                                <strong>Compared to the last 3 days, your legs-feet or any other part of the body are?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_2[0], 2); ?>><?php echo $patients_chatbot_respuesta_1_2[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_2[1], 2); ?>><?php echo $patients_chatbot_respuesta_1_2[1]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_2[2], 2); ?>><?php echo $patients_chatbot_respuesta_1_2[2]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Compared to the last 3 days, you feel?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_3[0], 2); ?>><?php echo $patients_chatbot_respuesta_1_3[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_3[1], 2); ?>><?php echo $patients_chatbot_respuesta_1_3[1]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_3[2], 2); ?>><?php echo $patients_chatbot_respuesta_1_3[2]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong> In the last 3 days, did you take any additional medication without supervision?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_4[0], 1); ?>><?php echo $patients_chatbot_respuesta_1_4[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_4[1], 1); ?>><?php echo $patients_chatbot_respuesta_1_4[1]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_4[2], 1); ?>><?php echo $patients_chatbot_respuesta_1_4[2]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Could you take walks like the previous days?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_5[0], 1); ?>><?php echo $patients_chatbot_respuesta_1_5[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_5[1], 1); ?>><?php echo $patients_chatbot_respuesta_1_5[1]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_5[2], 1); ?>><?php echo $patients_chatbot_respuesta_1_5[2]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Did you have a choking feeling or shortness of breath when you lay in bed?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_6[0], 1); ?>><?php echo $patients_chatbot_respuesta_1_6[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_6[1], 1); ?>><?php echo $patients_chatbot_respuesta_1_6[1]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_6[2], 1); ?>><?php echo $patients_chatbot_respuesta_1_6[2]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Did you cough more or have more phlegm?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_7[0], 1); ?>><?php echo $patients_chatbot_respuesta_1_7[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_7[1], 1); ?>><?php echo $patients_chatbot_respuesta_1_7[1]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_7[2], 1); ?>><?php echo $patients_chatbot_respuesta_1_7[2]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Does your medication make you feel bad, such as dizzy or makes your blood pressure drop, or any other side effect?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_8[0], 1); ?>><?php echo $patients_chatbot_respuesta_1_8[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_8[1], 1); ?>><?php echo $patients_chatbot_respuesta_1_8[1]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_8[2], 1); ?>><?php echo $patients_chatbot_respuesta_1_8[2]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>For the last 3 days, did you follow the diet and exercise recommendations given by your doctor and nurse?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_9[0], 1); ?>> <?php echo $patients_chatbot_respuesta_1_9[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_9[1], 1); ?>> <?php echo $patients_chatbot_respuesta_1_9[1]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_9[2], 1); ?>> <?php echo $patients_chatbot_respuesta_1_9[2]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Do you notice you urinate less, more or the same?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_10[0], 2); ?>><?php echo $patients_chatbot_respuesta_1_10[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_10[1], 2); ?>><?php echo $patients_chatbot_respuesta_1_10[1]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_10[2], 2); ?>><?php echo $patients_chatbot_respuesta_1_10[2]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Did you have chest o neck palpitations recently?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_11[0], 1); ?>><?php echo $patients_chatbot_respuesta_1_11[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_11[1], 1); ?>><?php echo $patients_chatbot_respuesta_1_11[1]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_11[2], 1); ?>><?php echo $patients_chatbot_respuesta_1_11[2]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Do you feel that you have more day drowsiness?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_12[0], 1); ?>><?php echo $patients_chatbot_respuesta_1_12[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_12[1], 1); ?>><?php echo $patients_chatbot_respuesta_1_12[1]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_12[2], 1); ?>><?php echo $patients_chatbot_respuesta_1_12[2]; ?>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                            <?php
                                            break;
                                        
                                        default:
                                            echo "No data for the last 3 days.";
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
                                    switch ($num_patients_chatbot){

                                        case 1:

                                            ?>
                                            <div class="table-responsive">
                                                <table class="table table-bordered"  width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Questions</th>
                                                            <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw[0];?></th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                    
                                                        <tr>
                                                            <td>
                                                                <strong>I forget to take them</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_2[0], 5); ?>><?php echo $patients_chatbot_respuesta_2_2[0]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>I alter the dose</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_3[0], 5); ?>><?php echo $patients_chatbot_respuesta_2_3[0]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong> I stop taking them for a while</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_4[0], 5); ?>><?php echo $patients_chatbot_respuesta_2_4[0]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>I decide to miss out a dose</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_5[0], 5); ?>><?php echo $patients_chatbot_respuesta_2_5[0]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>I take less than instructed</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_6[0], 5); ?>><?php echo $patients_chatbot_respuesta_2_6[0]; ?>
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
                                                            <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw[0];?></th>
                                                            <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw[1];?></th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                    
                                                        <tr>
                                                            <td>
                                                                <strong>I forget to take them</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_2[0], 5); ?>><?php echo $patients_chatbot_respuesta_2_2[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_2[1], 5); ?>><?php echo $patients_chatbot_respuesta_2_2[1]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>I alter the dose</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_3[0], 5); ?>><?php echo $patients_chatbot_respuesta_2_3[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_3[1], 5); ?>><?php echo $patients_chatbot_respuesta_2_3[1]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong> I stop taking them for a while</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_4[0], 5); ?>><?php echo $patients_chatbot_respuesta_2_4[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_4[1], 5); ?>><?php echo $patients_chatbot_respuesta_2_4[1]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>I decide to miss out a dose</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_5[0], 5); ?>><?php echo $patients_chatbot_respuesta_2_5[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_5[1], 5); ?>><?php echo $patients_chatbot_respuesta_2_5[1]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>I take less than instructed</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_6[0], 5); ?>><?php echo $patients_chatbot_respuesta_2_6[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_6[1], 5); ?>><?php echo $patients_chatbot_respuesta_2_6[1]; ?>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                            <?php
                                            break;
                                        
                                        case ($num_patients_chatbot >= 3):
                                            ?>

                                            <div class="table-responsive">
                                            <table class="table table-bordered"  width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Questions</th>
                                                            <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw[0];?></th>
                                                            <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw[1];?></th>
                                                            <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw[2];?></th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                    
                                                    <tr>
                                                            <td>
                                                                <strong>I forget to take them</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_2[0], 5); ?>><?php echo $patients_chatbot_respuesta_2_2[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_2[1], 5); ?>><?php echo $patients_chatbot_respuesta_2_2[1]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_2[2], 5); ?>><?php echo $patients_chatbot_respuesta_2_2[2]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>I alter the dose</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_3[0], 5); ?>><?php echo $patients_chatbot_respuesta_2_3[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_3[1], 5); ?>><?php echo $patients_chatbot_respuesta_2_3[1]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_3[2], 5); ?>><?php echo $patients_chatbot_respuesta_2_3[2]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong> I stop taking them for a while</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_4[0], 5); ?>><?php echo $patients_chatbot_respuesta_2_4[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_4[1], 5); ?>><?php echo $patients_chatbot_respuesta_2_4[1]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_4[2], 5); ?>><?php echo $patients_chatbot_respuesta_2_4[2]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>I decide to miss out a dose</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_5[0], 5); ?>><?php echo $patients_chatbot_respuesta_2_5[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_5[1], 5); ?>><?php echo $patients_chatbot_respuesta_2_5[1]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_5[2], 5); ?>><?php echo $patients_chatbot_respuesta_2_5[2]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>I take less than instructed</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_6[0], 5); ?>><?php echo $patients_chatbot_respuesta_2_6[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_6[1], 5); ?>><?php echo $patients_chatbot_respuesta_2_6[1]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_6[2], 5); ?>><?php echo $patients_chatbot_respuesta_2_6[2]; ?>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                            <?php
                                            break;
                                        
                                        default:
                                            echo "No data for the last 3 days.";
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

                                    switch ($num_patients_chatbot){

                                        case 1:

                                            ?>
                                            <div class="table-responsive">
                                                <table class="table table-bordered"  width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Questions</th>
                                                            <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw[0];?></th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                    
                                                        <tr>
                                                            <td>
                                                                <strong>Has any doctor changed anything of your medication that Clinica Humana is not aware of? </strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_1[0],3); ?>><?php echo $patients_chatbot_respuesta_3_1[0]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Did you have new blood or urine test results that Clinica Humana is not aware of?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_2[0], 3); ?>><?php echo $patients_chatbot_respuesta_3_2[0]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Did you contact any health professional in addition to CH that you haven't told me yet?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_3[0], 3); ?>><?php echo $patients_chatbot_respuesta_3_3[0]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Have you been admitted to hospital and Clínica Humana is not aware of?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_4[0], 3); ?>><?php echo $patients_chatbot_respuesta_3_4[0]; ?>
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
                                                            <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw[0];?></th>
                                                            <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw[1];?></th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                    
                                                        <tr>
                                                            <td>
                                                                <strong>Has any doctor changed anything of your medication that Clinica Humana is not aware of? </strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_1[0],3); ?>><?php echo $patients_chatbot_respuesta_3_1[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_1[1],3); ?>><?php echo $patients_chatbot_respuesta_3_1[1]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Did you have new blood or urine test results that Clinica Humana is not aware of?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_2[0], 3); ?>><?php echo $patients_chatbot_respuesta_3_2[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_2[1], 3); ?>><?php echo $patients_chatbot_respuesta_3_2[1]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Did you contact any health professional in addition to CH that you haven't told me yet?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_3[0], 3); ?>><?php echo $patients_chatbot_respuesta_3_3[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_3[1], 3); ?>><?php echo $patients_chatbot_respuesta_3_3[1]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Have you been admitted to hospital and Clínica Humana is not aware of?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_4[0], 3); ?>><?php echo $patients_chatbot_respuesta_3_4[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_4[1], 3); ?>><?php echo $patients_chatbot_respuesta_3_4[1]; ?>
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
                                                            <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw[0];?></th>
                                                            <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw[1];?></th>
                                                            <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw[2];?></th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                    
                                                        <tr>
                                                            <td>
                                                                <strong>Has any doctor changed anything of your medication that Clinica Humana is not aware of? </strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_1[0],3); ?>><?php echo $patients_chatbot_respuesta_3_1[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_1[1],3); ?>><?php echo $patients_chatbot_respuesta_3_1[1]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_1[2],3); ?>><?php echo $patients_chatbot_respuesta_3_1[2]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Did you have new blood or urine test results that Clinica Humana is not aware of?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_2[0], 3); ?>><?php echo $patients_chatbot_respuesta_3_2[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_2[1], 3); ?>><?php echo $patients_chatbot_respuesta_3_2[1]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_2[2], 3); ?>><?php echo $patients_chatbot_respuesta_3_2[2]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Did you contact any health professional in addition to CH that you haven't told me yet?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_3[0], 3); ?>><?php echo $patients_chatbot_respuesta_3_3[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_3[1], 3); ?>><?php echo $patients_chatbot_respuesta_3_3[1]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_3[2], 3); ?>><?php echo $patients_chatbot_respuesta_3_3[2]; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <strong>Have you been admitted to hospital and Clínica Humana is not aware of?</strong> 
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_4[0], 3); ?>><?php echo $patients_chatbot_respuesta_3_4[0]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_4[1], 3); ?>><?php echo $patients_chatbot_respuesta_3_4[1]; ?>
                                                            </td>
                                                            <td>
                                                                <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_4[2], 3); ?>><?php echo $patients_chatbot_respuesta_3_4[2]; ?>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                            <?php
                                            break;
                                        
                                        default:
                                            echo "No data for the last 3 days.";
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