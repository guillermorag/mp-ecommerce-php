<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');



require_once "mp.php" ;


 if(isset($_GET['collection_id']) || isset($_GET['id'])){
   
   if(isset($_GET['collection_id'])):
    $id =  $_GET['collection_id'];
   elseif(isset($_GET['id'])):
    $id =  $_GET['id'];
   endif; 
   
   
   $retorno = Retorno($id);

   if($retorno){
      // Redirecionar usuario
     // echo '<script>location.href="index.php"</script>';
   }else{
     // Redirecionar usuario e informar erro ao admin
     // echo '<script>location.href="index.php"</script>';
      
      /*
       
       ENVIAR EMAIL AO ADMIN
      
      */
   }
   
 }


?>