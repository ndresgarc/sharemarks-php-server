<?php

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        if (isset($_GET['id'])) {
            include_once('read.php');
        } else {
            include_once('browse.php');
        }        
    break;
    case "POST":
        include_once('add.php');
    break;
    case "PUT":
        if (isset($_GET['id'])) {
            include_once('edit.php');
        } else {
            echo json_encode(
                array(
                    'message' => 'Error, ID not specififed'
                )
            );
        }        
    break;
    case "DELETE":
        if (isset($_GET['id'])) {
            include_once('delete.php');
        } else {
            echo json_encode(
                array(
                    'message' => 'Error, ID not specififed'
                )
            );
        }        
    break;
}

?>