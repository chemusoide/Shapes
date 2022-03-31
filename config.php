<?php

    // Whitelist with the files that we allow
    define(
    	"ALLOWED_CONTROLLERS", 
        serialize( 
            array(
                "user",
                "patients",
                "chatbot"
            )
        )
    );

    // Directory where we host the files of the common skeleton of the views
    define("SKEL_DIR", "skel");

    // Directory where we host the views
    define("VIEWS_DIR", "views");
    
    // Directory where we host the controllers
    define("CONTROLLERS_DIR", "controllers");

    // Directory of Data Access Object
    define("DAO_DIR", "dao");
    
    // Directory of JavaScript u CSS
    define("JS_DIR", "js");
    define("CSS_DIR", "css");
    define("VENDOR_DIR", "vendor");
    

    /**************************************
     ** To show the date locally **********
    **************************************/
    date_default_timezone_set('Europe/Madrid');
    
    /********************************************************
     *** Database access configuration LOCAL ****************
    ********************************************************/
     define("DB_DRIVER", "mysqli"); //este para que coja la conexión mysqli sino en versiones altas de PHP no fucniona
     define("DB_HOST", "localhost");
     define("DB_USER", "root");
     define("DB_PASSWORD", "root");
     define("DB_DATABASE", "shapes");
    // define("DB_DEBUGMODE", "false"); // Ojo, a true desactiva las citas vía AJAX/JSON.



?>