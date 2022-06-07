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

        require_once("patient_blocks.php");

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