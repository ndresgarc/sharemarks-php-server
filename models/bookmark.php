<?php

class Bookmark {

    private $connection;
    private $table = 'api';

    public $id;
    public $url;

    public function __construct($db) {
        $this -> connection = $db;
    }

    public function read() {
        $query = '
            SELECT
                id, url 
            FROM
                ' . $this -> table
        ;
        $statement = $this -> connection -> prepare($query);
        $statement -> execute();
        return $statement;
    }

    public function read_single() {
        $query = '
            SELECT
                id, url 
            FROM
                ' . $this -> table . '
            WHERE
                id = ?
        ';
        $statement = $this -> connection -> prepare($query);
        $statement -> bindParam(1, $this -> id);
        $statement -> execute();

        $row = $statement -> fetch(PDO::FETCH_ASSOC);
        $this -> url = $row['url'];

        return $statement;
    }

}

?>