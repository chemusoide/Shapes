<?php

    if (defined("SECURITY_CONSTANT")) {

        $bodyId = "show_all_emails";
        $pageTitle = "Patients E-Mail List";

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
            <h1 class="h3 mb-2 text-gray-800"><?php echo $pageTitle ?></h1>
          
            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Patients</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>P1</th>
                                    <th>P2</th>
                                    <th>P3</th>
                                </tr>
                            </thead>
                            
                            
                            <tbody>
                            <?php


                                $numPatients = count($patients);

                                for ($i = 0; $i < $numPatients; $i++) {
                            
                                    $patient = (object)$patients[$i];
                                    

                            ?>
                                        <tr>
                                            <td>
                                                <a href= "index.php?controller=patients&amp;option=query&amp;id=<?php echo $patient->getId() ?>"><?php echo $patient->getIdString()?></a>
                                            </td>
                                            <td>
                                                <a href= "index.php?controller=patients&amp;option=query_p1&amp;id=<?php echo $patient->getId() ?>">P1</a>
                                            </td>
                                            <td>
                                                <a href= "index.php?controller=patients&amp;option=query_p2&amp;id=<?php echo $patient->getId() ?>">P2</a>
                                            </td>
                                            <td>
                                                <a href= "index.php?controller=patients&amp;option=query_p3&amp;id=<?php echo $patient->getId() ?>">P3</a>
                                            </td>
                                        </tr>
                            <?php

                                }

                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div> 
                <!-- /.card-body -->      
            </div>
            <!-- /.card-shadow -->
        </div>
        <!-- /.container-fluid -->            

<?php

        require_once(SKEL_DIR . "/bodyEnd.php");

        require_once(SKEL_DIR . "/pie.php");

    }
?>