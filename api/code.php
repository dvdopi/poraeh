<?php

// include database and object files
include_once 'config/database.php';
include_once 'users.php';
 
// instantiate database and users object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$users = new user($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $register = json_encode( $_REQUEST);
    $stmt = $users->verify($register);
    echo $stmt;

}else{
    echo json_encode('No Data');

}

?>