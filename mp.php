


<?php


$_SERVIDOR = $_SERVER["HTTP_HOST"];

//define ('SUB','/mp-ecommerce-php/');




define ('URL_SUCESS','https://'.$_SERVIDOR.'/mpsucess.php');
define ('URL_FAILURE','https://'.$_SERVIDOR.'/mpfailure.php');
define ('URL_PENDING','https://'.$_SERVIDOR.'/mppending.php');

define ('URL_NOTIFICACIONES','https://'.$_SERVIDOR.'/notificaciones.php');

define ('URL_IMG','https://'.$_SERVIDOR.'/assets');




// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

// Agrega credenciales
MercadoPago\SDK::setAccessToken('APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');

//MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");


function crear_preferencia ($art,$pagador){

    $preference = new MercadoPago\Preference();
    
   

       
    $imagen = path_image($art["img"]);

    
     

    $item = new MercadoPago\Item();
    $item->id = "1234";
    $item->title = $art["title"];
    $item->description = "Dispositivo móvil de Tienda e-commerce";
    $item->picture_url = $imagen;
    $item->quantity = $art["unit"];
    $item->unit_price = $art["price"];

    

    $payer = new MercadoPago\Payer($pagador);
    $preference->payer = $payer;

    $preference->items = [$item];
 
    $preference->external_reference = "guillermoragone@gmail.com";
    $preference->notification_url = URL_NOTIFICACIONES;  
   
   
    $preference->payment_methods = array(
        "excluded_payment_methods" => array(
          array("id" => "amex")
        ),
        "installments" => 6,
        "excluded_payment_types" => array (
           
            array ( "id" => "atm" )
        )
      );
   


    $preference->back_urls = array(
        "success" => URL_SUCESS,
        "failure" => URL_FAILURE,
        "pending" => URL_PENDING
    );
    $preference->auto_return = "approved";   

    $preference->save();

    return ($preference);

}   

function path_image($img){

    
    
   $r = str_replace ('./assets',"",$img );
   return URL_IMG.$r;  
    


}

function guarda_log($datos)
{
    $nombreArchivo = "datos.txt";
    file_put_contents($nombreArchivo, $datos.PHP_EOL, FILE_APPEND);
/*
  $archivo = fopen("datos.txt","w+b");  
   if( $archivo ) {
        file_put_contents("datos.txt", "datos +".$payment);
    }
        fclose($archivo);  */

}







?>
