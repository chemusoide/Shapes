<?php

    if (defined("SECURITY_CONSTANT")) {

        $bodyId = "patient_p2";
        $pageTitle_01 = "Medicines";
        $pageTitle_02 = "Lab Result";

        require_once(SKEL_DIR . "/cabecera.php");
        
        require_once(SKEL_DIR . "/headStart.php");
        
        require_once(SKEL_DIR . "/headEnd.php");
        
        require_once(SKEL_DIR . "/bodyStart.php");
        
        require_once(SKEL_DIR . "/sidebar.php");
        
        require_once(SKEL_DIR . "/contentWrapper.php");

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
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>NAME</th>
                                        <th>CODE</th>
                                        <th>PRESCRIBET DAY</th>
                                    </tr>
                                </thead>
                                
                                
                                <tbody>
                                <?php


                                    $num_patients_medicines = count($patients_medicines);
                                            
                                    for ($i = 0; $i < $num_patients_medicines; $i++) {
                                      
                                ?>
                                        <tr>
                                            <td>
                                                <?php
                                                echo $patients_medicines -> getMedicineName();
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $patients_medicines -> getId();
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $medicine_timestamp = $patients_medicines -> getCreateTs();
                                                $medicine_date = explode (" ", $medicine_timestamp);
                                                $medicine_date_parts = explode ("-", $medicine_date[0]);
                                                echo "$medicine_date_parts[2]/$medicine_date_parts[1]/$medicine_date_parts[0]";

                                                ?>
                                            </td>
                                        </tr>
                                <?php

                                    } // End for

                                ?>
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
            
            <?php 
                
                //Contamos los datos de analiticas
                $num_patients_lab_analytics = count($patients_lab_analytics);

                // Recorremos el listado y seleccionamos de todos los datos del tipo
                // peso y los ponemos en un array, como el array está ordenado por fecha
                // el primer peso (que será la última medida)

                //var_dump ($patients_lab_analytics);
            
                for ($i = 0; $i < $num_patients_lab_analytics; $i++) {
                        
                    $patients_lab_analytics_object = (object)$patients_lab_analytics[$i];

                    //guardamos la fecha
                    $patients_lab_analytics_time_stamp = $patients_lab_analytics_object -> getRecordDate();

                    #Creamos el objeto
                    $patients_lab_analytics_time_stamp_object =new DateTime($patients_lab_analytics_time_stamp);
                    
                    //Lo vamos guardoad en el formato deseado en un array (quedan todas las líneas guardadas y por tanto hay repetido)
                    //Fuera del for quitamos las repetidas
                    $patients_lab_analytics_date_dd_mm_yyyy_raw[] = $patients_lab_analytics_time_stamp_object->format("j/m/Y"); 

                    //cogemos los datos y miramos el tipo de dato que es
                    $patients_lab_analytics_type = $patients_lab_analytics_object -> getLabParam();

                    //Miramos esl tipo de dato y lo guardamos en un array por clase
                    //con los datos cronológicos de más reciente[0] a más antiguo[n]
                    switch ($patients_lab_analytics_type) {
                        
                        case "U":
                            $u[] = $patients_lab_analytics_object -> getLabvalue();
                        break;

                        case "C":
                            $c[] = $patients_lab_analytics_object -> getLabvalue();
                        break;

                        case "S":
                            $s[] = $patients_lab_analytics_object -> getLabvalue();
                        break;

                        case "P":
                            $p[] = $patients_lab_analytics_object -> getLabvalue();
                        break;

                        case "H":
                            $h[] = $patients_lab_analytics_object -> getLabvalue();
                        break;

                        case "CT":
                            $ct[] = $patients_lab_analytics_object -> getLabvalue();
                        break;

                        case "LDL":
                            $ldl[] = $patients_lab_analytics_object -> getLabvalue();
                        break;

                        case "HDL":
                            $hdl[] = $patients_lab_analytics_object -> getLabvalue();
                        break;

                        case "eGFR":
                            $egfr[] = $patients_lab_analytics_object -> getLabvalue();
                        break;

                        case "UP":
                            $up[] = $patients_lab_analytics_object -> getLabvalue();
                        break;

                        default:
                            echo "Dato no esperado";

                    } //End switch

                } // End for

                //Quitamos los valores repetidos de fecha en el array los guarda en indices 0, 10, 20, 30...:
                $patients_lab_analytics_date_dd_mm_yyyy = array_unique($patients_lab_analytics_date_dd_mm_yyyy_raw);

            ?>


            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $pageTitle_02 ." - ". $patients_lab_analytics_date_dd_mm_yyyy[0]; ?></h6>
                </div>
                <div class="card-body">
                    
                    <div class="row">

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    UREA
                                </div>
                                <div class="card-body">
                                    <?php
                                        echo "$u[0] mg/dl";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    CREATINE
                                </div>
                                <div class="card-body">
                                    <?php
                                        echo "$c[0] mg/dl";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    SODIUM
                                </div>
                                <div class="card-body">
                                    <?php
                                        echo "$s[0] mEq/L";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    POTASIUM
                                </div>
                                <div class="card-body">
                                    <?php
                                        echo "$p[0] mEq/L";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    HAEMOGLOBIN
                                </div>
                                <div class="card-body">
                                    <?php
                                        echo "$h[0] g/dl";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    CHOLESTEROL TOTAL
                                </div>
                                <div class="card-body">
                                    <?php
                                        echo "$ct[0] mmol/l";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    CHOLESTEROL LDL
                                </div>
                                <div class="card-body">
                                    <?php
                                        echo "$ldl[2] mmol/l";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    CHOLESTEROL HDL
                                </div>
                                <div class="card-body">
                                    <?php
                                        echo "$hdl[0] mmol/l";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    EGFR
                                </div>
                                <div class="card-body">
                                    <?php
                                        echo "$egfr[0] ml/min";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    URINE PROTEINURA
                                </div>
                                <div class="card-body">
                                    <?php
                                        echo "$up[0] mg/mmol";
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
            <!-- /.data table -->

        </div>
        <!-- /.container-fluid -->            

<?php

        require_once(SKEL_DIR . "/bodyEnd.php");

        require_once(SKEL_DIR . "/pie.php");

    }
?>