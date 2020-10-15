<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requeted-With');

    include_once '../../../config/Database.php';
    include_once '../../../models/bookmark.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database -> connect();

    $bookmark = new Bookmark($db);

    $data = json_decode(file_get_contents("php://input"));

    $bookmark -> url = $data -> url;

    if ($bookmark -> add()) {
        echo json_encode(
            array(
                'message' => 'Post created!'
            )
        );
    } else {
        echo json_encode(
            array(
                'message' => 'ERROR! Post NOT created!'
            )
        );
    }

?>