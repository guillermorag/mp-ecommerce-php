<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
/*
echo ("hola");
echo ("<br>");
print_r($_POST);
echo("</br>");
*/

require_once "mp.php" ;

//MercadoPago\SDK::setAccessToken('APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');
guarda_log("NOTIFICACIONES");

if (isset($_POST["type"]) || isset($_GET["type"])){
        header('Content-Type: application/json');
      //  echo json_encode(['HTTP/1.1 200 OK'], 200);
      http_response_code(200);
      guarda_log("NOTIFICACIONES (POST)".json_encode($_POST));
}else{
    header('Content-Type: application/json');
    echo json_encode(['HTTP/1.1 500 ERRORR'], 500);
}


if (isset($_POST["type"])){
   
      
       switch($_POST["type"]) {

           case "payment":
               $payment = MercadoPago\Payment.find_by_id($_POST["id"]);
               
               guarda_log($payment);
               break;
           case "plan":
               $plan = MercadoPago\Plan.find_by_id($_POST["id"]);
               break;
           case "subscription":
               $plan = MercadoPago\Subscription.find_by_id($_POST["id"]);
               break;
           case "invoice":
               $plan = MercadoPago\Invoice.find_by_id($_POST["id"]);
               break;
       }

       header('Content-Type: application/json');
       echo json_encode(['HTTP/1.1 200 OK'], 200);

    }
    else {
      //  header('Content-Type: application/json');
      // echo json_encode(['HTTP/1.1 500 ERROR'], 500);
    }



    if (isset($_GET["type"])){
       
        guarda_log("NOTIFICACIONES VALORES RECIBIDOS (GET) =>".json_encode($_GET));
         

           switch($_GET["type"]) {
               case "payment":
                 // $payment = MercadoPago\Payment::find_by_id($_GET["data_id"]);
                //  $payment = MercadoPago\Payment::find_by_id($_GET["data_id"]);
                  
                 
                  $data =  file_get_contents('https://api.mercadopago.com/v1/payments/'.$_GET["data_id"].'?access_token=APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');
                //  $a = json_decode($data,true);

               /* echo ("<br>");
                  print_r(json_encode($payment));
                  print_r(json_encode($data));
                echo("</br>"); */
                 
                               
               
                //   guarda_log("JSON DE PAGO<<".$_GET["data_id"].">>---=>".json_encode($payment).'FINNIF');  
                //   guarda_log("JASON DE <<".$_GET["data_id"].">>---=>".json_encode($data).'FINNIF'); 
                   break;
               case "plan":
                   $plan = MercadoPago\Plan.find_by_id($_GET["id"]);
                   break;
               case "subscription":
                   $plan = MercadoPago\Subscription.find_by_id($_GET["id"]);
                   break;
               case "invoice":
                   $plan = MercadoPago\Invoice.find_by_id($_GET["id"]);
                   break;
           }
        }
        else {
            
        }

?>       