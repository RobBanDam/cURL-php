<?php 

if(isset($_POST['valor'])){
    $valor = floatval($_POST['valor']);

    $apiURL = "https://v6.exchangerate-api.com/v6/9b32f3dec9f1bcb12bf6ad55/latest/USD";

    $iniciarCURL = curl_init($apiURL);

    curl_setopt($iniciarCURL, CURLOPT_RETURNTRANSFER, true);

    $respuesta = curl_exec($iniciarCURL);
}

?>