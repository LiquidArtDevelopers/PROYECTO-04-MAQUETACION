<?php


// prueba de crear variables
$mensaje = "Enviado con éxito";
$fallo = true;
$campo = "";

// creación de array asociativo
$arrayRespuesta = array(
    'mensaje' => $mensaje,
    'fallo' => $fallo,
    'campo' => $campo
);

// crear un json del array
$jsonDelArray = json_encode($arrayRespuesta); 

// devolvemos el json (lo recogerá ajax en el responseText)
echo $jsonDelArray; 
die;