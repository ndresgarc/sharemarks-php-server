<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/bookmark.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database -> connect();

    $bookmark = new Bookmark($db);

    $result = $bookmark -> read();
    $num = $result -> rowCount();

    if ($num > 0) {

        $bookmarks_array = array();
        $bookmarks_array['data'] = array();
    
        while($row = $result -> fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $bookmark_item = array(
                'id' => $id,
                'url' => $url
            );
            array_push($bookmarks_array['data'], $bookmark_item);
        }

        // Turn to JSON
        echo json_encode($bookmarks_array);

    } else {

        echo json_encode(
            array('message' => 'No posts found')
        );

    }

?>