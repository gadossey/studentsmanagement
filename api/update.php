<?php
//add headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With'); 



//Initializing api 
include_once('../core/initialize.php');

//Instantiate Post
$Student = new Student($db);

//get raw Studented data
$data = json_decode(file_get_contents("php://input"));

$Student->Student_id = $data->Student_id;
$Student->First_name = $data->First_name;
$Student->Last_name  = $data->Last_name ;
$Student->Programme = $data->Programme;

//create Student
if($Student->update()){
    echo json_encode(
        array('message' => 'Student updated.')
    );
}else{
    echo json_encode(
        array('message' => 'Student not updated.')
    );
}




?>