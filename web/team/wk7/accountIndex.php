<?php
require 'dbConnect.php';
$db = get_db();

session_start();


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action){
    case 'register':
        include 'signUp.php';
        break;
    
        
}
?>
