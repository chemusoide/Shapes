<?php
    // Creamos la función fcolor para cambiar el color de las casillas en las tablas según la numeración
    // si es tipo 3 son valores del 0..3 y el resto valores del 0..5
    function fcolor ($value, $tipo) {

        if ($tipo == 3) {

            switch ($value) {
                case "0":
                    $text_color = "text-success";
                    break;
                        
                case "1":
                    $text_color = "text-primary";
                    break;
                
                case "2":
                    $text_color = "text-warning";
                    break;

                case "3":
                    $text_color = "text-danger";
                    break;
                
            } //End switch
        } else {
        
            switch ($value) {
                case "0":
                    $text_color = "text-success";
                    break;
                        
                case "1":
                    $text_color = "text-success";
                    break;
                
                case "2":
                    $text_color = "text-primary";
                    break;

                case "3":
                    $text_color = "text-warning";
                    break;

                case "4":
                    $text_color = "text-warning";
                    break;

                case "5":
                    $text_color = "text-danger";
                    break;
                
            } //End switch
            
        }//End if
        return $text_color;

    }// End function

?>