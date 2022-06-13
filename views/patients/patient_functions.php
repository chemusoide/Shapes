<?php
    // Creamos la función fcolor para cambiar el color de las casillas en las tablas según la numeración
    // si es tipo 3 son valores del 0..3 y el resto valores del 0..5
    function fcolor ($value, $tipo) {

        if ($tipo == 3) {

            switch ($value) {

                case 0:
                    $text_color = "text-success";
                    break;
                        
                case 1:
                    $text_color = "text-primary";
                    break;
                
                case 2:
                    $text_color = "text-warning";
                    break;

                case 3:
                    $text_color = "text-danger";
                    break;

            } // End switch
            
        }elseif ($tipo == 2) {

            switch ($value) {

                case "Rara vez":
                    $text_color = "text-primary";
                    break;

                case "No estoy seguro":
                    $text_color = "text-primary";
                    break;

                case "Ahora no lo sé":
                    $text_color = "text-primary";
                    break;
                        
                case "Mejor":
                    $text_color = "text-success";
                    break;

                case "Menos":
                    $text_color = "text-success";
                    break;

                case "Nunca":
                    $text_color = "text-success";
                    break;
                
                case "Igual":
                    $text_color = "text-warning";
                    break;

                case "A veces":
                    $text_color = "text-warning";
                    break;

                case "Peor":
                    $text_color = "text-danger";
                    break;
                
                case "A menudo":
                    $text_color = "text-danger";
                    break;

                case "NA":
                    $text_color = "text-primary";
                    break;
                        
                case "No":
                    $text_color = "text-success";
                    break;
                
                case "Sí":
                    $text_color = "text-danger";
                    break;

                case "SÍ":
                    $text_color = "text-danger";
                    break;

                case "Si":
                    $text_color = "text-danger";
                    break;
                
                case "SÃ­":
                    $text_color = "text-danger";
                    break;

                case "S&iacute;":
                    $text_color = "text-danger";
                    break;

            } // End switch

        }elseif ($tipo == 1) {

            switch ($value) {

                case "NA":
                    $text_color = "text-primary";
                    break;
                        
                case "No":
                    $text_color = "text-danger";
                    break;
                
                case "Sí":
                    $text_color = "text-success";
                    break;

                case "Si":
                    $text_color = "text-success";
                    break;

            } // End switch

        }else {
        
            switch ($value) {

                case 0:
                    $text_color = "text-success";
                    break;
                        
                case 1:
                    $text_color = "text-success";
                    break;
                
                case 2:
                    $text_color = "text-primary";
                    break;

                case 3:
                    $text_color = "text-warning";
                    break;

                case 4:
                    $text_color = "text-warning";
                    break;

                case 5:
                    $text_color = "text-danger";
                    break;

            } //End switch
            
        }//End if
        return $text_color;

    }// End function

    // Función que coge un valor de nonhf y devuelve si es YES, NO o NA.
    function nonhfvalue ($invalue){

        switch ($invalue){

            case "0":
                $outvalue = "NO";
                break;

            case "1":
                $outvalue = "YES";
                break;

            default:
                $outvalue = "NA";

        } // End Switch

        return $outvalue;

    } // End function nonhfvalue


    // Funcion que devuelve la edad actual según una fecha indicada
    function obtener_edad_segun_fecha($fecha_nacimiento)
    {
        $nacimiento = new DateTime($fecha_nacimiento);
        $ahora = new DateTime(date("Y-m-d"));
        $diferencia = $ahora->diff($nacimiento);
        return $diferencia->format("%y");
    }
    // End Funcion edad

?>