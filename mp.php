


<?php


$_SERVIDOR = $_SERVER["HTTP_HOST"];

define ('SUB','/mp-ecommerce-php/');
/*
define ('URL_SUCESS','https://'.$_SERVIDOR.SUB.'mpsucess.php');
define ('URL_FAILURE','https://'.$_SERVIDOR.SUB.'mpfailure.php');
define ('URL_PENDING','https://'.$_SERVIDOR.SUB.'mppending.php');

define ('URL_NOTIFICACIONES','https://'.$_SERVIDOR.SUB.'n.php');

define ('URL_IMG','https://'.$_SERVIDOR.SUB.'assets');*/

define ('URL_SUCESS','https://'.$_SERVIDOR.'mpsucess.php');
define ('URL_FAILURE','https://'.$_SERVIDOR.'mpfailure.php');
define ('URL_PENDING','https://'.$_SERVIDOR.'mppending.php');

define ('URL_NOTIFICACIONES','https://'.$_SERVIDOR.'n.php');

define ('URL_IMG','https://'.$_SERVIDOR.'assets');







// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

// Agrega credenciales

MercadoPago\SDK::setAccessToken('APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');

MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");


function retorno  ($id){


   $cadena = "Este es el id =>".$id;
      // Abrir el archivo, creándolo si no existe:
	$archivo = fopen("datos.txt","w+b");  

    if( $archivo ) {
      
        file_put_contents("datos.txt", $cadena);
    }
      
	// Cerrar el archivo:
	fclose($archivo);   



      return true;

}


function crear_preferencia  ($art,$pagador){

    $preference = new MercadoPago\Preference();
    
   

       
    $imagen = path_image($art["img"]);

    echo ("este es el la imagen ". $imagen."<br>");
   // echo ("este es el serimagenesvidor ". $art["img"]);
     

    $item = new MercadoPago\Item();
    $item->id = "1234";
    $item->title = $art["title"];
    $item->description = "Dispositivo móvil de Tienda e-commerce";
    #$item->picture_url = $art["img"];
    $item->picture_url = $imagen;
    $item->quantity = $art["unit"];
    $item->unit_price = $art["price"];

    

    $payer = new MercadoPago\Payer($pagador);
    $preference->payer = $payer;

    $preference->items = [$item];
 
    $preference->external_reference = "guillermoragone@gmail.com";
    $preference->notification_url = URL_NOTIFICACIONES;  
   

    $preference->save();

    $preference->payment_methods = array (
        "excluded_payment_methods" => array (),
        "excluded_payment_types" => array (
            array ( "id" => "AMEX" ),
            array ( "id" => "atm" )
        ),
        "installments" => 6
    );

   


    $preference->back_urls = array(
        "success" => URL_SUCESS,
        "failure" => URL_FAILURE,
        "pending" => URL_PENDING
    );
    $preference->auto_return = "approved";   

   

    return ($preference);

}   

function path_image($img){

    //solo ejemplo prueba arreglar para devolverl el path correcto
    
   $r = str_replace ('./assets',"",$img );
   return URL_IMG.$r;  
    
  // return "https://".$host.$url.$img;

}

function get_file_dir() {
    global $argv;
    $dir = dirname(getcwd() . '/' . $argv[0]);
    $curDir = getcwd();
    chdir($dir);
    $dir = getcwd();
    chdir($curDir);
    return $dir;
}







?>
