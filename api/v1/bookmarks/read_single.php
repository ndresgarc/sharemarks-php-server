<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../../config/Database.php';
    include_once '../../../models/bookmark.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database -> connect();

    $bookmark = new Bookmark($db);

    $bookmark -> id = isset($_GET['id']) ? $_GET['id'] : die();

    $bookmark -> read_single();

    $bookmarks_array = array(
        'id' => $bookmark -> id,
        'url' => $bookmark -> url
    );

    print_r(json_encode($bookmarks_array));

?>