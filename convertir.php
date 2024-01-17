<?php

if(isset($_POST['valor'])){
    $valor = floatval($_POST['valor']);

    $apiURL = "https://v6.exchangerate-api.com/v6/f86192bd0e1f2cb13120576e/latest/USD";

    $iniciarCURL = curl_init($apiURL);

    // Desactivar la verificación SSL (NO RECOMENDADO)
    curl_setopt($iniciarCURL, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($iniciarCURL, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($iniciarCURL, CURLOPT_RETURNTRANSFER, true);

    $respuesta = curl_exec($iniciarCURL);

    if(curl_errno($iniciarCURL)){
        echo "Error al realizar la solicitud: " . curl_error($iniciarCURL);
        exit;
    }

    // Cerrar la sesión cURL
    curl_close($iniciarCURL);

    $datos = json_decode($respuesta, true);
}
?>
