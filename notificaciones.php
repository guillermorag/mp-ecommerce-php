<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

header('HTTP STATUS 200 (OK)');


if (isset($_POST["collection_id"])){
    echo ($_POST["collection_id"]."<br>");
    echo ($_POST["collection_status"]."<br>");
    echo ($_POST["external_reference"]."<br>");
    echo ($_POST["payment_type"]."<br>");
    echo ($_POST["preference_id"]."<br>");
    echo ($_POST["site_id"]."<br>");

    echo ($_POST["processing_mode"]."<br>");
    echo ($_POST["preference_id"]."<br>");
    echo ($_POST["merchant_account_id"]."<br>");
    
    $cuerpo = "Preferencia ";

   // enviarEmail("guillermoragone@gmail.com","Guillermo","Notificacion MP",$cuerpo);
   

} else {
   // enviarEmail("guillermoragone@gmail.com","Guillermo","Notificacion MP","NO LLEGA NADA");
   echo ("hola");
   header('HTTP/1.1 504 Internal Server Error');

}

/*
function enviarEmail($email, $nombre, $asunto, $cuerpo){
    require_once 'PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer();
    // Envio de email simple
        $mail->isMail();
        // Desplegar errores y activar el debug
        $mail->SMTPDebug = 4;
        // Email del remitente (puedes poner algun email de prueba)
        $mail->setFrom('mp-ecommerce-php@php.com.ar', 'mp-ecommerce-php');
        // Email del destinatario (a quíen se enviará el mensaje)
        //$mail->addAddress('guillermoragone@gmail.com', 'Guillermo Ragone');

        $mail->addAddress($email, $nombre);
    
            $mail->Subject = $asunto;
            $mail->Body    = $cuerpo;
            $mail->IsHTML(true);
            
            if($mail->Send()) {
                return true;
            }else{
                return false;
                }

    }

*/


/*
switch($_POST["type"]) {
    case "payment":
        $payment = MercadoPago\Payment.find_by_id($_POST["id"]);
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


*/

?>