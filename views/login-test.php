<?php

if ($_POST) {

    $url = 'https://kubernetes.pasiphae.eu/shapes/asapa/auth/login';

    $datos = array();
    $datos['email'] = $_POST['usu'];
    $datos['password'] = $_POST['pwd'];

    $datos = json_encode($datos);

    try {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $datos);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','X-Shapes-Key: 7Msbb3w^SjVG%j'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        // para debug
        echo 'Enviado a '.$url;
        echo '<br>';
        echo '<br>';
        echo $datos;

        echo '<br>';
        echo '<br>';
        echo 'Resultado :';
        echo '<br>';
        echo '<br>';
        echo $result;

        echo '<br>';
        echo '<br>';
        echo '<pre>' . var_export(json_decode($result), true) . '</pre>';
    }
    catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }

} // if ($_POST) {

?>
<div class="section">
    <form name="formu" method="post" accept-charset="UTF-8">
        <input type="text" name="usu" placeholder="usuario" value="shapes_user16@pasiphae.eu">
        <input type="password" name="pwd" placeholder="contraseña" value="oHebLM#4L2@nTs">
        <button name="enviar" type="submit" >Acceder</button>
    </form>
</div><!-- section -->
  </body>
</html>