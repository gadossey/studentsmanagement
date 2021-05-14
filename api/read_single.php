<?php

//add headers
header('Access-Control-Allow-Origin: *');//allowing access
header('Content-Type: application/json');

//Initializing api 
include_once('../core/initialize.php');

//Instantiate our Post
$Student = new Student($db);


//Checking for id
$Student->Student_id = isset($_GET['Student_id']) ? $_GET['Student_id'] : die();
$Student->read_single(); //specified in our student.php

$Student_arr = array( 
    'Student_id' => $Student->Student_id,
    'First_name' => $Student->First_name,
    'Last_name' => $Student->Last_name,
    'Programme' => $Student->Programme,
); 

//make a json
print_r(json_encode($Student_arr));

?>
