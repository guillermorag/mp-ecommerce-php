<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



$d =  json_decode(file_get_contents("php://input"));
  
//echo (json_encode($d));


guarda_log (json_encode($d));


function guarda_log($datos)
{
    $nombreArchivo = "notificacion.txt";
    file_put_contents($nombreArchivo, $datos.PHP_EOL, FILE_APPEND);


}   
   
http_response_code(200);

?>