<?php

    if (defined("SECURITY_CONSTANT")) {

        $bodyId = "userList";
        $pageTitle = "Users list";
        require_once(SKEL_DIR . "/cabecera.php");
        
        require_once(SKEL_DIR . "/headStart.php");
        
        // JS necesario para las tablas
        require_once(SKEL_DIR . "/dataTables.php");

        require_once(SKEL_DIR . "/headEnd.php");
        
        require_once(SKEL_DIR . "/bodyStart.php");
        
        require_once(SKEL_DIR . "/menu.php");
        
?>
        <h1><?php echo $pageTitle ?></h1>

        <table class="listado" cellspacing="0">
            <colgroup>
                <col width="100%" />
            </colgroup>
            <thead>
                <tr>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
<?php

        $numUsers = count($users);

        for ($i = 0; $i < $numUsers; $i++) {
        
            $user = (object)$users[$i];
            
            $class = ($i % 2 == 0) ? "" : "class=\"impar\"";
            
?>
                <tr <?php echo $class ?>>
                    <td>
                        <a href="index.php?controller=user&amp;option=query&amp;id=<?php echo $user->getuserId() ?>"><?php echo $user->getuserName() ?></a>
                    </td>
                </tr>
<?php

        }

?>
            </tbody>
        </table>
<?php
        
        require_once(SKEL_DIR . "/bodyEnd.php");
        
        require_once(SKEL_DIR . "/pie.php");

    }

?>