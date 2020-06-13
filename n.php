<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

enviarEmail("guillermoragone@gmail.com","Guillermo","Notificacion MP","DESDE EL ESPACIO");

if (isset($_GET["type"])){
   // header('HTTP STATUS 200 (OK)');
    echo ("hola");
    echo ("<br>");
    print_r($_GET);
    echo("</br>");

} else
 {
   // header('HTTP STATUS 500 (ERROR)');  
   echo ("sin datos");
}


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


?>