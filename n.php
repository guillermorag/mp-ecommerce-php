<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');



if (isset($_GET["type"])){
    header('HTTP STATUS 200 (OK)');
    echo ("hola");
    echo ("<br>");
    print_r($_GET);
    echo("</br>");

} else
 {
    header('HTTP STATUS 500 (ERROR)');  
   echo ("sin datos");
}




?>