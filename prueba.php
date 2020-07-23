// get posted data

$data = json_decode(file_get_contents("php://input"));
  
echo ($data)  
   
//http_response_code(200);