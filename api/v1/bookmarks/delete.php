<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requeted-With');

    include_once '../../../config/Database.php';
    include_once '../../../models/bookmark.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database -> connect();

    $bookmark = new Bookmark($db);

    $bookmark -> id = $_GET['id'];

    if ($bookmark -> delete()) {
        echo json_encode(
            array(
                'message' => 'Post DELETED'
            )
        );
    } else {
        echo json_encode(
            array(
                'message' => 'Error, Post NOT deleted!'
            )
        );
    }

?>