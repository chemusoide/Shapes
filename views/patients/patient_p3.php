<?php

    if (defined("SECURITY_CONSTANT")) {

        $bodyId = "patient_p3";
        $pageTitle_01 = "Questionaries";
        $pageTitle_02 = "ChatBot 1";
        $pageTitle_03 = "ChatBot 2";
        $pageTitle_04 = "ChatBot 3";

        require_once(SKEL_DIR . "/cabecera.php");
        
        require_once(SKEL_DIR . "/headStart.php");
        
        require_once(SKEL_DIR . "/headEnd.php");
        
        require_once(SKEL_DIR . "/bodyStart.php");
        
        require_once(SKEL_DIR . "/sidebar.php");
        
        require_once(SKEL_DIR . "/contentWrapper.php");

        require_once("patient_blocks.php");
        
        require_once("patient_functions.php");

        //echo "<h1>NUM PATIENTS CHATBOT: $num_patients_chatbot</h1>";
        //var_dump($patients_chatbot);

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

                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    ECFSCBS INDEX <?php echo "($patients_ecfs_date_dd_mm_yyyy_raw[0])";?>
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
                                    GIJON INDEX <?php echo "($patients_gijon_date_dd_mm_yyyy_raw[0])";?>
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
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_4[0], 1); ?>><?php echo utf8_encode($patients_chatbot_respuesta_1_4[0]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_4[1], 1); ?>><?php echo utf8_encode($patients_chatbot_respuesta_1_4[1]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_4[2], 1); ?>><?php echo utf8_encode($patients_chatbot_respuesta_1_4[2]); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <strong>Could you take walks like the previous days?</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_5[0], 1); ?>><?php echo utf8_encode($patients_chatbot_respuesta_1_5[0]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_5[1], 1); ?>><?php echo utf8_encode($patients_chatbot_respuesta_1_5[1]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_5[2], 1); ?>><?php echo utf8_encode($patients_chatbot_respuesta_1_5[2]); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <strong>Did you have a choking feeling or shortness of breath when you lay in bed?</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_6[0], 1); ?>><?php echo utf8_encode($patients_chatbot_respuesta_1_6[0]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_6[1], 1); ?>><?php echo utf8_encode($patients_chatbot_respuesta_1_6[1]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_6[2], 1); ?>><?php echo utf8_encode($patients_chatbot_respuesta_1_6[2]); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <strong>Did you cough more or have more phlegm?</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_7[0], 1); ?>><?php echo utf8_encode($patients_chatbot_respuesta_1_7[0]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_7[1], 1); ?>><?php echo utf8_encode($patients_chatbot_respuesta_1_7[1]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_7[2], 1); ?>><?php echo utf8_encode($patients_chatbot_respuesta_1_7[2]); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <strong>Does your medication make you feel bad, such as dizzy or makes your blood pressure drop, or any other side effect?</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_8[0], 1); ?>><?php echo utf8_encode($patients_chatbot_respuesta_1_8[0]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_8[1], 1); ?>><?php echo utf8_encode($patients_chatbot_respuesta_1_8[1]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_8[2], 1); ?>><?php echo utf8_encode($patients_chatbot_respuesta_1_8[2]); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <strong>For the last 3 days, did you follow the diet and exercise recommendations given by your doctor and nurse?</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_9[0], 1); ?>> <?php echo utf8_encode($patients_chatbot_respuesta_1_9[0]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_9[1], 1); ?>> <?php echo utf8_encode($patients_chatbot_respuesta_1_9[1]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_9[2], 1); ?>> <?php echo utf8_encode($patients_chatbot_respuesta_1_9[2]); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <strong>Do you notice you urinate less, more or the same?</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_10[0], 2); ?>><?php echo utf8_encode($patients_chatbot_respuesta_1_10[0]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_10[1], 2); ?>><?php echo utf8_encode($patients_chatbot_respuesta_1_10[1]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_10[2], 2); ?>><?php echo utf8_encode($patients_chatbot_respuesta_1_10[2]); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <strong>Did you have chest o neck palpitations recently?</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_11[0], 1); ?>><?php echo utf8_encode($patients_chatbot_respuesta_1_11[0]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_11[1], 1); ?>><?php echo utf8_encode($patients_chatbot_respuesta_1_11[1]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_11[2], 1); ?>><?php echo utf8_encode($patients_chatbot_respuesta_1_11[2]); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <strong>Do you feel that you have more day drowsiness?</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_12[0], 1); ?>><?php echo utf8_encode($patients_chatbot_respuesta_1_12[0]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_12[1], 1); ?>><?php echo utf8_encode($patients_chatbot_respuesta_1_12[1]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_1_12[2], 1); ?>><?php echo utf8_encode($patients_chatbot_respuesta_1_12[2]); ?>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->

                    </div>
                    <!-- /.card-row -->
                            
                </div> 
                <!-- /.card-body -->      
            </div>
            <!-- /.card-shadow -->
            <!-- /.data table -->

            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $pageTitle_03; ?></h6>
                </div>
                <div class="card-body">
                    
                    <div class="row">    

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
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_2[0], 5); ?>><?php echo utf8_encode($patients_chatbot_respuesta_2_2[0]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_2[1], 5); ?>><?php echo utf8_encode($patients_chatbot_respuesta_2_2[1]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_2[2], 5); ?>><?php echo utf8_encode($patients_chatbot_respuesta_2_2[2]); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <strong>I alter the dose</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_3[0], 5); ?>><?php echo utf8_encode($patients_chatbot_respuesta_2_3[0]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_3[1], 5); ?>><?php echo utf8_encode($patients_chatbot_respuesta_2_3[1]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_3[2], 5); ?>><?php echo utf8_encode($patients_chatbot_respuesta_2_3[2]); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <strong> I stop taking them for a while</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_4[0], 5); ?>><?php echo utf8_encode($patients_chatbot_respuesta_2_4[0]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_4[1], 5); ?>><?php echo utf8_encode($patients_chatbot_respuesta_2_4[1]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_4[2], 5); ?>><?php echo utf8_encode($patients_chatbot_respuesta_2_4[2]); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <strong>I decide to miss out a dose</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_5[0], 5); ?>><?php echo utf8_encode($patients_chatbot_respuesta_2_5[0]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_5[1], 5); ?>><?php echo utf8_encode($patients_chatbot_respuesta_2_5[1]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_5[2], 5); ?>><?php echo utf8_encode($patients_chatbot_respuesta_2_5[2]); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <strong>I take less than instructed</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_6[0], 5); ?>><?php echo utf8_encode($patients_chatbot_respuesta_2_6[0]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_6[1], 5); ?>><?php echo utf8_encode($patients_chatbot_respuesta_2_6[1]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_2_6[2], 5); ?>><?php echo utf8_encode($patients_chatbot_respuesta_2_6[2]); ?>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->

                    </div>
                    <!-- /.card-row -->
                        
                </div> 
                <!-- /.card-body -->      
            </div>
            <!-- /.card-shadow -->
            <!-- /.data table -->

            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $pageTitle_04; ?></h6>
                </div>
                <div class="card-body">
                    
                    <div class="row">
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
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_1[0],3); ?>><?php echo utf8_encode($patients_chatbot_respuesta_3_1[0]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_1[1],3); ?>><?php echo utf8_encode($patients_chatbot_respuesta_3_1[1]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_1[2],3); ?>><?php echo utf8_encode($patients_chatbot_respuesta_3_1[2]); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <strong>Did you have new blood or urine test results that Clinica Humana is not aware of?</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_2[0], 3); ?>><?php echo utf8_encode($patients_chatbot_respuesta_3_2[0]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_2[1], 3); ?>><?php echo utf8_encode($patients_chatbot_respuesta_3_2[1]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_2[2], 3); ?>><?php echo utf8_encode($patients_chatbot_respuesta_3_2[2]); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <strong>Did you contact any health professional in addition to CH that you haven't told me yet?</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_3[0], 3); ?>><?php echo utf8_encode($patients_chatbot_respuesta_3_3[0]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_3[1], 3); ?>><?php echo utf8_encode($patients_chatbot_respuesta_3_3[1]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_3[2], 3); ?>><?php echo utf8_encode($patients_chatbot_respuesta_3_3[2]); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <strong>Have you been admitted to hospital and Clínica Humana is not aware of?</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_4[0], 3); ?>><?php echo utf8_encode($patients_chatbot_respuesta_3_4[0]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_4[1], 3); ?>><?php echo utf8_encode($patients_chatbot_respuesta_3_4[1]); ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($patients_chatbot_respuesta_3_4[2], 3); ?>><?php echo utf8_encode($patients_chatbot_respuesta_3_4[2]); ?>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->

                               

                       

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