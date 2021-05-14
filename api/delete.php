<?php
//add headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With'); 



//Initializing api 
include_once('../core/initialize.php');

//Instantiate Student
$Student = new Student($db);

//get raw Student data
$data = json_decode(file_get_contents("php://input"));

$Student->Student_id = $data->Student_id;

//create Student
if($Student->delete()){
    echo("student deleted");


}else{
    
     echo("student deleted");
}
 
?>