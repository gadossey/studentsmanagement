<?php

//add headers
header('Access-Control-Allow-Origin: *');//allowing access
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With'); 

//Initializing api 
include_once('../core/initialize.php');

//Instantiate our Student
$Student = new Student($db);

//Blog Student query into $result
$result = $Student->read();

//Get the row count into $num
$num = $result->rowCount();

//Student data from table
if($num > 0){
    $Student_arr = array();
    $Student_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $Student_item = array(
    'Student_id'=>$Student_id ,
    'First_name'=>$First_name,
    'Last_name'=>$Last_name,
    'Programme'=>$Programme  ,
        );

        array_push($Student_arr['data'], $Student_item);
    }

    //convert to json and output
    echo json_encode($Student_arr);

}else{
    echo json_encode(array('message' => 'No Students found!!!'));

}

?>