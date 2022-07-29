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
                                        <?php
                                        $fecha1 = $patients_chatbot_date_dd_mm_yyyy_raw_seguimiento[0];
                                        $fecha2 = $patients_chatbot_date_dd_mm_yyyy_raw_seguimiento[1];
                                        $fecha3 = $patients_chatbot_date_dd_mm_yyyy_raw_seguimiento[2];
                                        ?>
                                        <th>Questions</th>
                                        <th><?php echo $fecha1;?></th>
                                        <th><?php echo $fecha2;?></th>
                                        <th><?php echo $fecha3;?></th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                
                                    <tr>
                                        <?php

                                        /*
                                        A partir de la pregunta 4 puede ser que la respuesta no coincida con la fecha de las tablas porque puede
                                        que el usuario solo haya respondido a las preguntas 123, por tanto miramos isi la fecha de la P4..P12 son 
                                        iguales a la Fecha, por tanto:
                                        si p4[0] = F1 o F2 o F3 -> se pone la fecha en la F correspondiente (1, 2 o 3)
                                        si P4[1] = F2 o F3 -> se pone la fecha en la F correspondiente (2 o 3)
                                        si P4[2] = F3 -> se pone la fecha en la F3
                                        Si no se pone N/A
                                        */

                                        // Seperao el resultado de la fecha para ver si coincide con la tabla
                                        $resultadofecha_1_2_d1 = explode ("-",$patients_chatbot_respuesta_1_2[0]);
                                        $resultadofecha_1_2_d2 = explode ("-",$patients_chatbot_respuesta_1_2[1]);
                                        $resultadofecha_1_2_d3 = explode ("-",$patients_chatbot_respuesta_1_2[2]);
                                        

                                        ?>
                                        <td>
                                            <strong>Compared to the last 3 days, your legs-feet or any other part of the body are?</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($resultadofecha_1_2_d1[0], 2); ?>><?php echo $resultadofecha_1_2_d1[0];  ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($resultadofecha_1_2_d2[0], 2); ?>><?php echo $resultadofecha_1_2_d2[0];  ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($resultadofecha_1_2_d3[0], 2); ?>><?php  echo $resultadofecha_1_2_d3[0];  ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <?php
                                        // Seperao el resultado de la fecha para ver si coincide con la tabla
                                        $resultadofecha_1_3_d1 = explode ("-",$patients_chatbot_respuesta_1_3[0]);
                                        $resultadofecha_1_3_d2 = explode ("-",$patients_chatbot_respuesta_1_3[1]);
                                        $resultadofecha_1_3_d3 = explode ("-",$patients_chatbot_respuesta_1_3[2]);
                                        
                                        ?>
                                        <td>
                                            <strong>Compared to the last 3 days, you feel?</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($resultadofecha_1_3_d1[0], 2); ?>><?php echo $resultadofecha_1_3_d1[0]; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($resultadofecha_1_3_d2[0], 2); ?>><?php echo $resultadofecha_1_3_d2[0]; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($resultadofecha_1_3_d3[0], 2); ?>><?php echo $resultadofecha_1_3_d3[0]; ?>
                                        </td>
                                    </tr>

                                    <tr>
                    
                                        <td>
                                            <strong> In the last 3 days, did you take any additional medication without supervision?</strong> 
                                        </td>
                                        <?php
                                        // Seperao el resultado de la fecha para ver si coincide con la tabla
                                        $resultadofecha_1_4_d1 = explode ("-",$patients_chatbot_respuesta_1_4[0]);
                                        $resultadofecha_1_4_d2 = explode ("-",$patients_chatbot_respuesta_1_4[1]);
                                        $resultadofecha_1_4_d3 = explode ("-",$patients_chatbot_respuesta_1_4[2]);

                                        $p4_fecha_d1 = $resultadofecha_1_4_d1[1];
                                        $p4_fecha_d2 = $resultadofecha_1_4_d2[1];
                                        $p4_fecha_d3 = $resultadofecha_1_4_d3[1];

                                        $respuesta_1_4_d1 = utf8_encode($resultadofecha_1_4_d1[0]);
                                        $respuesta_1_4_d2 = utf8_encode($resultadofecha_1_4_d2[0]);
                                        $respuesta_1_4_d3 = utf8_encode($resultadofecha_1_4_d3[0]);

                                        // echo "Respuesta_1_4_d1: $respuesta_1_4_d1<br>";
                                        // echo "Respuesta_1_4_d2: $respuesta_1_4_d2<br>";
                                        // echo "Respuesta_1_4_d3: $respuesta_1_4_d3<br>";

                                        $arpsf_p4 = resultado_posicion_segun_fecha ($fecha1, $fecha2, $fecha3, $p4_fecha_d1, $p4_fecha_d2, $p4_fecha_d3, $respuesta_1_4_d1, $respuesta_1_4_d2, $respuesta_1_4_d3);

                                       ?>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p4[0], 2); ?>><?php echo $arpsf_p4[0]; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p4[1], 2); ?>><?php echo $arpsf_p4[1]; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p4[2], 2); ?>><?php echo $arpsf_p4[2]; ?>
                                        </td>
                                        
                                    </tr>

                                    <tr>
                                        <?php
                                        // Seperado el resultado de la fecha para ver si coincide con la tabla
                                        $resultadofecha_1_5_d1 = explode ("-",$patients_chatbot_respuesta_1_5[0]);
                                        $resultadofecha_1_5_d2 = explode ("-",$patients_chatbot_respuesta_1_5[1]);
                                        $resultadofecha_1_5_d3 = explode ("-",$patients_chatbot_respuesta_1_5[2]);

                                        $p5_fecha_d1 = $resultadofecha_1_5_d1[1];
                                        $p5_fecha_d2 = $resultadofecha_1_5_d2[1];
                                        $p5_fecha_d3 = $resultadofecha_1_5_d3[1];

                                        $respuesta_1_5_d1 = utf8_encode($resultadofecha_1_5_d1[0]);
                                        $respuesta_1_5_d2 = utf8_encode($resultadofecha_1_5_d2[0]);
                                        $respuesta_1_5_d3 = utf8_encode($resultadofecha_1_5_d3[0]);

                                        // echo "Respuesta_1_5_d1: $respuesta_1_5_d1<br>";
                                        // echo "Respuesta_1_5_d2: $respuesta_1_5_d2<br>";
                                        // echo "Respuesta_1_5_d3: $respuesta_1_5_d3<br>";

                                        $arpsf_p5 = resultado_posicion_segun_fecha ($fecha1, $fecha2, $fecha3, $p5_fecha_d1, $p5_fecha_d2, $p5_fecha_d3, $respuesta_1_5_d1, $respuesta_1_5_d2, $respuesta_1_5_d3);

                                        ?>
                                        <td>
                                            <strong>Could you take walks like the previous days?</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p5[0], 2); ?>><?php echo $arpsf_p5[0]; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p5[1], 2); ?>><?php echo $arpsf_p5[1]; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p5[2], 2); ?>><?php echo $arpsf_p5[2]; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <?php
                                        // Seperao el resultado de la fecha para ver si coincide con la tabla
                                        $resultadofecha_1_6_d1 = explode ("-",$patients_chatbot_respuesta_1_6[0]);
                                        $resultadofecha_1_6_d2 = explode ("-",$patients_chatbot_respuesta_1_6[1]);
                                        $resultadofecha_1_6_d3 = explode ("-",$patients_chatbot_respuesta_1_6[2]);

                                        $p6_fecha_d1 = $resultadofecha_1_6_d1[1];
                                        $p6_fecha_d2 = $resultadofecha_1_6_d2[1];
                                        $p6_fecha_d3 = $resultadofecha_1_6_d3[1];

                                        $respuesta_1_6_d1 = utf8_encode($resultadofecha_1_6_d1[0]);
                                        $respuesta_1_6_d2 = utf8_encode($resultadofecha_1_6_d2[0]);
                                        $respuesta_1_6_d3 = utf8_encode($resultadofecha_1_6_d3[0]);

                                        // echo "Respuesta_1_6_d1: $respuesta_1_6_d1<br>";
                                        // echo "Respuesta_1_6_d2: $respuesta_1_6_d2<br>";
                                        // echo "Respuesta_1_6_d3: $respuesta_1_6_d3<br>";

                                        $arpsf_p6 = resultado_posicion_segun_fecha ($fecha1, $fecha2, $fecha3, $p6_fecha_d1, $p6_fecha_d2, $p6_fecha_d3, $respuesta_1_6_d1, $respuesta_1_6_d2, $respuesta_1_6_d3);


                                        ?>
                                        <td>
                                            <strong>Did you have a choking feeling or shortness of breath when you lay in bed?</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p6[0], 2); ?>><?php echo $arpsf_p6[0]; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p6[1], 2); ?>><?php echo $arpsf_p6[1]; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p6[2], 2); ?>><?php echo $arpsf_p6[2]; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <?php
                                        // Seperao el resultado de la fecha para ver si coincide con la tabla
                                        $resultadofecha_1_7_d1 = explode ("-",$patients_chatbot_respuesta_1_7[0]);
                                        $resultadofecha_1_7_d2 = explode ("-",$patients_chatbot_respuesta_1_7[1]);
                                        $resultadofecha_1_7_d3 = explode ("-",$patients_chatbot_respuesta_1_7[2]);

                                        $p7_fecha_d1 = $resultadofecha_1_7_d1[1];
                                        $p7_fecha_d2 = $resultadofecha_1_7_d2[1];
                                        $p7_fecha_d3 = $resultadofecha_1_7_d3[1];

                                        $respuesta_1_7_d1 = utf8_encode($resultadofecha_1_7_d1[0]);
                                        $respuesta_1_7_d2 = utf8_encode($resultadofecha_1_7_d2[0]);
                                        $respuesta_1_7_d3 = utf8_encode($resultadofecha_1_7_d3[0]);

                                        // echo "Respuesta_1_7_d1: $respuesta_1_7_d1<br>";
                                        // echo "Respuesta_1_7_d2: $respuesta_1_7_d2<br>";
                                        // echo "Respuesta_1_7_d3: $respuesta_1_7_d3<br>";

                                        $arpsf_p7 = resultado_posicion_segun_fecha ($fecha1, $fecha2, $fecha3, $p7_fecha_d1, $p7_fecha_d2, $p7_fecha_d3, $respuesta_1_7_d1, $respuesta_1_7_d2, $respuesta_1_7_d3);

                                        ?>
                                        <td>
                                            <strong>Did you cough more or have more phlegm?</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p7[0], 2); ?>><?php echo $arpsf_p7[0]; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p7[1], 2); ?>><?php echo $arpsf_p7[1]; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p7[2], 2); ?>><?php echo $arpsf_p7[2]; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <?php
                                        // Seperao el resultado de la fecha para ver si coincide con la tabla
                                        $resultadofecha_1_8_d1 = explode ("-",$patients_chatbot_respuesta_1_8[0]);
                                        $resultadofecha_1_8_d2 = explode ("-",$patients_chatbot_respuesta_1_8[1]);
                                        $resultadofecha_1_8_d3 = explode ("-",$patients_chatbot_respuesta_1_8[2]);

                                        $p8_fecha_d1 = $resultadofecha_1_8_d1[1];
                                        $p8_fecha_d2 = $resultadofecha_1_8_d2[1];
                                        $p8_fecha_d3 = $resultadofecha_1_8_d3[1];

                                        $respuesta_1_8_d1 = utf8_encode($resultadofecha_1_8_d1[0]);
                                        $respuesta_1_8_d2 = utf8_encode($resultadofecha_1_8_d2[0]);
                                        $respuesta_1_8_d3 = utf8_encode($resultadofecha_1_8_d3[0]);

                                        $arpsf_p8 = resultado_posicion_segun_fecha ($fecha1, $fecha2, $fecha3, $p8_fecha_d1, $p8_fecha_d2, $p8_fecha_d3, $respuesta_1_8_d1, $respuesta_1_8_d2, $respuesta_1_8_d3);

                                        ?>
                                        <td>
                                            <strong>Does your medication make you feel bad, such as dizzy or makes your blood pressure drop, or any other side effect?</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p8[0], 2); ?>><?php echo $arpsf_p8[0]; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p8[1], 2); ?>><?php echo $arpsf_p8[1]; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p8[2], 2); ?>><?php echo $arpsf_p8 [2]; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <?php
                                        // Seperao el resultado de la fecha para ver si coincide con la tabla
                                        $resultadofecha_1_9_d1 = explode ("-",$patients_chatbot_respuesta_1_9[0]);
                                        $resultadofecha_1_9_d2 = explode ("-",$patients_chatbot_respuesta_1_9[1]);
                                        $resultadofecha_1_9_d3 = explode ("-",$patients_chatbot_respuesta_1_9[2]);

                                        $p9_fecha_d1 = $resultadofecha_1_9_d1[1];
                                        $p9_fecha_d2 = $resultadofecha_1_9_d2[1];
                                        $p9_fecha_d3 = $resultadofecha_1_9_d3[1];

                                        $respuesta_1_9_d1 = utf8_encode($resultadofecha_1_9_d1[0]);
                                        $respuesta_1_9_d2 = utf8_encode($resultadofecha_1_9_d2[0]);
                                        $respuesta_1_9_d3 = utf8_encode($resultadofecha_1_9_d3[0]);

                                        // echo "Respuesta_1_9_d1: $respuesta_1_9_d1<br>";
                                        // echo "Respuesta_1_9_d2: $respuesta_1_9_d2<br>";
                                        // echo "Respuesta_1_9_d3: $respuesta_1_9_d3<br>";

                                        $arpsf_p9 = resultado_posicion_segun_fecha ($fecha1, $fecha2, $fecha3, $p9_fecha_d1, $p9_fecha_d2, $p9_fecha_d3, $respuesta_1_9_d1, $respuesta_1_9_d2, $respuesta_1_9_d3);

                                        ?>
                                        <td>
                                            <strong>For the last 3 days, did you follow the diet and exercise recommendations given by your doctor and nurse?</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p9[0], 2); ?>> <?php echo $arpsf_p9[0]; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p9[1], 2); ?>> <?php echo $arpsf_p9[1]; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p9[2], 2); ?>> <?php echo $arpsf_p9[2]; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <?php
                                        // Seperao el resultado de la fecha para ver si coincide con la tabla
                                        $resultadofecha_1_10_d1 = explode ("-",$patients_chatbot_respuesta_1_10[0]);
                                        $resultadofecha_1_10_d2 = explode ("-",$patients_chatbot_respuesta_1_10[1]);
                                        $resultadofecha_1_10_d3 = explode ("-",$patients_chatbot_respuesta_1_10[2]);

                                        $p10_fecha_d1 = $resultadofecha_1_10_d1[1];
                                        $p10_fecha_d2 = $resultadofecha_1_10_d2[1];
                                        $p10_fecha_d3 = $resultadofecha_1_10_d3[1];

                                        $respuesta_1_10_d1 = utf8_encode($resultadofecha_1_10_d1[0]);
                                        $respuesta_1_10_d2 = utf8_encode($resultadofecha_1_10_d2[0]);
                                        $respuesta_1_10_d3 = utf8_encode($resultadofecha_1_10_d3[0]);

                                        // echo "Respuesta_1_10_d1: $respuesta_1_10_d1<br>";
                                        // echo "Respuesta_1_10_d2: $respuesta_1_10_d2<br>";
                                        // echo "Respuesta_1_10_d3: $respuesta_1_10_d3<br>";

                                        $arpsf_p10 = resultado_posicion_segun_fecha ($fecha1, $fecha2, $fecha3, $p10_fecha_d1, $p10_fecha_d2, $p10_fecha_d3, $respuesta_1_10_d1, $respuesta_1_10_d2, $respuesta_1_10_d3);

                                        ?>
                                        <td>
                                            <strong>Do you notice you urinate less, more or the same?</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p10[0], 2); ?>><?php echo $arpsf_p10[0]; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p10[1], 2); ?>><?php echo $arpsf_p10[1]; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p10[2], 2); ?>><?php echo $arpsf_p10[2]; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <?php
                                        // Seperao el resultado de la fecha para ver si coincide con la tabla
                                        $resultadofecha_1_11_d1 = explode ("-",$patients_chatbot_respuesta_1_11[0]);
                                        $resultadofecha_1_11_d2 = explode ("-",$patients_chatbot_respuesta_1_11[1]);
                                        $resultadofecha_1_11_d3 = explode ("-",$patients_chatbot_respuesta_1_11[2]);

                                        $p11_fecha_d1 = $resultadofecha_1_11_d1[1];
                                        $p11_fecha_d2 = $resultadofecha_1_11_d2[1];
                                        $p11_fecha_d3 = $resultadofecha_1_11_d3[1];

                                        $respuesta_1_11_d1 = utf8_encode($resultadofecha_1_11_d1[0]);
                                        $respuesta_1_11_d2 = utf8_encode($resultadofecha_1_11_d2[0]);
                                        $respuesta_1_11_d3 = utf8_encode($resultadofecha_1_11_d3[0]);

                                        // echo "Respuesta_1_11_d1: $respuesta_1_11_d1<br>";
                                        // echo "Respuesta_1_11_d2: $respuesta_1_11_d2<br>";
                                        // echo "Respuesta_1_11_d3: $respuesta_1_11_d3<br>";

                                        $arpsf_p11 = resultado_posicion_segun_fecha ($fecha1, $fecha2, $fecha3, $p11_fecha_d1, $p11_fecha_d2, $p11_fecha_d3, $respuesta_1_11_d1, $respuesta_1_11_d2, $respuesta_1_11_d3);

                                        ?>
                                        <td>
                                            <strong>Did you have chest o neck palpitations recently?</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p11[0], 2); ?>><?php echo $arpsf_p11[0]; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p11[1], 2); ?>><?php echo $arpsf_p11[1]; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p11[2], 2); ?>><?php echo $arpsf_p11[2]; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <?php
                                        // Seperao el resultado de la fecha para ver si coincide con la tabla
                                        $resultadofecha_1_12_d1 = explode ("-",$patients_chatbot_respuesta_1_12[0]);
                                        $resultadofecha_1_12_d2 = explode ("-",$patients_chatbot_respuesta_1_12[1]);
                                        $resultadofecha_1_12_d3 = explode ("-",$patients_chatbot_respuesta_1_12[2]);

                                        $p12_fecha_d1 = $resultadofecha_1_12_d1[1];
                                        $p12_fecha_d2 = $resultadofecha_1_12_d2[1];
                                        $p12_fecha_d3 = $resultadofecha_1_12_d3[1];

                                        $respuesta_1_12_d1 = utf8_encode($resultadofecha_1_12_d1[0]);
                                        $respuesta_1_12_d2 = utf8_encode($resultadofecha_1_12_d1[1]);
                                        $respuesta_1_12_d3 = utf8_encode($resultadofecha_1_12_d1[2]);

                                        // echo "Respuesta_1_12_d1: $respuesta_1_12_d1<br>";
                                        // echo "Respuesta_1_12_d2: $respuesta_1_12_d2<br>";
                                        // echo "Respuesta_1_12_d3: $respuesta_1_12_d3<br>";

                                        $arpsf_p12 = resultado_posicion_segun_fecha ($fecha1, $fecha2, $fecha3, $p12_fecha_d1, $p12_fecha_d2, $p12_fecha_d3, $respuesta_1_12_d1, $respuesta_1_12_d2, $respuesta_1_12_d3);

                                        ?>
                                        <td>
                                            <strong>Do you feel that you have more day drowsiness?</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p12[0], 2); ?>><?php echo $arpsf_p12[0]; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p12[1], 2); ?>><?php echo $arpsf_p12[1]; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($arpsf_p12[2], 2); ?>><?php echo $arpsf_p12[2]; ?>
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
                                        <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw_medica[0];?></th>
                                        <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw_medica[1];?></th>
                                        <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw_medica[2];?></th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                
                                <tr>
                                    <?php
                                    //Pregunta 2 2
                                    $resultadofecha_2_2_d1 = explode ("-",$patients_chatbot_respuesta_2_2[0]);
                                    $resultadofecha_2_2_d2 = explode ("-",$patients_chatbot_respuesta_2_2[1]);
                                    $resultadofecha_2_2_d3 = explode ("-",$patients_chatbot_respuesta_2_2[2]);

                                    $p2_2_fecha_d1 = $resultadofecha_2_2_d1[1];
                                    $p2_2_fecha_d2 = $resultadofecha_2_2_d2[1];
                                    $p2_2_fecha_d3 = $resultadofecha_2_2_d3[1];

                                    $respuesta_2_2_d1 = utf8_encode($resultadofecha_2_2_d1[0]);
                                    $respuesta_2_2_d2 = utf8_encode($resultadofecha_2_2_d2[0]);
                                    $respuesta_2_2_d3 = utf8_encode($resultadofecha_2_2_d3[0]);

                                    //Pregunta 2 3
                                    $resultadofecha_2_3_d1 = explode ("-",$patients_chatbot_respuesta_2_3[0]);
                                    $resultadofecha_2_3_d2 = explode ("-",$patients_chatbot_respuesta_2_3[1]);
                                    $resultadofecha_2_3_d3 = explode ("-",$patients_chatbot_respuesta_2_3[2]);

                                    $p2_3_fecha_d1 = $resultadofecha_2_3_d1[1];
                                    $p2_3_fecha_d2 = $resultadofecha_2_3_d2[1];
                                    $p2_3_fecha_d3 = $resultadofecha_2_3_d3[1];

                                    $respuesta_2_3_d1 = utf8_encode($resultadofecha_2_3_d1[0]);
                                    $respuesta_2_3_d2 = utf8_encode($resultadofecha_2_3_d2[0]);
                                    $respuesta_2_3_d3 = utf8_encode($resultadofecha_2_3_d3[0]);

                                    //Pregunta 2 4
                                    $resultadofecha_2_4_d1 = explode ("-",$patients_chatbot_respuesta_2_4[0]);
                                    $resultadofecha_2_4_d2 = explode ("-",$patients_chatbot_respuesta_2_4[1]);
                                    $resultadofecha_2_4_d3 = explode ("-",$patients_chatbot_respuesta_2_4[2]);

                                    $p2_4_fecha_d1 = $resultadofecha_2_4_d1[1];
                                    $p2_4_fecha_d2 = $resultadofecha_2_4_d2[1];
                                    $p2_4_fecha_d3 = $resultadofecha_2_4_d3[1];

                                    $respuesta_2_4_d1 = utf8_encode($resultadofecha_2_4_d1[0]);
                                    $respuesta_2_4_d2 = utf8_encode($resultadofecha_2_4_d2[0]);
                                    $respuesta_2_4_d3 = utf8_encode($resultadofecha_2_4_d3[0]);

                                    //Pregunta 2 5
                                    $resultadofecha_2_5_d1 = explode ("-",$patients_chatbot_respuesta_2_5[0]);
                                    $resultadofecha_2_5_d2 = explode ("-",$patients_chatbot_respuesta_2_5[1]);
                                    $resultadofecha_2_5_d3 = explode ("-",$patients_chatbot_respuesta_2_5[2]);

                                    $p2_5_fecha_d1 = $resultadofecha_2_5_d1[1];
                                    $p2_5_fecha_d2 = $resultadofecha_2_5_d2[1];
                                    $p2_5_fecha_d3 = $resultadofecha_2_5_d3[1];

                                    $respuesta_2_5_d1 = utf8_encode($resultadofecha_2_5_d1[0]);
                                    $respuesta_2_5_d2 = utf8_encode($resultadofecha_2_5_d2[0]);
                                    $respuesta_2_5_d3 = utf8_encode($resultadofecha_2_5_d3[0]);

                                    //Pregunta 2 6
                                    $resultadofecha_2_6_d1 = explode ("-",$patients_chatbot_respuesta_2_6[0]);
                                    $resultadofecha_2_6_d2 = explode ("-",$patients_chatbot_respuesta_2_6[1]);
                                    $resultadofecha_2_6_d3 = explode ("-",$patients_chatbot_respuesta_2_6[2]);

                                    $p2_6_fecha_d1 = $resultadofecha_2_6_d1[1];
                                    $p2_6_fecha_d2 = $resultadofecha_2_6_d2[1];
                                    $p2_6_fecha_d3 = $resultadofecha_2_6_d3[1];

                                    $respuesta_2_6_d1 = utf8_encode($resultadofecha_2_6_d1[0]);
                                    $respuesta_2_6_d2 = utf8_encode($resultadofecha_2_6_d2[0]);
                                    $respuesta_2_6_d3 = utf8_encode($resultadofecha_2_6_d3[0]);
                                    ?>

                                        <td>
                                            <strong>I forget to take them</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_2_2_d1, 2); ?>><?php echo $respuesta_2_2_d1; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_2_2_d2, 2); ?>><?php echo $respuesta_2_2_d2; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_2_2_d3, 2); ?>><?php echo $respuesta_2_2_d3; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <strong>I alter the dose</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_2_3_d1, 2); ?>><?php echo $respuesta_2_3_d1; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_2_3_d2, 2); ?>><?php echo $respuesta_2_3_d2; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_2_3_d3, 2); ?>><?php echo $respuesta_2_3_d3; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <strong> I stop taking them for a while</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_2_4_d1, 2); ?>><?php echo $respuesta_2_4_d1; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_2_4_d2, 2); ?>><?php echo $respuesta_2_4_d2; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_2_4_d3, 2); ?>><?php echo $respuesta_2_4_d3; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <strong>I decide to miss out a dose</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_2_5_d1, 2); ?>><?php echo $respuesta_2_5_d1; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_2_5_d2, 2); ?>><?php echo $respuesta_2_5_d2; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_2_5_d3, 2); ?>><?php echo $respuesta_2_5_d3; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <strong>I take less than instructed</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_2_6_d1, 2); ?>><?php echo $respuesta_2_6_d1; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_2_6_d2, 2); ?>><?php echo $respuesta_2_6_d2; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_2_6_d3, 2); ?>><?php echo $respuesta_2_6_d3; ?>
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

            <!-- TODO separar en los 4 cuestionarios -->

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
                                        <th>Question</th>
                                        <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw_contacto[0];?></th>
                                        <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw_contacto[1];?></th>
                                        <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw_contacto[2];?></th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                
                                    <tr>

                                    <?php
                                    //Pregunta 3 1
                                    $resultadofecha_3_1_d1 = explode ("-",$patients_chatbot_respuesta_3_1[0]);
                                    $resultadofecha_3_1_d2 = explode ("-",$patients_chatbot_respuesta_3_1[1]);
                                    $resultadofecha_3_1_d3 = explode ("-",$patients_chatbot_respuesta_3_1[2]);

                                    $p3_1_fecha_d1 = $resultadofecha_3_1_d1[1];
                                    $p3_1_fecha_d2 = $resultadofecha_3_1_d2[1];
                                    $p3_1_fecha_d3 = $resultadofecha_3_1_d3[1];

                                    $respuesta_3_1_d1 = utf8_encode($resultadofecha_3_1_d1[0]);
                                    $respuesta_3_1_d2 = utf8_encode($resultadofecha_3_1_d2[0]);
                                    $respuesta_3_1_d3 = utf8_encode($resultadofecha_3_1_d3[0]);
                                    ?>

                                        <td>
                                            <strong>Has any doctor changed anything of your medication that Clinica Humana is not aware of? </strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_3_1_d1,2); ?>><?php echo $respuesta_3_1_d1; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_3_1_d2,2); ?>><?php echo $respuesta_3_1_d2; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_3_1_d3,2); ?>><?php echo $respuesta_3_1_d3; ?>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->

                    </div>
                    <!-- /.card-row -->


                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered"  width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Question</th>
                                        <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw_cambio[0];?></th>
                                        <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw_cambio[1];?></th>
                                        <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw_cambio[2];?></th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                
                                   <tr>

                                   <?php
                                    //Pregunta 3 2
                                    $resultadofecha_3_2_d1 = explode ("-",$patients_chatbot_respuesta_3_2[0]);
                                    $resultadofecha_3_2_d2 = explode ("-",$patients_chatbot_respuesta_3_2[1]);
                                    $resultadofecha_3_2_d3 = explode ("-",$patients_chatbot_respuesta_3_2[2]);

                                    $p3_2_fecha_d1 = $resultadofecha_3_2_d1[1];
                                    $p3_2_fecha_d2 = $resultadofecha_3_2_d2[1];
                                    $p3_2_fecha_d3 = $resultadofecha_3_2_d3[1];

                                    $respuesta_3_2_d1 = utf8_encode($resultadofecha_3_2_d1[0]);
                                    $respuesta_3_2_d2 = utf8_encode($resultadofecha_3_2_d2[0]);
                                    $respuesta_3_2_d3 = utf8_encode($resultadofecha_3_2_d3[0]);
                                    ?>

                                        <td>
                                            <strong>Did you have new blood or urine test results that Clinica Humana is not aware of?</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_3_2_d1, 2); ?>><?php echo $respuesta_3_2_d1; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_3_2_d2, 2); ?>><?php echo $respuesta_3_2_d2; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_3_2_d3, 2); ?>><?php echo $respuesta_3_2_d3; ?>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->

                    </div>
                    <!-- /.card-row -->

                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered"  width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Questions</th>
                                        <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw_ingresado[0];?></th>
                                        <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw_ingresado[1];?></th>
                                        <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw_ingresado[2];?></th>
                                    </tr>
                                </thead>
                                
                                <tbody>

                                    <tr>

                                    <?php
                                    //Pregunta 3 3
                                    $resultadofecha_3_3_d1 = explode ("-",$patients_chatbot_respuesta_3_3[0]);
                                    $resultadofecha_3_3_d2 = explode ("-",$patients_chatbot_respuesta_3_3[1]);
                                    $resultadofecha_3_3_d3 = explode ("-",$patients_chatbot_respuesta_3_3[2]);

                                    $p3_3_fecha_d1 = $resultadofecha_3_3_d1[1];
                                    $p3_3_fecha_d2 = $resultadofecha_3_3_d2[1];
                                    $p3_3_fecha_d3 = $resultadofecha_3_3_d3[1];

                                    $respuesta_3_3_d1 = utf8_encode($resultadofecha_3_3_d1[0]);
                                    $respuesta_3_3_d2 = utf8_encode($resultadofecha_3_3_d2[0]);
                                    $respuesta_3_3_d3 = utf8_encode($resultadofecha_3_3_d3[0]);
                                    ?>

                                        <td>
                                            <strong>Did you contact any health professional in addition to CH that you haven't told me yet?</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_3_3_d1, 2); ?>><?php echo $respuesta_3_3_d1; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_3_3_d2, 2); ?>><?php echo $respuesta_3_3_d2; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_3_3_d3, 2); ?>><?php echo $respuesta_3_3_d3; ?>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->

                    </div>
                    <!-- /.card-row -->

                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered"  width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Questions</th>
                                        <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw_analitica[0];?></th>
                                        <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw_analitica[1];?></th>
                                        <th><?php echo $patients_chatbot_date_dd_mm_yyyy_raw_analitica[2];?></th>
                                    </tr>
                                </thead>
                                
                                <tbody>

                                    <tr>

                                    <?php
                                    //Pregunta 3 4
                                    $resultadofecha_3_4_d1 = explode ("-",$patients_chatbot_respuesta_3_4[0]);
                                    $resultadofecha_3_4_d2 = explode ("-",$patients_chatbot_respuesta_3_4[1]);
                                    $resultadofecha_3_4_d3 = explode ("-",$patients_chatbot_respuesta_3_4[2]);

                                    $p3_4_fecha_d1 = $resultadofecha_3_4_d1[1];
                                    $p3_4_fecha_d2 = $resultadofecha_3_4_d2[1];
                                    $p3_4_fecha_d3 = $resultadofecha_3_4_d3[1];

                                    $respuesta_3_4_d1 = utf8_encode($resultadofecha_3_4_d1[0]);
                                    $respuesta_3_4_d2 = utf8_encode($resultadofecha_3_4_d2[0]);
                                    $respuesta_3_4_d3 = utf8_encode($resultadofecha_3_4_d3[0]);
                                    ?>

                                        <td>
                                            <strong>Have you been admitted to hospital and Clínica Humana is not aware of?</strong> 
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_3_4_d1, 2); ?>><?php echo $respuesta_3_4_d1; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_3_4_d2, 2); ?>><?php echo $respuesta_3_4_d2; ?>
                                        </td>
                                        <td>
                                            <p class = <?php echo fcolor ($respuesta_3_4_d3, 2); ?>><?php echo $respuesta_3_4_d3; ?>
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