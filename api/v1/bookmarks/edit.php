<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requeted-With');

    include_once '../../../config/Database.php';
    include_once '../../../models/bookmark.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database -> connect();

    $bookmark = new Bookmark($db);

    $data = json_decode(file_get_contents("php://input"));

    $bookmark -> url = $data -> url;
    $bookmark -> id = $data -> id;

    if ($bookmark -> edit()) {
        echo json_encode(
            array(
                'message' => 'Post updated properly'
            )
        );
    } else {
        echo json_encode(
            array(
                'message' => 'Error, Post NOT updated!'
            )
        );
    }

?>