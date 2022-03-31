<?php

	if (defined("SECURITY_CONSTANT")) {
		
?>
		<div id="menu">
    		<ul id="nav">
                <li><a href="#">Emails</a>
                	<ul>
                        <li><a href="index.php?controller=patients&amp;option=list" title="patients list">Patients list</a></li>
                    </ul>
                </li>
                <li><a href="#">users</a>
                	<ul>
                		<li><a href="index.php?controller=user&amp;option=list" title="users list">Users list</a></li>
                        <li><a href="index.php?controller=user&amp;option=precreation" title="New user">New user</a></li>
                  	</ul>
                </li>
            </ul>
        </div>
<?php
		
	}

?>