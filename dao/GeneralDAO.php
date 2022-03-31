<?php
//control sesion
if( $_COOKIE['shapes'] )
{

    session_id( $_COOKIE['shapes'] );
    session_start();
}

require_once("adodb5/adodb.inc.php");
// TODO: try-catch para AdoDB...

class GeneralDAO {   

    public static function getConnection() {

        try {

            $DB = NewADOConnection(DB_DRIVER);
            $DB->Connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
            $DB->SetFetchMode(ADODB_FETCH_ASSOC);
            $DB->debug = (DB_DEBUGMODE == "true") ? true : false;

            return $DB;
            
        } catch (exception $e) {  

            print_r($e);
            return null;
            
        }
                    
    } // End obtenerConexion

    public static function closeConnection($DB) {

        try {
        
            $DB->Close();
            
        } catch (exception $e) {
        
            print_r($e);
            
        }

    }
    
} // End Class GeneralDAO

?>